  <?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); 

  $user_det = $this->session->userdata('logged_in');
 
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
        <h2 class="content-header-title">Add Enquiry</h2>        
      </div> <!-- /.content-header -->
      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                Add
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content"> 
            
            <form class="form-horizontal"   method="post">
            <div class="row">
            <?php if($user_det['log_type']!='Agent'){ ?>
           		<div class="col-md-6">
                      <input type="hidden" name="enquiry[post_dt]" value="<?php echo $cur_time = date("Y-m-d H:i:s"); ?>" class="form-control">
                        <input type="hidden" name="enquiry[source]" value="website" class="form-control">
                    
                       
                    <div class="form-group">
                      <label class="col-md-4">User Name</label>
                      <div class="col-md-8">
                      <select name="enquiry[userid]" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php 
                                                    if(isset($users) && !empty($users))
                                                    {
                                                        foreach($users as $val)
                                                        {?>
                                                           
                                                            <option value="<?=$val['user_id']?>" ><?=$val['username']?></option>
                                                        
                                                  <?php }
                                                    }?>
                                                    
                                                </select>
                     
                       </div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-md-4">Name</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[name]" placeholder="Enter your name" class="form-control" required="required">
                       
                         <input type="hidden" name="enquiry[agent_id]"  value="" class="form-control" maxlength="30">
                       </div>
                    </div>
                    
                   
                    <div class="form-group">
                      <label class="col-md-4">Phone Number</label>
                      <div class="col-md-8">
                      <input type="uid" name="enquiry[phone]" placeholder="Phone Number" class="form-control" required="required" maxlength="12">
                      
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-md-4">District</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[distic]" placeholder="District" class="form-control" required="required" maxlength="30">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="form-group">
                      <label class="col-md-4">Village</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[village]" placeholder="Village" required="required" class="form-control" maxlength="30">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4">Product Type</label>
                      <div class="col-md-8">
                      <select name="enquiry[product_type]" class="form-control" placeholder="Prouduct Type" required="required">
                        <option value="3HP">3HP</option>
                        <option value="5HP">5HP</option>
                        <option value="7.5HP">7.5HP</option>
                        <option value="10HP">10HP</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4">Remarks</label>
                      <div class="col-md-8">
                      <textarea name="enquiry[remarks]" placeholder="Remarks" required="required" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="form-group">
            <div class="col-md-12">
            <div align="center">
            
                <button class="btn btn-info" type="submit"><span class="accept"></span>Add</button>
                <button class="btn btn-warning" type="reset">Reset</button>
                </div>
                </div>
            </div>
            <?php } else
			{?>
            <div class="clearfix"></div>
            <div class="row">
           		<div class="col-md-6">
                	<div class="form-group">
                      <label class="col-md-4">User Name</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[userid]" placeholder="Enter your name" value="<?php echo $user_det['userid'];?>" class="form-control" required="required" readonly="readonly">
                      <input type="hidden" name="enquiry[agent_id]" placeholder="Remarks" value="<?php echo $user_det['user_id'];?>" class="form-control" maxlength="30">
                      <input type="hidden" name="enquiry[post_dt]" value="<?php echo $cur_time = date("Y-m-d H:i:s"); ?>" class="form-control">
                        <input type="hidden" name="enquiry[source]" value="website" class="form-control">
                      
                       </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4">Name</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[name]" placeholder="Enter your name" class="form-control" required="required">
                      
                       </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4"></label>
                      <div class="col-md-8">
                      <input type="hidden" name="enquiry[post_dt]" value="<?php echo $cur_time = date("Y-m-d H:i:s"); ?>" class="form-control" required="required" maxlength="12">
                      
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-md-4">Phone Number</label>
                      <div class="col-md-8">
                      <input type="uid" name="enquiry[phone]" placeholder="Phone Number" class="form-control" required="required" maxlength="12">
                      
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-md-4">District</label>
                      <div class="col-md-8">
                      <input type="text" name="enquiry[distic]" placeholder="District" class="form-control" required="required" maxlength="30">
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="form-group">
                          <label class="col-md-4">Village</label>
                          <div class="col-md-8">
                          <input type="text" name="enquiry[village]" placeholder="Village" required="required" class="form-control" maxlength="30">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4">Product Type</label>
                          <div class="col-md-8">
                          <select name="enquiry[product_type]" class="form-control" placeholder="Prouduct Type" required="required">
                            <option value="3HP">3HP</option>
                            <option value="5HP">5HP</option>
                            <option value="7.5HP">7.5HP</option>
                            <option value="10HP">10HP</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4">Remarks</label>
                          <div class="col-md-8">
                          <input type="text" name="enquiry[remarks]" placeholder="Remarks" required="required" class="form-control" maxlength="30">
                          </div>
                        </div>
                </div>
             </div>   
            
            
            <div class="form-group">
            <div class="col-md-6">
            <div align="center">
            
                <button class="btn btn-info submit" type="submit"><span class="accept"></span>Add</button>
                <button class="btn btn-warning" type="reset">Reset</button>
                </div>
                </div>
            </div>
            <?php } ?>
            
                            </form>
            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        </div></div>

        </div> <!-- /.col -->


      </div> <!-- /.row -->
      
      
             </div>
 <script>
$("#designation").live('change',function() 
{
   id=$(this).val();
   if(id=='Delear')
   {
	  $('#crt_point').css('display','block');
   }
   else
   {
	$('#crt_point').css('display','none');   
   }
});
</script>

 <script type="text/javascript">
   		$(document).ready(function(){
			$('input,.form-control').attr('autocomplete','off');
			$('.mail').live('keyup',function(){
				$(this).val($(this).val().toLowerCase());
			});
			$('form').submit(function() {
				$('input:submit').attr("disabled", true);
				$('input:submit').val('Please wait Processing');
			});
		});
            var BASE_URL = '<?php echo $this->config->item('base_url');  ?>';
			
        </script>


