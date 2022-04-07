<?

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Auth_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters(
                $this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth')
        );

        $this->lang->load('auth');

        if ($this->ion_auth->logged_in() && $this->uri->segment(3) !== "logout") {
            redirect('admin/dashboard', 'refresh');
        }
    }

    /*
     * Login method Load view 
     */

    public function index() {
        $this->setPageTitle("Login");
        $this->render('admin/auth/vwLogin', 'admin_auth_master');
    }

    /*
     * Do-login method Load view 
     */

    public function doLogin() {
        $inputs = $this->input->post();
        /*
         * form validation rule
         */
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[5]|max_length[12]'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
            $remember = (bool) $this->input->post('remember');

            
            $identity = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->select('email, id, password, is_active, last_login')->get_where('admins', array('email' => $identity))->row();

            if (!empty($user)) {

                //check if password is correct

                $password = $this->ion_auth_model->hash_password_db($user->id, $password);

                if ($password) {
                    
                    if ($user->is_active) {
                        
                        $otp = random_int(100000, 999999);
                        $otp = 123456;

                        $data = array(
                            'email' => $identity,
                            'otp' => $otp
                        );

                        $generateTime = date('h:i');
                        $expireTime = strtotime($generateTime)+(60*5);

                        $sessObj = array(
                            'user_id' => $user->id,
                            'email' => $identity,
                            'password' => $this->input->post('password'),
                            'otp' => $otp,
                            'generate_time' => $generateTime,
                            'expire' => date('h:i', $expireTime),
                            'is_otp_verify' => false,
                        );

                        $isMailSend = $this->Email_sending->send_admin_otp($data);

                        if ($isMailSend OR 1) {
                            $this->session->set_userdata( 'admin_otp_data', $sessObj );
                            redirect(base_url('admin/verify-otp'),'refresh');
                        } else {
                            $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Unable to send OTP'));
                            $this->session->set_flashdata('postdata', $inputs);
                            redirect('admin', 'refresh');
                        }

                    } else {
                        $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Your account is not active'));
                        $this->session->set_flashdata('postdata', $inputs);
                        redirect('admin', 'refresh');
                    }

                } else {
                    $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Please provide a valid email or password !'));
                    $this->session->set_flashdata('postdata', $inputs);
                    redirect('admin', 'refresh');
                }
                
            } else {
                $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Please provide a valid email or password !'));
                $this->session->set_flashdata('postdata', $inputs);
                redirect('admin', 'refresh');
            }


            die();

            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)) {
                $user = $this->ion_auth->user()->row();/** Get current loged in user data */
                $user_data = array('username', 'user_image', 'first_name');
                foreach ($user as $key => $value) {
                    if (in_array($key, $user_data)) {
                        $this->session->set_userdata($key, $value);
                    }
                }
                redirect('admin/dashboard', 'refresh');
            } else {
                set_flash('message', 'danger', $this->ion_auth->errors());
                $this->session->set_flashdata('postdata', $inputs);
                redirect('admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            $this->session->set_flashdata('error', $this->form_validation->error_array());
            $this->session->set_flashdata('postdata', $inputs);
            redirect('admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    public function verifyOtp() {
        $otpData = $this->session->userdata('admin_otp_data');

        $inputs = array(
            'email' => $otpData['email'],
            'password' => $otpData['password']
        );

        $expireTime = $otpData['expire'];

        if (!empty($otpData)) {
        
            $currentTime = date('h:i');
            // echo $expireTime;

            if (strtotime($currentTime) > strtotime($expireTime)) {
                
                $this->session->unset_userdata('admin_otp_data');
                $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Your OTP is expired.'));
                redirect('admin', 'refresh');

            } else {
                $this->setPageTitle("Verify OTP");
                $this->data['otpData'] = $otpData;
                $this->render('admin/auth/vwOtpPage', 'admin_auth_master');
            }
            
        } else {
            $this->session->unset_userdata('admin_otp_data');
            $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Something went wrong'));
            redirect('admin', 'refresh');
        }
    }

    public function doOtpVerify() {
        $otpData = $this->session->userdata('admin_otp_data');

        $inputs = array(
            'email' => $otpData['email'],
            'password' => $otpData['password']
        );

        $expireTime = $otpData['expire'];

        if (!empty($otpData)) {
            
            //check expire time
            $currentTime = date('h:i');

            // echo $expireTime;

            if (strtotime($currentTime) > strtotime($expireTime)) {
                
                $this->session->unset_userdata('admin_otp_data');
                $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Your OTP is expired.'));
                redirect('admin', 'refresh');

            } else {

                $this->form_validation->set_rules('otp', 'otp', 'trim|required|numeric|min_length[6]|max_length[6]|xss_clean');

                if ($this->form_validation->run() === FALSE) {
                    
                    $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => validation_errors('')));
                    redirect('admin/verify-otp', 'refresh');

                } else {
                    $userOtp = $this->input->post('otp');
                    $currentOtp = $otpData['otp'];

                    if ($userOtp == $currentOtp) {

                        $email = $otpData['email'];
                        $password = $otpData['password'];
                        
                        if ($this->ion_auth->login($email, $password, $remember=true)) {

                            $user = $this->ion_auth->user()->row();/** Get current loged in user data */
                            $user_data = array('username', 'user_image', 'first_name');
                            foreach ($user as $key => $value) {
                                if (in_array($key, $user_data)) {
                                    $this->session->set_userdata($key, $value);
                                }
                            }

                            $this->session->unset_userdata('admin_otp_data');
                            redirect('admin/dashboard', 'refresh');

                        } else {
                            
                            $this->session->unset_userdata('admin_otp_data');
                            set_flash('message', 'danger', $this->ion_auth->errors());
                            $this->session->set_flashdata('postdata', $inputs);
                            redirect('admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
                        }

                    } else {
                        $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'You have entered invalid OTP'));
                        redirect('admin/verify-otp', 'refresh');
                    }
                }
            }

        } else {
            $this->session->unset_userdata('admin_otp_data');
            $this->session->set_flashdata('message', array('message_type' => 'danger', 'message' => 'Something went wrong'));
            redirect('admin', 'refresh');
        }
    }

    public function doLogin_09072021() {
        $inputs = $this->input->post();
        /*
         * form validation rule
         */
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[5]|max_length[12]'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember)) {
                $user = $this->ion_auth->user()->row();/** Get current loged in user data */
                $user_data = array('username', 'user_image', 'first_name');
                foreach ($user as $key => $value) {
                    if (in_array($key, $user_data)) {
                        $this->session->set_userdata($key, $value);
                    }
                }
                redirect('admin/dashboard', 'refresh');
            } else {
                set_flash('message', 'danger', $this->ion_auth->errors());
                $this->session->set_flashdata('postdata', $inputs);
                redirect('admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            $this->session->set_flashdata('error', $this->form_validation->error_array());
            $this->session->set_flashdata('postdata', $inputs);
            redirect('admin', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    /*
     * forgot password  method Load view 
     */

    public function forgotPassword() {
        $this->setPageTitle("Forgot password");
        $this->render('admin/auth/vwForgot', 'admin_auth_master');
    }

    public function do_forgotPassword() {
        $inputs = $this->input->post();
        /*
         * form validation rule
         */
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {

            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('email'))->users()->row();

            if (empty($identity)) {
                set_flash('message', 'danger', 'Please Provide A Valid Email Address.');
                $this->session->set_flashdata('postdata', $inputs);
                redirect("admin/forgot-password", 'refresh');
            }

            $email = $this->input->post('email');

            // run the forgotten password method to email an activation code to the user
            //$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            $token = md5(uniqid());

            $this->db->where('id', $identity->id);
            $this->db->update('admins', array(
                'forgotten_password_code' => $token
            ));

            $sendMail = $this->Email_sending->admin_forgot($identity, $token);

            if ($sendMail) {
                set_flash('message', 'success', 'Password reset link has been sent.'); //DEV::SKT DATE::21/7/2018
                $this->session->set_flashdata('postdata', $inputs);
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                redirect("admin/forgot-password", 'refresh');
            } else {
                redirect("admin", 'refresh'); //we should display a confirmation page here instead of the login page   
            }

            // if ($forgotten) {
            //     // if there were no errors
            //     // set_flash('message','success','Place Check Your Email Address.');
            //     redirect("admin", 'refresh'); //we should display a confirmation page here instead of the login page
            // } else {
            //     set_flash('message', 'success', 'Password reset link has been sent.'); //DEV::SKT DATE::21/7/2018
            //     $this->session->set_flashdata('postdata', $inputs);
            //     $this->session->set_flashdata('error', $this->ion_auth->errors());
            //     redirect("admin/forgot-password", 'refresh');
            // }
        } else {
            $this->session->set_flashdata('error', $this->form_validation->error_array());
            $this->session->set_flashdata('postdata', $inputs);
            redirect('admin/forgot-password', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
        }
    }

    /*
     * reset password method Load view 
     */

    public function resetPassword($password) {
        if (!$password) {
            show_404($this->lang->line('error_csrf'));
        }
        $user = $this->ion_auth->forgotten_password_check($password);
        if (!$user) {
            set_flash('message', 'danger', $this->lang->line('error_csrf'));
            redirect("admin", 'refresh');
        }
        $this->setPageTitle("Reset Password");
        $this->render('admin/auth/vwResetpassword', 'admin_auth_master');
    }

    /*
     * reset password method Load view 
     */

    public function do_resetPassword($password) {
        if (!$password) {
            set_flash('message', 'danger', 'Reset password link expire.');
            redirect("admin", 'refresh');
        }

        $config = array(
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|max_length[15]'
            ),
            array(
                'field' => 'cpassword',
                'label' => 'Confrim Password',
                'rules' => 'trim|required|min_length[4]|max_length[15]|matches[password]'
            ),
        );

        $this->form_validation->set_rules($config);
        $user = $this->ion_auth->forgotten_password_check($password);

        if ($this->form_validation->run() == TRUE && $user) {
            // finally change the password
            $identity = $user->{$this->config->item('identity', 'ion_auth')};
            $change = $this->ion_auth->reset_password($identity, $this->input->post('password'));
            if ($change) {
                set_flash('message', 'success', 'Password has been changed successfully.');
                redirect("admin", 'refresh');
            } else {
                set_flash('message', 'danger', $this->ion_auth->errors());
                redirect('admin/reset-password/' . $password, 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', $this->form_validation->error_array());
            redirect('admin/reset-password/' . $password, 'refresh');
        }
    }

    /**
     * Logout the user 
     */
    public function logout() {
        $logout = $this->ion_auth->logout();
        redirect('admin', 'refresh');
    }

    // public function test() {
    //     $pass = "codzio@123";
    //     echo $this->ion_auth->hash_password($pass);
    // }

}

/* End of file filename.php */
