<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?>
<div class="portlet-content filter_result"> 
            <table 
                class="table table-striped table-bordered table-hover table-highlight table-checkable" id="test_export" 
                data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true"
              >
                <thead>
                    <tr>
                        <?php
                            $user_det = $this->session->userdata('logged_in'); 
                            if($user_det['log_type']!='Agent'){ ?>
                        <th><input type="checkbox" name="allocate" class="chkSelectAll test_hide"/></th>
                        <?php } ?>
                        <th  data-sortable="true">S.NO</th>
                        <th  data-sortable="true">Enquiry source</th>
                        <th  data-sortable="true">Name</th>
                        <th  data-sortable="true">Phone Number</th>
                        <th  data-sortable="true">Village</th>
                        <th  data-sortable="true">District</th>
                        <th  data-sortable="true">Product Type</th>
                         <th  data-sortable="true">Date</th>
                        <!-- <th  data-sortable="true">Source</th>-->
                        <th  data-sortable="true">Status</th>
                        <?php if($user_det['log_type']!='Agent'){ ?>
                        <th  data-sortable="true">Allocated to</th>
                        <?php } ?>
                        <th>Action</th>
                   
                    </tr>
                </thead>
                
                    <?php 
                    /*echo "<pre>";
                    print_r($customers);
                    exit;*/
                    
                    if(isset($customers) && !empty($customers))
                        {
                            $i=1;
                            foreach($customers as $cus) 
                            { 
                    ?>   
                     <tr> 
                     <?php
                     if($user_det['log_type']!='Agent'){
                         if($cus['agent_id']!=0)
                         { ?>
                         <td></td>
                     <?php } else { ?>
                     <td><input type="checkbox" name="allocate"  class="all_cate test_hide" value="<?=$cus['id'];?>"/></td>
                     <?php }  } ?>
                     <td><?php echo "$i";?></td>
                     <td><?php echo $cus["username"]; ?></td>
                     <td><?php echo $cus["name"]; ?></td>
                     <td><?php echo $cus["phone"]; ?></td>
                     <td><?php echo $cus["distic"]; ?></td>
                     <td><?php echo $cus["village"]; ?></td>
                     <td><?php echo $cus["product_type"]; ?></td>
                     <td><?php echo ($cus['post_dt']==0)?'--':date("d-M-Y",strtotime($cus["post_dt"])); ?></td>
                     <!--<td><?php echo ($cus["source"]); ?></td>-->
                     <td><?php if($cus["approval_status"]==2){echo '<label style="color:red" class="status_approval">Rejected</label>';} 
                        else if($cus["approval_status"]==1){echo '<label class="status_approval" style="color:green">Approved</label>';}
                        else{echo '<label class="status_approval" style="color:blue">Pending</label>';} ?>
                     </td>
                      <?php if($user_det['log_type']!='Agent'){ ?>
                     <td>
                      <?php if(isset($cus["allocate"]) && !empty($cus["allocate"]))
                        {
                            echo $cus['allocate'][0]['ag_al_user'];
                        }
                        else
                        {
                            echo "";
                        } ?>
                    
                     </td>
                     <?php } ?>
                    
                      <td width="">
                      <!--<button id="approval" value="<?=$cus['id'];?>" class="button-green status app_status_<?=$cus['id'];?>">Approve</button>
                      <button class="button-red rejected app_status_<?=$cus['id'];?>" >Reject</button>-->
                      <a href="<?php echo $this->config->item('base_url')?>enquiry/edit_enquiry/<?=$cus['id'];?>" ><i class="fa fa-edit btn btn-info btn-sm"></i></a>
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
                         <td colspan="12">No Data Found</td>
                        </tr>
                       <?php
              }
               ?>
                    
                   
                   
            </table>
            
            
            
                      

               <!-- /.table-responsive -->
              

            </div>