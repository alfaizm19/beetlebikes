<!--begin::Base Scripts -->
<? if($this->router->fetch_method() === "create" || $this->router->fetch_method() === "edit" ): ?>
   <script src="<? echo HTTP_ASSETS_PATH_ADMIN;?>js/rebuild/yui/yui-min.js?v=<?=VERSION?>"></script>
  <? if($is_CKEditor): ?>
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js?v=<?=VERSION?>"></script>
  <? endif; ?>
<? endif; ?>

<?

  if($this->router->fetch_class() === "product" )
  { ?>
    <script src="<? echo HTTP_ASSETS_PATH_ADMIN;?>js/product.js?v=<?=VERSION?>"></script>
  <? } ?>

  <?

  $js = array('vendors.bundle.js?v='.VERSION);
  echo get_js($js,'admin_js');

  if($this->router->fetch_method() === "create" || $this->router->fetch_method() === "edit" )
  {
 	 $create_edit = array('img-crop.js?v='.VERSION,'crop.js?v='.VERSION,'additional-methods.min.js?v='.VERSION); // imag croping js
 	echo get_js($create_edit,'admin_custom_js');

  }
  if($this->router->fetch_method()==="index")
  {
	$datatable = array('jquery.dataTables.min.js?v='.VERSION,'dataTables.bootstrap4.min.js?v='.VERSION,'sweetalert.min.js?v='.VERSION);  // data table js
    echo get_js($datatable,'admin_custom_js');
  }

  echo get_js('custom.js?v='.VERSION,'admin_custom_js');


   $date = array('bootstrap-datepicker.min.js?v='.VERSION,'bootstrap-timepicker.min.js?v='.VERSION,'select2.min.js?v='.VERSION,'bootstrap.min.js?v='.VERSION);
  echo get_js($date,'admin_custom_js');


?>

<?
if($is_GRID)
{
?>
	<? $this->load->view('admin/partials/_admin_footer_script'); ?>
<?
}
?>
<? if($is_CKEditor): ?>
  <script>
    ckeditor = $('.description');
    $.each(ckeditor,function(i,e) {
      var el_id = $(e).attr('id');
      CKEDITOR.replace(el_id,{ filebrowserUploadUrl : '<?=base_url()?>upload'});
      CKEDITOR.config.allowedContent = true;
    })
  </script>
<? endif; ?>
<? if($this->router->fetch_class() === "backup_db" ) {?>
<script>

  $(function (){
    $(document).on('click','.db_backup',function(){
        StartLoading()
        $.ajax({
          type: "POST",
          url: "<?=base_url()?>admin/backup_db/backup_database",
          success: function(res) {
          if(res.success === true)
          {
            get_flash(res.message,res.type);
          }
            StopLoading();
            $("#gridTable").dataTable().fnDraw();
          },
          error: function() {
            StopLoading();
          },
        });
    })
  });
</script>
<? }?>

<? if($this->router->fetch_class() === "backup" ) {?>
<script>

  $(function (){
    $(document).on('click','.code_backup',function(){
      StartLoading()
      $.ajax({
        type: "POST",
        url: "<?=base_url()?>admin/code_backup/site_code_backup",
        success: function(res) {
          if(res.success === true)
          {
            get_flash(res.message,res.type);
          }
          StopLoading();
          $("#gridTable").dataTable().fnDraw();
        },
        error: function() {
          StopLoading();
        },
      });
  })
  });
</script>
<? }?>
<!--end::Base Scripts -->
