<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template');?>
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
		</div> <!-- /.content-header -->
	<div class="row">
		<div class="col-md-12">
			<div class="portlet">
    			<div class="portlet-header">
					<h3 style="width:100%"><i class="fa fa-table"></i> View 
                    	<table class="pull-right">
                        <tr>
                         <?php $user_det = $this->session->userdata('logged_in'); 
						       if($user_det['log_type']!='Agent'){?>
                                      
                                     
                        <td>
                         <a href="<?php echo $this->config->item('base_url')?>lead/lead_export" ><button type="button" class="btn btn-info btn-xs">Export</button></a>
                        
                        </td>   <?php }?>
                        </tr></table>
                    </h3>
                    
				</div> <!-- /.portlet-header -->
                 
					<div class="portlet-content filter_result">
                    <table class="table table-striped table-bordered table-hover table-highlight table-checkable" id="export_test" 
                        data-provide="datatable" 
                        data-display-rows="10"
                        data-info="true"
                        data-search="true"
                        data-length-change="true"
                        data-paginate="true"
                           >
                   		 <thead>
                           <tr>
                            <th data-sortable="true">LEAD.No</th>
                            <th data-sortable="true">Enquiry source</th>
                            <th data-sortable="true">Name</th>
                            <th>Phone Number</th>
                            <th data-sortable="true">Village</th>
                            <th data-sortable="true">District</th>
                            <th data-sortable="true">Product Type</th>
                            <th data-sortable="true">Date</th>
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
                    	<td>LEAD00<?php echo $cus['lead'][0]["id"];?></td>
                   		<td><?php echo $cus["username"]; ?></td>
                    	<td><?php echo $cus["name"]; ?></td>
                    	<td><?php echo $cus["phone"]; ?></td>
                    	<td><?php echo $cus["distic"]; ?></td>
                    	<td><?php echo $cus["village"]; ?></td>
                    	<td><?php echo $cus["product_type"]; ?></td>
                    	<td><?php echo ($cus['lead'][0]['post_dt']==0)?'--':date("d-M-Y",strtotime($cus['lead'][0]["post_dt"])); ?></td>
                       
                            <input type="hidden" value="<?=$cus['userid'];?>" name="user_id" class="user_id_<?=$cus['id'];?>" />
                            <?php if(!empty($cus["lead"][0]['l_id']))
                                    { ?>
                                        <input type="hidden" value="<?=$cus["lead"][0]['l_id'];?>" name="lead_id" class="lead_id_<?=$cus['id'];?>" />
                              <?php }?>
                        
                        <td>
                            <input type="text" id="days" class="days_cls<?=$cus['id'];?>" maxlength="2" value="<?=(!empty($cus["lead"][0]['days']))?''.
                            $cus["lead"][0]['days'].'':'';?>" style="width:20px" disabled="disabled" required="required" />
                        </td>
                        <td> 
                            <select  name="d_stats<?=$cus['id'];?>" class="yes_delr check_<?=$cus['id'];?>"  disabled="disabled">
								<?php if($cus["lead"][0]['dealer']=='1')
                                        { ?>
                                            <option selected="selected" value="1">Yes</option>	
                                 <?php	}
                                         else
                                            { ?>
                                                 <option value="1">Yes</option>	
                                     <?php 	}
                                    if($cus["lead"][0]['dealer']=='2')
                                         { ?>
                                             <option selected="selected" value="2">No</option>	
                                    <?php }
                                            else
                                            { ?>
                                             <option value="2">No</option>	
                                    <?php	}?>
                          </select>
                    	</td>
                    <td width="">
                    	<select  class="status_<?=$cus['id'];?>" style="width:70px;float:left;" id="agent_id" disabled="disabled">
                   			 <?php if($cus["lead"][0]['status']=='Pending site visit')
                    				{ ?>	
                    					<option selected="selected" value="Pending site visit">Pending site visit</option>
                    		   <?php }
                   					 else
                    					{ ?>
                    						<option value="Pending site visit">Pending site visit</option>
                   				 <?php	}
                   			   if($cus["lead"][0]['status']=='Site visit completed')
                    				{ ?>
                    					<option  value="Site visit completed" selected="selected">Site visit completed</option>
                   			  <?php }
                   					 else
                 					   { ?>
                   						 <option  value="Site visit completed">Site visit completed</option>
                  				  <?php	}
                    		  if($cus["lead"][0]['status']=='Advance Recived')
                    				{ ?>
                    					<option selected="selected" value="Advance Received">Advance Received</option>
                    		   <?php }
                    					else
                    						{ ?>
                    							<option  value="Advance Received">Advance Received</option>
                   					   <?php }
                    		 if($cus["lead"][0]['status']=='BLP')
                    			{ ?>
				                    <option selected="selected" value="BLP">BLP</option>
                    	   <?php }
                   				 else
                   					 { ?>
                   						 <option  value="BLP">BLP</option>
                 			   <?php }
                   		   if($cus["lead"][0]['status']=='BLP Completed')
                    			{ ?>
                   					 <option selected="selected" value="BLP Completed">BLP Completed</option>
                   		  <?php }
                   				 else
                    				{ ?>
                    					<option  value="BLP Completed">BLP Completed</option>
                    		  <?php }
                   		   if($cus["lead"][0]['status']=='Installed Completed')
                   			 { ?>
                   				 <option selected="selected" value="Installed Completed">Installed Completed</option>
                  	    <?php }
                    			else
                   				 { ?>
                    				<option  value="Installed Completed">Installed Completed</option>
                   		    <?php }
                    	  if($cus["lead"][0]['status']=='Subsidy Completed')
                    		{ ?>
                    			<option selected="selected" value="Subsidy Completed">Subsidy Completed</option>
                       <?php }
                    		else
                   			 { ?>
                    			<option  value="Subsidy Completed">Subsidy Completed</option>
                    	<?php }?>
                    </select>
                 </td>
                    <td>
						<?php /*?><div class="all_<?=$cus['id'];?>">All</div><?php */?>
                        
                        <?php
                        if(isset($cus['lead']) && !empty($cus['lead']))
                       	 {
                      	  foreach($cus['lead'] as $cl)
                       		 {
                        		if($cl['delr_id']!=null)
                       			 {
                       				 echo $cl['delr_id'];
                       			 }
                       			 else
                       			 {
                       				 ?>
                        				<div class="all_<?=$cus['id'];?>">All</div>
                      			 	 <?php
                       			 }
                       		 }
                       	 }
                        ?>
                        <select  class="dealer_<?=$cus['id'];?>" style="width:70px;float:left; display:none" id="" >
                       	 <option value="">Select</option>
                       		 <?php foreach ($cust as $val1)
                      				  { ?>
                       					 <option class="one"  value="<?php echo $val1["user_id"]; ?>"><?php echo $val1["username"]; ?></option>
                        		 <?php }?>
                        </select>
                    </td>
                        <!--<td width="">
                        <?php if(isset($cus["buyer"]) && !empty($cus["buyer"]))
                                {
                                     echo $cus['buyer'][0]['buyer'];
                                }
                             else
                                 {
                                     echo "";
                                 } ?>	
                        </td>-->
                    <td width="">
                    <?php
                   		 if(!empty($cus["lead"][0]['days']) )
                   			 {
                    			if(!empty($cus["lead"][0]['dealer']) || !empty($cus["lead"][0]['days']))
                   					 {?>
                    					<a href="#test1_<?php echo $cus["lead"][0]['id']; ?>" data-toggle="modal" name="edit" 
                                        	class="btn btn-secondary btn-xs" title="Edit"><span class="fa fa-edit"></span></a>
                   			   <?php }
                    		  }
                    		  else
                    			{?>
                    				<button value="<?=$cus['userid'];?>" style="display:none" class="button-green submit go app_status_<?=$cus['id'];?>">Go</button>
                    				<button value="<?=$cus['userid'];?>" class="btn btn-info edit update_first_<?=$cus['id'];?>">Edit</button>
	                       <?php }?>
                   </td>
                   	 <?php   $i++;
                   	 }
                   }
                    else
                    	{
                    	?>
                    </tr>
                   			 <tr>
                    			<td colspan="13">No Data Found</td>
                    		 </tr>
                    <?php
                    }
                    ?>
                 </table>
                 </div>
                    <?php // echo "<pre>"; print_r($customers);exit;
                    if(isset($customers) && !empty($customers))
                      {
                         $i=1;
                          foreach($customers as $cus) 
                            { 
                    ?>   
                    <div id="test1_<?php echo $cus["lead"][0]['id']; ?>" class="modal modal-styled fade in" tabindex="-1" role="dialog" 
                    aria-labelledby="myModalLabel" aria-hidden="false" align="center">
                   		 <div class="modal-dialog">
                    		<div class="modal-content">
                  			  <div class="modal-header"><a class="close" data-dismiss="modal">*</a>   
                  				  <h3 id="myModalLabel">Update Lead</h3>
                   			 </div>
                   		  <div class="modal-body">
                   			 <form action="<?php echo $this->config->item('base_url'); ?>lead/up_lead"  name="form" method="post">
                   			 <div class="row">
                   				 <div class="col-sm-12">
                    <table width="100%">
                    	<tr>
                            <input type="hidden" value="<?=$cus['userid'];?>" name="user_id" class="user_id_<?=$cus['id'];?>" />
                            <input type="hidden" value="<?php echo $cus["lead"][0]['id']; ?>" name="lead_id"  />
                            <input type="hidden" name="id" value="<?php echo $cus['id'] ?>" />
                            <td  style="width: 107px;">Days</td>
                            <td><input type="text" name="days" class="form-control"  id="employeename" value="<?php echo $cus["lead"][0]['days'] ?>" /></td>
                   	   </tr>
                       <tr>
                        <td>Status</td>
                        <td> <select  class="status form-control" id="agent_id" name="status" >
									<?php if($cus["lead"][0]['status']=='Pending site visit')
                                    { ?>	
                                    <option selected="selected" value="Pending site visit">Pending site visit</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option value="Pending site visit">Pending site visit</option>
                                    <?php	}
                                    if($cus["lead"][0]['status']=='Site visit completed')
                                    { ?>
                                    <option  value="Site visit completed" selected="selected">Site visit completed</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="Site visit completed">Site visit completed</option>
                                    <?php	}
                                    if($cus["lead"][0]['status']=='Advance Recived')
                                    { ?>
                                    
                                    <option selected="selected" value="Advance Received">Advance Received</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="Advance Received">Advance Received</option>
                                    <?php }
                                    if($cus["lead"][0]['status']=='BLP')
                                    { ?>
                                    
                                    <option selected="selected" value="BLP">BLP</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="BLP">BLP</option>
                                    <?php }
                                    if($cus["lead"][0]['status']=='BLP Completed')
                                    { ?>
                                    <option selected="selected" value="BLP Completed">BLP Completed</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="BLP Completed">BLP Completed</option>
                                    <?php }
                                    if($cus["lead"][0]['status']=='Installed Completed')
                                    { ?>
                                    <option selected="selected" value="Installed Completed">Installed Completed</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="Installed Completed">Installed Completed</option>
                                    <?php }
                                    if($cus["lead"][0]['status']=='Subsidy Completed')
                                    { ?>
                                    <option selected="selected" value="Subsidy Completed">Subsidy Completed</option>
                                    <?php }
                                    else
                                    { ?>
                                    <option  value="Subsidy Completed">Subsidy Completed</option>
                                    <?php }?>
                             </select>
                            </td>
                           </tr>
                           <tr>
                            <td>Dealer</td>
                            <td>
                              <select  name="d_stats" id="dealer_up" class="form-control check_dealer check1_<?=$cus["lead"][0]['id'];?>">
                                    <?php if($cus["lead"][0]['dealer']=='1')
                                        { ?>
                                            <option selected="selected" value="1">Yes</option>	
                                  <?php }
                                         else
                                            { ?>
                                                <option value="1">Yes</option>	
                                    <?php	}
                                      if($cus["lead"][0]['dealer']=='2')
                                        { ?>
                                            <option selected="selected" value="2">No</option>	
                                  <?php }
                                        else
                                        { ?>
                                            <option value="2">No</option>	
                                   <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                             <td></td>
                        </tr>
                   </table>
                    <div class="allocate1<?=$cus["lead"][0]['id']?>" >
                    <table width="100%">
                        <tr >
                            <td style="width: 107px;" id="test_deal">Allocated to</td>
                            <td>
                                <select  name="dealer_name" id="name_deal" <?php if($cus["lead"][0]['dealer']=='1'){ ?> disabled="disabled" <?php }?> 
                                        class="form-control  name_deal<?=$cus["lead"][0]['id']?>">
                                     <option value="">Select</option>
                                         <?php foreach ($cust as $val1)
                                                { ?>
                                                  <option <?= ($val1['user_id']==$cus["lead"][0]['delr_id']?'selected':'') ?> 
                                                     value='<?=$val1['user_id']?>'><?=$val1['username']?></option>
                                           <?php }?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    </div>
                    <table width="100%">
                         <tr>
                            <td style="width: 107px;">&nbsp;</td>
                            <td>
                                <input type="submit" class="edit btn btn-success btn-sm"  id="edit" value="Update"> 
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
</div>
<?php }
}?>





</div> <!-- /.portlet-content -->

</div> <!-- /.portlet -->

</div></div>

</div> <!-- /.col -->

</div> <!-- /.row -->
<script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>
<script>
    $(".go").live('click', function() {
		
		
        idno = ($(this).attr('class'));
        var splitNumber = idno.split('_');
        var id = splitNumber[2];
		$('.app_status_'+id).hide();
		var days = $('.days_cls' + id).val();
        var user_id = $('.user_id_' + id).val();
        var dealer = $('.dealer_' + id).val();
        var status = $('.status_' + id).val();
        var d_stats = $('.check_' + id).val();
		
        // var d_stats=$("input[name=d_stats"+id+"]:checked").val();
        //alert(d_stats); return false;
        if (days != '' && d_stats != 'undifined') {

            $.ajax({
                url: BASE_URL + "lead/add_lead",
                type: 'post',

                data: {
                    id: id,
                    days: days,
                    d_stats: d_stats,
                    user_id: user_id,
                    dealer: dealer,
                    status: status
                },
                success: function(result) {
                    // alert(result);
                    //$('#test').html(result);
                    window.location.href = BASE_URL + 'lead/';
                    // for_response_del('Data Delete Successfully...!'); // resutl notification   
                }
            });
        } else {
            alert('Day should no be empty');
			 idno = ($(this).attr('class'));
			var splitNumber = idno.split('_');
			var id = splitNumber[2];
			$('.app_status_'+id).show();
			
        }
    });


    $(".up_lead").live('click', function() {

        idno = ($(this).attr('class'));

        var splitNumber = idno.split('_');
        var id = splitNumber[2];
        var lead_id = $('.lead_id_' + id).val();
        var days = $('.days_cls' + id).val();
        var user_id = $('.user_id_' + id).val();
        var dealer = $('.dealer_' + id).val();
        var status = $('.status_' + id).val();
        var d_stats = $('.check_' + id).val();
        // alert(d_stats); return false;
        if (days != '') {

            $.ajax({
                url: BASE_URL + "lead/up_lead",
                type: 'post',
                data: {
                    id: id,
                    days: days,
                    d_stats: d_stats,
                    user_id: user_id,
                    dealer: dealer,
                    status: status,
                    lead_id: lead_id
                },
                success: function(result) {
                    // $('#test').html(result);
                    window.location.href = BASE_URL + 'lead/';
                    // for_response_del('Data Delete Successfully...!'); // resutl notification   
                }
            });
        } else {
            alert('Days should not be empty');
			
        }

    });

    $(".update").live('click', function() {
        idno = ($(this).attr('class'));
        var splitNumber = idno.split('_');
        var id = splitNumber[2];
        $('.update_button_' + id).css('display', 'none');
        $('.app_' + id).css('display', 'block');
        $(".check_" + id).attr("disabled", false);
        $(".days_cls" + id).attr("disabled", false);
        $(".status_" + id).attr("disabled", false);

        //alert(id); return false;
    });

    $(".edit").live('click', function() {
        idno = ($(this).attr('class'));
        var splitNumber = idno.split('_');
        var id = splitNumber[2];
        $('.update_first_' + id).css('display', 'none');

        $('.app_status_' + id).css('display', 'block');
        $(".check_" + id).attr("disabled", false);
        $(".days_cls" + id).attr("disabled", false);
        $(".status_" + id).attr("disabled", false);
        $('.allocate1' + id).css('display', 'block');
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
    $(".yes_delr").live('change', function() {
        idno = ($(this).attr('class'));
        var splitNumber = idno.split('_');
        var id = splitNumber[2];
        var d_option = $('.check_' + id).val();
        if (d_option == 2) {
            $('.dealer_' + id).css('display', 'block');
            $('.all_' + id).css('display', 'none');
        } else {
            $('.dealer_' + id).css('display', 'none');
            $('.all_' + id).css('display', 'block');
        }

        //alert(id); return false;
    });


    $(".check_dealer").live('change', function() {
        idno = ($(this).attr('class'));
        var splitNumber = idno.split('_');
        var id = splitNumber[2];
        var d_option = $('.check1_' + id).val();
        $('.allocate1' + id).css('display', 'none');
        if (d_option == 2) {
            $('.allocate1' + id).css('display', 'block');
            $(".name_deal" + id).attr("disabled", false);
        } else {

            $('.allocate1' + id).css('display', 'none');
            $('.name_deal' + id).val('');

        }
    });
</script>
<script>
function fnExcelReport()
{
    var tab_text="<table border='5px'><tr width='100px' bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('export_test'); // id of table
    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }
    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
    return (sa);
}
   </script> 
 

