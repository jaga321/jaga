<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); echo "<pre>"; print_r($customers); exit;?>

                        <section class="with-table filter_result">
                            <table class="datatable  tablesort selectable paginate full">
                                <thead>
                                    <tr>
                                    	<th>S.NO</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Village</th>
                                        <th>District</th>
                                        <th>Product Type</th>
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
                                     <td><?php echo $cus["userid"]; ?></td>
                                     <td><?php echo $cus["name"]; ?></td>
                                     <td><?php echo $cus["phone"]; ?></td>
                                     <td><?php echo $cus["distic"]; ?></td>
                                     <td><?php echo $cus["village"]; ?></td>
                                     <td><?php echo $cus["product_type"]; ?></td>
                                     <?php if($cus["status"]==0 && $cus["df"]==1 ){ ?>
                                      <td width="100px">
                                      <button id="approval" value="<?=$cus['userid'];?>" class="button-green status app_status_<?=$cus['userid'];?>">Approve</button>
                                      <button class="button-red rejected app_status_<?=$cus['userid'];?>" >Reject</button>
                                     </td>
                                     <?php } else { ?>
                                      <td width="100px">
                                       <?=($cus['approval_status']==1)?'<label class="status_approval" style="color:green">Approved</label>':'<label style="color:red" class="status_approval">Rejected
									   </label>'; ?>
                                      </td>
                                     
                                     <?php }
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
                            <div class="container_6 clearfix">
                          
                                
                            </div>
                        </section>
 <?php
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

header("Content-Disposition: attachment; filename=\"Service Request Lists Export_".date("Y-m-d").".xls\"");

header("Content-Transfer-Encoding: binary");
header("Pragma: no-cache");
header("Expires: 0");
?>  