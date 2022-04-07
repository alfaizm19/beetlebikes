<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
    </div>
   <a href="<? echo base_url('admin/career_enquiry') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">
                     <tr>
                      <th width="30%">Name</th>
                      <th width="70%"><?=$career->first_name?></th>
                    </tr>
                    <tr>
                      <th width="30%">Position</th>
                      <th width="70%"><?=$career->position_name?></th>
                    </tr>                    
					         <tr>
                      <th width="30%">Phone</th>
                      <th width="70%"><?=$career->phoneormobile	;?></th>
                    </tr>
					         <tr>
                      <th width="30%">Email</th>
                      <th width="70%"><?=$career->email;?></th>
                    </tr>
                    <tr>
                      <th width="30%">Comments</th>
                      <th width="70%"><?=$career->comments?></th>
                    </tr>
					<tr>
					<th width="30%">Download Resume</th>
					<th width="70%">
					<div class="w-50">
            <?php
              if($career->resume_path)
              {
                $ext = pathinfo(base_url() . $career->resume_path);
                if($ext['extension'] == "docx" || $ext['extension'] == "doc")
                {
                    $iconFile = DEFAULT_WORD;
                }
                else
                {
                  $iconFile = DEFAULT_PDF;
                }
            ?>
						<a href="<?php echo base_url() . $career->resume_path; ?>" title="report" download>
              <img src='<?= $iconFile ?>' style='width: 25px;;padding-top:10px;'>
            </a>
            <?php
            }
            ?>
					</div>
					</th>
				          </tr>
                  <tr>
                    <th width="30%">Received Date</th>
                    <th width="70%"><?=date('d M Y',strtotime($career->created_at))?></th>
                  </tr>

                  <?php       

                      if (!empty($career->questions)) 
                      {
                          $questions = unserialize($career->questions);

                          // echo "<pre>";
                          
                          foreach ($questions as $qId => $ans) 
                          {
                            
                            ?>

                            <tr>
                              <td colspan="10">
                                <p><?= $this->db->get_where('questions', array('question_id' => $qId))->row("question"); ?></p>
                                <p>
                                  <?= $ans == 1? 'Yes':'No'; ?>
                                </p>
                              </td>
                            </tr>

                            <?php
                          }

                      }

                    ?>

          </table>

      </div>
  </div>
</div>
