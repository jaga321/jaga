<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?>
   
  
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
                         <input type="file" class="form-control" name="name_uplod" id="name_uplod" required="required">
                       </div>
                     </div>
                    <div class="form-group">
                      <div class="col-md-12">
                         <div align="center">
                            <button class="btn btn-info" type="submit"><span class="accept"></span>Upload</button>
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
function Checkfiles()
{
var fup = document.getElementById('name_uplod');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "csv")
{
return true;
} 
else
{
alert("Upload csv file only");
fup.focus();
return false;
}
}
</script>
      