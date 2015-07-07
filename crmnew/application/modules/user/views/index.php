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
         <h2 class="content-header-title">Add User</h2>
      </div>
      <!-- /.content-header -->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet">
               <div class="portlet-header">
                  <h3>
                     <i class="fa fa-table"></i>
                     Add
                  </h3>
               </div>
               <!-- /.portlet-header -->
               <div class="portlet-content">
                  <form class="form-horizontal"   method="post">
                  	<div class="row">
           				<div class="col-md-6">
                        	<div class="form-group">
                                <label class="col-md-4">Name</label>
                                <div class="col-md-8">
                                   <input type="text" name="name" class="form-control" placeholder="Enter your name" required="required">
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4">User Id</label>
                                <div class="col-md-8">
                                   <input type="uid" name="user_id" class="form-control" placeholder="User Id" required="required">
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4">Password</label>
                                <div class="col-md-8">
                                   <input type="password" name="password" class="form-control" required="required" placeholder="max. 30 char." maxlength="30">
                                </div>
                             </div>
                        </div>
                        <div class="col-md-6">
                        	<div class="form-group">
                                <label class="col-md-4">Phone Number</label>
                                <div class="col-md-8">
                                   <input type="text" name="p_number" placeholder="Phone Number" class="form-control" required="required" maxlength="12">
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4">Address</label>
                                <div class="col-md-8">
                                   <textarea name="address" required="required" class="form-control"  ></textarea>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4">User Type</label>
                                <div class="col-md-8">
                                   <select  name="user_type" id="designation" class="form-control">
                                      <option id="2">VLE</option>
                                      <option id="3">FLD</option>
                                      <option id="4">Delear</option>
                                      <option id="5">Agent</option>
                                   </select>
                                </div>
                             </div>
                             <div class="form-group" style="display:none;" id="crt_point">
                                <label class="col-md-4">Credit Points</label>
                                <div class="col-md-8">
                                   <input type="text" name="credit_point" placeholder="Credit Points" class="form-control"  maxlength="12">
                                </div>
                             </div>
                        </div>
                     </div>
                     
                     
                     <div class="form-group">
                        <div class="col-md-6">
                           <div align="center">
                              <button class="btn btn-info" type="submit"><span class="accept"></span>Add</button>
                              <button class="btn btn-warning" type="reset">Reset</button>
                           </div>
                        </div>
                     </div>
                  </form>
                  
                  <!-- /.table-responsive -->
               </div>
               
               
               <!-- /.portlet-content -->
            </div>
            <div class="portlet">
            <div class="portlet-header">
                     <h3>
                        <i class="fa fa-table"></i>
                        View
                     </h3>
                  </div>
                  <div class="portlet-content filter_result">
                  <table class="table table-striped table-bordered table-hover table-highlight table-checkable" id="test_export" 
                        data-provide="datatable" 
                        data-display-rows="10"
                        data-info="true"
                        data-search="true"
                        data-length-change="true"
                        data-paginate="true">
                     <thead>
                        <tr>
                           <th>S.NO</th>
                           <th  data-sortable="true">Name</th>
                           <th  data-sortable="true">User Id</th>
                           <th>Phone Number</th>
                           <th  data-sortable="true">Address</th>
                           <th  data-sortable="true">User Type</th>
                           <th>Credit Points </th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <?php 
                        //print_r($customers);
                        //exit;
                        
                        if(isset($customers) && !empty($customers))
                            {
                                $i=1;
                                foreach($customers as $cus) 
                                { 
                        ?>   
                     <tr>
                        <td><?php echo "$i";?></td>
                        <td><?php echo $cus["username"]; ?></td>
                        <td><?php echo $cus["user_id"]; ?></td>
                        <td><?php echo $cus["phone_no"]; ?></td>
                        <td><?php echo $cus["address"]; ?></td>
                        <td><?php echo $cus["log_type"]; ?></td>
                        <td><?php if($cus["del_point"]!=""){
                           echo $cus["del_point"];
                           }
                           else
                           {
                           echo "Not a Dealer";
                           }?></td>
                        <td>
                           <a href="<?=$this->config->item('base_url').'user/edit_user/'.$cus['id']?>" title="Edit" class="fa fa-edit btn btn-info btn-sm"></span></a>
                          
                            <a href="#test1_<?php echo $cus['id']; ?>" data-toggle="modal" name="Delete" 
                                        	class="fa fa-eraser btn btn-danger btn-sm" ><span class="bin"></span></a>
                        </td>
                        <?php 
                           $i++;
                           }
                           }
                           else
                           {
                           ?>
                     </tr>
                     <tr>
                        <td colspan="7">No Data Found</td>
                     </tr>
                     <?php
                        }
                         ?>
                  </table>
                  </div>
                  </div>
            <!-- /.portlet -->
            <?php 
             if(isset($customers) && !empty($customers))
                            {
                                $i=1;
                                foreach($customers as $cus) 
                                { 
                        ?>   
            
            <div id="test1_<?php echo $cus['id']; ?>" class="modal modal-styled fade in" tabindex="-1" role="dialog" 
                    aria-labelledby="myModalLabel" aria-hidden="false" align="center">
                   		 <div class="modal-dialog">
                    		<div class="modal-content">
                  			  <div class="modal-header"><a class="close" data-dismiss="modal">*</a>   
                  				  <h3 id="myModalLabel">Delete</h3>
                   			 </div>
                   		  <div class="modal-body">
                   			 <form action="<?php echo $this->config->item('base_url'); ?>lead/up_lead"  name="form" onsubmit="return(validate());" method="post">
                   			 <div class="row">
                   				 <div class="col-sm-12">
                    <table width="100%">
                    	<tr>
                            
                            <input type="hidden" name="id" id="id" class="id" value="<?php echo $cus['id'] ?>" />
                           
                            <td>Do You Want Delete?<span style="color:#0CF"><?php echo $cus['username'] ?></span></td>
                   	   </tr>
                       
                           
                        <tr>
                             <td></td>
                        </tr>
                   </table>
                   
                    
                    <table width="100%">
                    <td>&nbsp;&nbsp;</td>
                         <tr>
                            <td style="width: 107px;">&nbsp;</td>
                            <td>
                                
                                 <a href="<?=$this->config->item('base_url').'user/delete_user/'.$cus['id']?>" title="Delete" class="btn btn-warning btn-sm" >Delete</a>
                                <button type="reset" class="btn btn-danger btn-sm"  id="no" data-dismiss="modal">Discard</button>
                            </td>
                        </tr>
                    </table>
			</div>
		</div>    
	</form>
	</div>
	</div>
	</div>       
</div><?php }} ?>
         </div>
      </div>
   </div>
   <!-- /.col -->
</div>
<!-- /.row -->
<script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>
<script src="<?= $theme_path; ?>/js/jquery-ui-1.10.3.min.js"></script>
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
<script>
   function newDoc() {
       window.location.assign("../index")
   }
</script>
