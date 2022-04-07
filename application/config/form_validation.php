<?php


$config = array(
        'careerForm' => array(
                array(
                        'field' => 'first',
                        'label' => 'first',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'last_name',
                        'label' => 'last name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'position',
                        'label' => 'position',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'country_name',
                        'label' => 'country name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'phoneormobile',
                        'label' => 'phoneormobile',
                        'rules' => 'trim|required'
                ),
                
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'experience',
                        'label' => 'experience',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'comments',
                        'label' => 'comments',
                        'rules' => 'trim|required'
                )
                
        )

       
          
      
);
?>