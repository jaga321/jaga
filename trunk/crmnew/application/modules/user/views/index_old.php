<div class="container_8 clearfix">                
<script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>   
                <!-- Main Section -->

                <section class="main-section grid_8">
                    <!-- Forms Section -->
                    <div class="main-content grid_8 alpha">
                        <header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
                            <ul class="action-buttons clearfix fr">
                               
                            </ul>
                            <h2>Add User</h2>
                        </header>
                        <section class="clearfix">
                            <form class="form"  novalidate="novalidate" method="post">
                                <div class="clearfix">
                                    <label>Name <em>*</em><small></small></label><input type="text" name="name" placeholder="Enter your name" required="required">
                                </div>
                                <div class="clearfix">
                                    <label>User Id <em>*</em><small></small></label><input type="uid" name="user_id" placeholder="User Id" required="required">
                                </div>
                                <div class="clearfix">
                                    <label>Password<small></small></label><input type="password" name="password" placeholder="max. 30 char." maxlength="30">
                                </div>
                                
                                
                                <div class="clearfix">
                                    <label>Phone Number <em>*</em><small></small></label><input type="text" name="p_number" placeholder="Phone Number" required="required" maxlength="12">
                                </div>
                                
                                <div class="clearfix">
                                    <label>Address<small></small></label><input type="text" name="address"  placeholder="Address" >
                                </div>
                                
                                <div class="clearfix">
                                    <label>User Type<small></small></label><span class="ui-select"><span class="ui-select-value">Select User</span>
                                    <select name="user_type" id="designation">
                                     <option id="1">Sales Manager</option>
                                     <option id="2">VLE</option>
                                     <option id="3">FLD</option>
                                     <option id="4">Delear</option>
                                    </select><a class="ui-select-button button button-gray"><span></span></a></span>
                                </div>
                                <div class="clearfix" style="display:none;" id="crt_point">
                                    <label>Credit Points <em>*</em><small></small></label><input type="text" name="credit_point" placeholder="Credit Points" required="required" maxlength="12">
                                </div>
                                <div class="action clearfix">
                                    <button class="button button-gray" type="submit"><span class="accept"></span>OK</button>
                                    <button class="button button-gray" type="reset">Reset</button>
                                </div>
                            </form>
                        </section>
                    </div>
                    <!-- End Forms Section -->

                    <!-- Accordion Section -->
                    
                    <!-- End Accordion Section -->

                    <div class="clear"></div>

                    
                    <!-- Tables Section -->
                    <div class="main-content">
                        <header>
                            <input type="text" class="search fr" placeholder="Search...">
                            <h2>Users</h2>
                        </header>
                        <section class="with-table">
                        
                        <table class="datatable tablesort selectable paginate full">
                                <thead>
                                    <tr>
                                    	<th>S.NO</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>User Type</th>
                                        <th>Credit Points </th>
                                        <th>Action</th>
                                        <th style="width: 20px"></th>
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
                                     <td><?php echo $cus["del_point"]; ?></td>
                                      <td width="100px">
                                      <button class="button-red">view</button>
                                      <button class="button-green">Edit</button>
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
                            
                            
                            
                            
                            <ul class="pagination clearfix"><li class="first"><a class="button-blue" href="#">First</a></li><li class="prev"><a class="button-blue" href="#">®</a></li><li class="page"><a class="button-blue current" href="#">1</a></li><li class="page"><a class="button-blue" href="#">2</a></li><li class="page"><a class="button-blue" href="#">3</a></li><li class="next"><a class="button-blue" href="#">¯</a></li><li class="last"><a class="button-blue" href="#">Last</a></li></ul>
                            <div class="container_6 clearfix">
                                <div class="grid_6">
                                   <!-- <div class="message info"><b>TIP:</b> You can press CTRL to select multiple rows</div>-->
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End Tables Section -->
                </section>

                <!-- Main Section End -->

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