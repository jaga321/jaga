  <?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); 
  ?>
  <?php
//echo "<pre>"; print_r($customers);exit;
if(isset($customers) && !empty($customers))
{
	foreach($customers as $cus)
	{
		if(isset($cus["lead"]) && !empty($cus["lead"]))
		{
			//$days=$cus["lead"][0]['days'];
			//$dealer=$cus["lead"][0]['dealer'];
		}
		else
		{
			$days='';
			$dealer='';
		}
	}
}
?>
   
  
  <div class="content">
    <div class="content-container">
      <div class="content-header">
        <h2 class="content-header-title">Account Setting</h2>
      </div> <!-- /.content-header -->
      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            

            <div class="portlet-content"> 
            
            <form class="form-horizontal"   method="post">
            
            <div class="form-group">
              <label class="col-md-2">User Name </label>
              <div class="col-md-4">
              <input type="text" name="username" class="form-control" placeholder="User Name" required="">
              
               </div>
            </div>
           
             <div class="form-group">
              <label class="col-md-2">Password</label>
              <div class="col-md-4">
              <input type="password" name="password" placeholder="max. 30 char." class="form-control" maxlength="30">
              
              </div>
            </div>
                                
                                
                                
                                <div class="form-group">
                                <div class="col-md-6">
                                <div align="center">
                                
                                    <button class="btn btn-info" type="submit"><span class="accept"></span>Change</button>
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
            
            
            
            
            
            
            
                      

              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        </div></div>

        </div> <!-- /.col -->


      </div> <!-- /.row -->
       













