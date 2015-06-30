
 
  <?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); 
  ?>
  <script src="<?= $theme_path; ?>/js/jquery-1.8.2.js" type="text/javascript"></script>
<script src="<?= $theme_path; ?>/js/jquery-ui-1.10.3.min.js"></script>
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
        <h2 class="content-header-title">Lead View</h2>
        <ol class="breadcrumb">
        </ol>
          
        <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      
    </div>
      </div> <!-- /.content-header -->
      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                View
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content"> 
            
            
            
            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                     <th>LEAD.No</th>
                                        <th>Enquiry source</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Village</th>
                                        <th>District</th>
                                        <th>Product Type</th>
                                        <th>Period</th>
                                        <th>Dealer</th>
                                        <th>Status</th>
                                        <th>Allocated to</th>
                                        <th>Action</th>
                                           
                                        
                                    </tr>
                                </thead>
                                
									<?php 
                                   //echo "<pre>"; print_r($customers); exit;
                                    
                                    if(isset($customers) && !empty($customers))
                                        {
                                            $i=1;
                                            foreach($customers as $cus) 
                                            { 
                                    ?>   
                                     <tr>
                                     <td>LEAD00<?php echo "$i";?></td>
                                     <td><?php echo $cus["username"]; ?></td>
                                     <td><?php echo $cus["name"]; ?></td>
                                     <td><?php echo $cus["phone"]; ?></td>
                                     <td><?php echo $cus["distic"]; ?></td>
                                     <td><?php echo $cus["village"]; ?></td>
                                     <td><?php echo $cus["product_type"]; ?></td>
                                     <td><?php echo $cus["lead"][0]['days']; ?></td>
                                     <td><?php echo ($cus["lead"][0]['dealer']==1)?'NO':'Yes'; ?></td>
                                     <td><?php echo $cus["lead"][0]['status']; ?></td>
                                     <td><?php echo $cus["lead"][0]['delr_id']; ?></td>
                                     <td width="">
                                     <a href="#test1_<?php echo $cus["lead"][0]['id']; ?>" data-toggle="modal" name="edit" class="btn btn-secondary btn-xs" title="Edit"><span class="fa fa-edit"></span></a>
                                       
										 </td>
                                       
                            <?php   $i++;
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
                            <?php
							if(isset($customers) && !empty($customers))
                                        {
                                            $i=1;
                                            foreach($customers as $cus) 
                                            { 
                                    ?>   
                 <?php } }?>
               <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->
            

          </div> <!-- /.portlet -->

        </div></div>

        </div> <!-- /.col -->

      </div> <!-- /.row -->
       <script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>
      
    
           
            
<script>
$(".go").live('click',function() 
{
	
	
   idno=($(this).attr('class'));
  
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   var days=$('.days_cls'+id).val();
   var user_id=$('.user_id_'+id).val();
   var dealer=$('.dealer_'+id).val();
   var status=$('.status_'+id).val();
   var d_stats=$('.check_'+id).val();
  // var d_stats=$("input[name=d_stats"+id+"]:checked").val();
   //alert(d_stats); return false;
   if(days != '' && d_stats != 'undifined' )
  {
	  
   $.ajax({
	      url:BASE_URL+"lead/add_lead",
		  type:'post',
		  data:{ id:id,days:days,d_stats:d_stats,user_id:user_id,dealer:dealer,status:status},
		  success:function(result){
			 // alert(result);
			  //$('#test').html(result);
		 	window.location.href = BASE_URL+'lead/';
			  // for_response_del('Data Delete Successfully...!'); // resutl notification   
         }
   });
  }
 else
  {
	  alert('Day and Dealer should no be empty');
  }
});


$(".up_lead").live('click',function() 
{
	
   idno=($(this).attr('class'));
   
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   var lead_id=$('.lead_id_'+id).val();
   var days=$('.days_cls'+id).val();
   var user_id=$('.user_id_'+id).val();
   var dealer=$('.dealer_'+id).val();
   var status=$('.status_'+id).val();
   var d_stats=$('.check_'+id).val();
 // alert(d_stats); return false;
 if(days != '' )
  {
	  
   $.ajax({
	      url:BASE_URL+"lead/up_lead",
		  type:'post',
		  data:{ id:id,days:days,d_stats:d_stats,user_id:user_id,dealer:dealer,status:status,lead_id:lead_id},
		  success:function(result){
			 // $('#test').html(result);
		 	 window.location.href = BASE_URL+'lead/';
			  // for_response_del('Data Delete Successfully...!'); // resutl notification   
         }
   });
  }
  else
  {
	  alert('Days should not be empty');
  }
  
});

$(".update").live('click',function() 
{
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   $('.update_button_'+id).css('display','none');
   $('.app_'+id).css('display','block');
   $(".check_"+id).attr("disabled",false);
   $(".days_cls"+id).attr("disabled",false);
    $(".status_"+id).attr("disabled",false);
   
   //alert(id); return false;
});

$(".edit").live('click',function() 
{
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   $('.update_first_'+id).css('display','none');
   
   $('.app_status_'+id).css('display','block');
   $(".check_"+id).attr("disabled",false);
   $(".days_cls"+id).attr("disabled",false);
    $(".status_"+id).attr("disabled",false);
   //alert(id); return false;
});

/*$(".no_delr").live('change',function() 
{
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   alert(id); return false;
   $('.dealer_'+id).css('display','block');
   $('.all_'+id).css('display','none');
   //alert(id); return false;
});
*/
$(".yes_delr").live('change',function() 
{
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   var d_option=$('.check_'+id).val();
   if(d_option==2)
   {
		$('.dealer_'+id).css('display','block');
		$('.all_'+id).css('display','none');
   }
   else
   {
		$('.dealer_'+id).css('display','none');
		$('.all_'+id).css('display','block');
   }
   
   //alert(id); return false;
});


/*$("#dealer_up").live('change',function() 
{
  var id=($(this).attr('id'));
  var splitNumber = id.split('_');
   var id=splitNumber[2];
   alert(id);
   if(id==1)
   {
	   $('#name_deal').val("");
		 onr=$('#name_deal')+id.hide(200);
		 $('#name_deal')+id.val("");
		 nam=$('#test_deal')+id.hide(200);
		
   }
   if(id==2)
   {
		onr=$('#name_deal')+id.show(200);
		nam=$('#test_deal')+id.show(200);
   }
   
   //alert(id); return false;
});
*/


 </script>  
          