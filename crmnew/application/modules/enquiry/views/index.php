<?php $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?>
   
  
  <div class="content">
    <div class="content-container">
      <div class="content-header">
        <h2 class="content-header-title">Enquiry View</h2>        
      </div> <!-- /.content-header -->
      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3 style="width:100%">
                <i class="fa fa-table"></i>
                View
                <table class="pull-right">
                     <tr>
                        <td>
                            <?php
                                        $user_det = $this->session->userdata('logged_in'); 
                                        if($user_det['log_type']!='Agent'){ ?>
                                            <select class="pull-left" id="agent_id">
                                                <option value="">Select</option>
                                                 <?php 
                                                        if(isset($agents) && !empty($agents))
                                                        {
                                                            foreach($agents as $val)
                                                            {?>
                                                               
                                                                <option value="<?=$val['id']?>" ><?=$val['username']?></option>
                                                            
                                                      <?php }
                                                        }?>
                                            </select>&nbsp;&nbsp;
                                        <input type="button" name="allo_agent" class="btn btn-info btn-xs agent_all" id="a_allocate" 
                                              style="alignment-adjust:middle" value="Allocate" />
                                        <?php } ?>
                        </td>
                        <td width="20">&nbsp;</td>
                        <td>
                                        <!--onclick="fnExcelReport()"-->
                                        <button class="btn btn-info btn-xs"  style="float:right;" 
                                           id="export" >Export</button><?php if($user_det['log_type']!='Agent'){ ?>
                                        <select class="filter_data pull-right" style="float:right; margin-right:10px;">
                                            <option value="">Select</option>
                                            <option value="0">All</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                            <?php }?>
                        </td>
                        <td width="10">&nbsp;</td>               		
                        <td>  <?php
                     if($user_det['log_type']!='Agent'){?>
                        
                        <a href="<?php echo $this->config->item('base_url')?>enquiry/import_enqury"  class="btn btn-info btn-xs">Import</a></td>
						<?php }?>
                                        </tr>
              </table>
              </h3>

            </div> <!-- /.portlet-header -->
            
            
            <div>
            
            </div>
			<div class="filter_result">
            <div class="portlet-content">
            <div class="wid100"> 
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
                        <th>Enquiry source</th>
                        <th  data-sortable="true">Name</th>
                        <th>Phone Number</th>
                        <th  data-sortable="true">Village</th>
                        <th  data-sortable="true">District</th>
                        <th  data-sortable="true">Product Type</th>
                         <th  data-sortable="true">Date</th>
                         <!--<th  data-sortable="true">Source</th>-->
                        <th  data-sortable="true">Status</th>
                        <?php if($user_det['log_type']!='Agent'){ ?>
                        <th  data-sortable="true">Allocated to</th>
                        <?php } ?>
                        <th>Action</th>
                   
                    </tr>
                </thead>
                
                    <?php 
                   /* echo "<pre>";
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
                     <td><input type="checkbox" id='<?=$i?>' name="allocate"  class="all_cate test_hide" value="<?=$cus['e_id'];?>"/></td>
                     <?php }  } ?>
                     <td><?php echo "$i";?></td>
                     <td><?php echo $cus["username"]; ?></td>
                     <td><?php echo $cus["name"]; ?></td>
                     <td><?php echo $cus["phone"]; ?></td>
                     <td><?php echo $cus["distic"]; ?></td>
                     <td><?php echo $cus["village"]; ?></td>
                     <td><?php echo $cus["product_type"]; ?></td>
                     <td><?php echo ($cus["p_date"]==0)?'--':date("d-M-Y",strtotime($cus["p_date"])); ?></td>
                    <!-- <td><?php echo ($cus["source"]); ?></td>-->
                     <td><?php if($cus["approval_status"]==2){echo '<label class="status_approval" style="color:red">Rejected</label>';} 
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
							?>New<?php 
                            
                        } ?>
                    
                     </td>
                     <?php } ?>
                    
                      <td width="">
                      <!--<button id="approval" value="<?=$cus['id'];?>" class="button-green status app_status_<?=$cus['id'];?>">Approve</button>
                      <button class="button-red  app_status_<?=$cus['id'];?>" >Reject</button>-->
                      <a href="<?php echo $this->config->item('base_url')?>enquiry/edit_enquiry/<?=$cus['e_id'];?>" ><i class="fa fa-edit btn btn-info btn-sm"></i></a>
                     </td>
                    </tr>
                     
                     <?php 
               $i++;
               }
              }
              else
              {
               ?>
                        <tr>
                        <?php
                     	if($user_det['log_type']!='Agent')
						{
							?>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <?php } ?>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                        </tr>
                       <?php
              }
               ?>
                    
                   
                   
            </table>
            </div>
            
            
                      

               <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->
            </div>

          </div> <!-- /.portlet -->

        </div></div>

        </div> <!-- /.col -->

      </div> <!-- /.row -->
       <script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>
    <script>
$(".status").on('click',function() 
{
	
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2]
 //  alert(id); return false;
   $.ajax({
	   
	      url:BASE_URL+"enquiry/change_status",
		  type:'post',
		  data:{ id:id},
		  success:function(result){
		 	window.location.href = BASE_URL+'enquiry/';
			  // for_response_del('Data Delete Successfully...!'); // resutl notification   
         }
   });
   

});
$(".rej").on('click',function() 
{
	
   idno=($(this).attr('class'));
   var splitNumber = idno.split('_');
   var id=splitNumber[2];
   //alert(splitNumber); return false;
   $.ajax({
	      url:BASE_URL+"enquiry/change_rej_status",
		  type:'post',
		  data:{ id:id},
		  success:function(result){
			  /*$('.res').html(result);
			  return false;*/
		 	window.location.href = BASE_URL+'enquiry/';
			  // for_response_del('Data Delete Successfully...!'); // resutl notification   
         }
   });
   

});


$(".filter_data").on('change',function() 
{
	
   status=$(this).val();

//alert(status);
   $.ajax({
	      url:BASE_URL+"enquiry/filter_table",
		  type:'post',
		  data:{ status:status},
		  success:function(result)
		  {
			  $('.filter_result').html(result);
			  // for_response_del('Data Delete Successfully...!'); // resutl notification   
          }
   });
   

});
</script>
   <script>
function fnExcelReport()
{
    var tab_text="<table border='5px'><tr width='100px' bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('test_export'); // id of table
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
   <!--chekbox script-->
 <script type="text/javascript">
    
	
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
  
  <!--<script>
  $(function () {
     
      $('.chkSelectAll').on('click',function()
	  {
		
        $('.all_cate').attr('checked', $(this).is(':checked'));
		
      });
     
    });
	</script>
    -->
    
     
<script type="text/javascript">
$(function () {
     
      $('.chkSelectAll').on('click',function()
	  {
        $('.all_cate').attr('checked', $(this).is(':checked'));
      });
      $('.all_cate').on('click',function()
	  {
		  //alert('test');
        if ($('.all_cate:checked').length == $('.all_cate').length) 
		{
          $('.chkSelectAll').attr('checked', true);
		  // alert('test');
        }
        else 
		{
          $('.chkSelectAll').attr('checked', false);
		   //alert('test');
        }
      });

    });
	
	$('#export').live('click',function(){

                        window.location.href=BASE_URL+'enquiry/export_datas/'+$('.filter_data').val();

	});
	/*$('.all_cate').live('click',function(){
		
		console.log($('.all_cate:checked'));
		
			if (event.ctrlKey) {
			alert("The CTRL key was pressed!");
			} else {
				alert("The CTRL key was NOT pressed!");
			}
	});*/
	
</script>


  
 <!--chekbox script-->       