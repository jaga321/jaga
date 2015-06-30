
 <div class="portlet-content filter_result"> 
 <table class="table table-bordered tablesort selectable paginate full" id="test_export">
                                <thead>
                              
                                    

                                    <tr>
                                    	<?php
											$user_det = $this->session->userdata('logged_in'); 
											if($user_det['log_type']!='Agent'){ ?>
                                    	<th><input type="checkbox" name="allocate" class="chkSelectAll test_hide"/></th>
                                        <?php } ?>
                                    	<th>S.NO</th>
                                        <th>Enquiry source</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Village</th>
                                        <th>District</th>
                                        <th>Product Type</th>
                                        <th>Status</th>
                                        <th>Allocated to</th>
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
                                     <td><?php if($cus["approval_status"]==2){echo '<label style="color:red" class="status_approval">Rejected</label>';} 
                                     	else if($cus["approval_status"]==1){echo '<label class="status_approval" style="color:green">Approved</label>';}
										else{echo '<label class="status_approval" style="color:blue">Pending</label>';} ?>
                                     </td>
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
                            
   </div>                         
<script type="text/javascript">
    $(function () {
     
      $('.chkSelectAll').on('click',function()
	  {
		
        $('.all_cate').attr('checked', $(this).is(':checked'));
		
      });

      $('.all_cate').on('click',function()
	  {
        if ($('.all_cate:checked').length == $('.all_cate').length) 
		{
          $('.chkSelectAll').attr('checked', true);
        }
        else 
		{
          $('.chkSelectAll').attr('checked', false);
        }
      });

    });
	
	$('#a_allocate').on('click',function()
	{
		var agent_id=$('#agent_id').val();
		    myarray=[];
			var i=0;
			$(".all_cate").each(function ()
			{
				var t=$(this).val(); 
				
				if ($(this).is(":checked"))
				{
					myarray[i]=$(this).val();
					i++;
				}
			});
			//console.log(myarray); return false;
		 $.ajax({
		  url:BASE_URL+"enquiry/allocate_agent",
		  type:'post',
		  data:{ agent_id:agent_id,myarray:myarray},
		  success:function(result){
		 //$('#table_result').html(result);
		 window.location.href = BASE_URL+'enquiry/';
      }    
    
    });
	
});
	
  </script>