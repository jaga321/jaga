<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?>
   <script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>
  
  <div class="content">
    <div class="content-container">
      <div class="content-header">
        <h2 class="content-header-title">Import Enquiry</h2>        
      </div> <!-- /.content-header -->
      <div class="row">
        <div class="col-md-12">
          <div class="portlet">
            <div class="portlet-header">
              <h3 style="width:100%">
                <i class="fa fa-table"></i>Import
              </h3>
            </div> <!-- /.portlet-header -->
            <div>
        <form method="post" enctype="multipart/form-data" action="<?php echo $this->config->item('base_url')?>enquiry/import_components_data">
                    <div class="form-group">
                        <label class="col-md-4"> File</label>
                       <div class="col-md-8">
                         <input type="file" class="form-control imgInp" name="name_uplod" id="name_uplod" required="required">
                         <span id="errormsg" style="color:#F00;"></span>
                       </div>
                     </div>
                    <div class="form-group">
                      <div class="col-md-12">
                         <div align="center">
                         <input type="submit" value="Upload" class="btn btn-info"  id="submit"/>
                           <!--<button class="btn btn-info submit" type="submit"  id="submit"><span class="accept"></span>Upload</button>-->
                            <button class="btn btn-warning" type="reset">Reset</button>
                         </div>
                      </div>
                    </div>
                </form>
            </div>
            <div class="portlet-content filter_result"> 
                <!-- /.table-responsive -->
            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        </div></div>

        </div> <!-- /.col -->

      </div> <!-- /.row -->
      <script language="javascript">



$("#name_uplod").live('change',function() 
{
var val = $(this).val();
switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){ 
 case 'csv': case '':
 $(this).val();
$("#errormsg").html("");
break;
default:
$(this).val();
$("#errormsg").html("Upload csv Files");
break;
}
});


$("#submit").live('click',function()
{ 
 var m=$("#errormsg").html();
 if((m.trim()).length>0)
 {
 return false;
 }
 else
 {
 return true;
 }
});
</script>
      