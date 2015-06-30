  <?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); 
  ?>
 <script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>   
  
  <div class="content">
    <div class="content-container">
      <div class="content-header">
        <h2 class="content-header-title">Edit View</h2>
        <ol class="breadcrumb">
        </ol>
          
        <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      
    </div>
      </div> 
      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            

            <div class="portlet-content">
            <?php
			$user_det = $this->session->userdata('logged_in');
			
												
                        if(isset($by_id) && !empty($by_id))
											{
												foreach($by_id as $val)
												{?>
                                                
                                                
           <form class="form-horizontal" role="form" method="post">
           <div class="row">
           	<div class="col-md-6">
            	<div class="form-group">
                  <label class="col-md-4">Enquiry Source</label>    
                  <div class="col-md-8">                 
                   <input class="form-control" type="text" name="enquiry_edit" value="<?=$val['userid'] ?>"
                   placeholder="Enter your name" required="required" readonly="readonly">
                  </div>
                </div>
    
                <div class="form-group">
                  <label class="col-md-4">Name</label>    
                  <div class="col-md-8">
                    <input type="text" name="name_edit" class="form-control" placeholder="Enter your name" value="<?=$val['name'] ?>" required="required">
                  </div>
                </div>
                
    
                <div class="form-group">
                  <label class="col-md-4">Phone Number</label>    
                  <div class="col-md-8">
                  <input type="text" name="phone_edit" class="form-control" value="<?=$val['phone'] ?>"  placeholder="Phone Number" maxlength="12" required="required" >
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4">District</label>
                  <div class="col-md-8">
                  <input type="text" name="distic_edit" class="form-control" value="<?=$val['distic'] ?>" placeholder="District" maxlength="30">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="form-group">
                  <label class="col-md-4">Village</label>
                  <div class="col-md-8">
                  <input type="text" name="village_edit" placeholder="Village" class="form-control" value="<?=$val['village'] ?>" required="required" maxlength="12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4">Product Type</label>
                  <div class="col-md-8">
                  <select name="product_edit" class="form-control" required="required">
                                        
                                        <?php if($val['product_type']=='7.5HP')
                                                { ?>	
                                                <option selected="selected" value="7.5HP">7.5HP</option>
                                                <?php }
                                                else
                                                { ?>
                                                    <option value="7.5HP">7.5HP</option>
                                                    <?php } 
                                                    if($val['product_type']=='5HP')
                                                { ?>	
                                                <option selected="selected" value="5HP">5HP</option>
                                                <?php }
                                                else
                                                { ?>
                                                    <option value="5HP">5HP</option>
                                                         <?php } 
                                                    if($val['product_type']=='3HP')
                                                { ?>	
                                                <option selected="selected" value="3HP">3HP</option>
                                                <?php }
                                                else
                                                { ?>
                                                    <option value="3HP">3HP</option>
                                            <?php	} 
                                            if($val['product_type']=='10HP')
                                                { ?>	
                                                <option selected="selected" value="10HP">10HP</option>
                                                <?php }
                                                else
                                                { ?>
                                                    <option value="10HP">10HP</option>
                                            <?php	} 
                                            
                                            ?>
                                        </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-md-4">Status</label>
                  <div class="col-md-8">
                  <input type="radio" name="st_edit"  value="1" <?php echo ($val['approval_status']=='1')?'checked':'' ?>  >Approved
                  <input type="radio" name="st_edit" value="2" <?php echo ($val['approval_status']=='2')?'checked':'' ?> >Rejected
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4">Remarks</label>
                  <div class="col-md-8">
                  <textarea  rows="4" readonly="readonly" class="form-control"> <?php echo $val["remarks"]; ?></textarea>
                  </div>
                </div>
            </div>
           </div>
            
            <div class="clearfix"></div>
            
             <div class="col-md-6">
            <div class="form-group" align="center">
                                    <button class="btn btn-secondary" type="submit"><span class="accept"></span>Update</button>
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                </div>
                                </div>
                                <?php }}?>
          </form>

              

            </div> 

          </div> 

        </div></div>

        </div> 

      </div>
      
     