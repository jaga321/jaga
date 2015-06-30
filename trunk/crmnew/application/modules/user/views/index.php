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
         <ol class="breadcrumb">
         </ol>
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-cogs"></i>
            </button>
         </div>
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
                     <div class="form-group">
                        <label class="col-md-2">Name</label>
                        <div class="col-md-4">
                           <input type="text" name="name" class="form-control" placeholder="Enter your name" required="required">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2">User Id</label>
                        <div class="col-md-4">
                           <input type="uid" name="user_id" class="form-control" placeholder="User Id" required="required">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2">Password</label>
                        <div class="col-md-4">
                           <input type="password" name="password" class="form-control" required="required" placeholder="max. 30 char." maxlength="30">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2">Phone Number</label>
                        <div class="col-md-4">
                           <input type="text" name="p_number" placeholder="Phone Number" class="form-control" required="required" maxlength="12">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2">Address</label>
                        <div class="col-md-4">
                           <textarea name="address" required="required" class="form-control"  ></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2">User Type</label>
                        <div class="col-md-4">
                           <select  name="user_type" id="designation" class="form-control">
                              <option id="2">VLE</option>
                              <option id="3">FLD</option>
                              <option id="4">Delear</option>
                              <option id="5">Agent</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group" style="display:none;" id="crt_point">
                        <label class="col-md-2">Credit Points</label>
                        <div class="col-md-4">
                           <input type="text" name="credit_point" placeholder="Credit Points" class="form-control"  maxlength="12">
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
                  <div class="portlet-header">
                     <h3>
                        <i class="fa fa-table"></i>
                        View
                     </h3>
                  </div>
                  <hr />
                  <table class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>S.NO</th>
                           <th>Name</th>
                           <th>User Id</th>
                           <th>Phone Number</th>
                           <th>Address</th>
                           <th>User Type</th>
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
                           <a href="<?=$this->config->item('base_url').'user/delete_user/'.$cus['id']?>" title="Delete" class="fa fa-eraser btn btn-danger btn-sm" ><span class="bin"></span></a>
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
                  <!-- /.table-responsive -->
               </div>
               <!-- /.portlet-content -->
            </div>
            <!-- /.portlet -->
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