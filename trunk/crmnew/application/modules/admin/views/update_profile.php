<div class="mainpanel">
 <div class="media">
 </div>
<div class="contentpanel">
<form action="<?php echo $this->config->item('base_url'); ?>admin/update_profile" method="post" enctype="multipart/form-data" name="sform">
<h4 align="center" style="color:#06F">Admin Details</h4>
<table width="41%" class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" style="width: 30%;margin: 0 auto;">
<tr>
<td height="89">&nbsp;<br />User Name:</td>
<td>&nbsp;<br />&nbsp;<br /><input type="text" name="admin_name" id="admin_name" class="admin_name" value="<?=$admin[0]['username']; ?>" required />
<span id="profileerror" class="val" style="color:#F00;"></span></td>
<input type="hidden" name="id" id="admin_name" class="admin_name" value="<?= $admin[0]['id']; ?>"/>
<td rowspan="2" colspan="2"><div>
<img id="blah" class="add_staff_thumbnail" width="240px" height="155px"
src="<?= $this->config->item("base_url").'admin_image/original/'.$admin[0]['admin_image']; ?>"/><br />
<br />
<input type='file' name="admin_image" id="imgInp" /><span id="profileerror9" class="val" style="color:#F00;"></span>
</div></td>
</tr>
<tr>
<td><br /><br />Password:</td>
<td><br /><br /><input type="password" name="password"   id="password" value="" autocomplete="off" maxlength="20" tabindex="3"  />
<span id="profileerror1" class="val" style="color:#F00;"></span></td>

</tr>
</table>
<br />
<h4 align="center" style="color:#06F">Company Details</h4>
<table  class="table table-striped table-bordered responsive dataTable no-footer dtr-inline" style="width: 60%;margin: 0 auto;">
    <tr>
		<td>Company Name</td>
        <td><input type="text" name="company[company_name]" id="company_name" value="<?=$company_details[0]['company_name']?>" />
        <br /><span id="profileerror2" class="val" style="color:#F00;"></span></td>
        <td>Phone Number</td> 
        <td><input type="text" name="company[phone_no]" id="phone_no" value="<?=$company_details[0]['phone_no']?>"  />
       <br /> <span id="profileerror3" class="val" style="color:#F00;"></span></td>         
    </tr>
    <tr>
		<td>Address Line 1</td>
        <td><input type="text" name="company[address1]" id="address1" value="<?=$company_details[0]['address1']?>"  />
        <br /><span id="profileerror4" class="val" style="color:#F00;"></span></td>
        <td>Address Line 2</td> 
        <td><input type="text" name="company[address2]" id="address2" value="<?=$company_details[0]['address2']?>" />
        <br /><span id="profileerror10" class="val" style="color:#F00;"></span>
       </td>         
    </tr>
    <tr>
		<td>City</td>
        <td><input type="text" name="company[city]" id="city"  value="<?=$company_details[0]['city']?>" />
         <br /><span id="profileerror5" class="val" style="color:#F00;"></span></td>
        <td>State</td> 
        <td><input type="text" name="company[state]" id="state" value="<?=$company_details[0]['state']?>" />
         <br /><span id="profileerror6" class="val" style="color:#F00;"></span></td>         
    </tr><tr>
		<td>Pin Code</td>
        <td><input type="text" name="company[pin]" id="pin" value="<?=$company_details[0]['pin']?>"  />
        <br /><span id="profileerror7" class="val" style="color:#F00;"></span></td>
        <td>Email Id</td> 
        <td><input type="text" name="company[email]" id="email" value="<?=$company_details[0]['email']?>"  />
         <br /><span id="profileerror8" class="val" style="color:#F00;"></span></td>         
    </tr>
    <tr>
    	<td></td>
        <td></td>
        <td align="right"><br /><input type="submit" value="Update" name="submit" id="submit"  class="btn btn-primary"/></td>
		<td><br /><input type="reset" value="Cancel" id="cancel" class="btn btn-danger" tabindex="9"/></td>
    </tr>
</table>
</form>
</div>
</div>


<script type="text/javascript">
	 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        if($(this).val()=="" || $(this).val()==null)
							{
								
							}
							else
							{
                        readURL(this);
							}
    });
	</script>
    <script type="text/javascript">
	$('.admin_name').blur(function()
    {
		var name=$('#admin_name').val();
		if(name=='' || name==null || name.trim().length==0)
		{
			$('#profileerror').html("Required Field");
		}
		else
		{
			$('#profileerror').html("");
		}
    });
	$('#password').blur(function()
    {
		var password=$('#password').val();
		if(password=='') 
		{
		}
		else if(password==null || password.trim().length==0)
		{
			$('#profileerror1').html("Required Field");
		}
		else
		{
			$('#profileerror1').html("");
		}
    });
	$('#company_name').blur(function()
    {
		var cname=$('#company_name').val();
		if(cname=='' || cname==null || cname.trim().length==0)
		{
			$('#profileerror2').html("Required Field");
		}
		else
		{
			$('#profileerror2').html("");
		}
    });
	$('#phone_no').blur(function()
    {
		var phone=$('#phone_no').val();
		if(phone=='' || phone==null || phone.trim().length==0)
		{
			$('#profileerror3').html("Required Field");
		}
		else
		{
			$('#profileerror3').html("");
		}
    });
	$('#address1').blur(function()
    {
		var add1=$('#address1').val();
		if(add1=='' || add1==null || add1.trim().length==0)
		{
			$('#profileerror4').html("Required Field");
		}
		else
		{
			$('#profileerror4').html("");
		}
    });
	$('#address2').blur(function()
    {
		var add2=$('#address2').val();
		if(add2=='' || add2==null || add2.trim().length==0)
		{
			$('#profileerror10').html("Required Field");
		}
		else
		{
			$('#profileerror10').html("");
		}
    });
	$('#city').blur(function()
    {
		var city=$('#city').val();
		if(city=='' || city==null || city.trim().length==0)
		{
			$('#profileerror5').html("Required Field");
		}
		else
		{
			$('#profileerror5').html("");
		}
    });
	$('#state').blur(function()
    {
		var state=$('#state').val();
		if(state=='' || state==null || state.trim().length==0)
		{
			$('#profileerror6').html("Required Field");
		}
		else
		{
			$('#profileerror6').html("");
		}
    });
	$('#pin').blur(function()
    {
		var pin=$('#pin').val();
		if(pin=='' || pin==null || pin.trim().length==0)
		{
			$('#profileerror7').html("Required Field");
		}
		else
		{
			$('#profileerror7').html("");
		}
    });
	$('#email').blur(function()	
	{
		var email_id=$('#email').val();
		var efilter= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if(email_id=="")
		{	
		   $("#profileerror8").html("Required Field");
		}
		else if(!efilter.test(email_id))
		{
			$("#profileerror8").html("Enter Valid Email");
		}
		else
		{
			$("#profileerror8").html("");
		}
    });
	// Image validation size checking
	$("#imgInp").change(function() {
//alert('hi');
    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
         case 'jpg': case 'png': case 'jpeg': case '':
            $("#profileerror9").html("");
            break;
        default:
            $(this).val();
            // error message here
           $("#profileerror9").html("Invalid File Type");
            break;
    }
   });
	
	$(document).ready(function()
    {
	$('#submit').click(function()
	{
		var i=0;
		var name=$('#admin_name').val();
		if(name=='' || name==null || name.trim().length==0)
		{
			$('#profileerror').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror').html("");
		}
		var password=$('#password').val();
		if(password=='') 
		{
		}
		else if(password==null || password.trim().length==0)
		{
			$('#profileerror1').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror1').html("");
		}
		var cname=$('#company_name').val();
		if(cname=='' || cname==null || cname.trim().length==0)
		{
			$('#profileerror2').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror2').html("");
		}
		var phone=$('#phone_no').val();
		if(phone=='' || phone==null || phone.trim().length==0)
		{
			$('#profileerror3').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror3').html("");
		}
		var add1=$('#address1').val();
		if(add1=='' || add1==null || add1.trim().length==0)
		{
			$('#profileerror4').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror4').html("");
		}
		var add2=$('#address2').val();
		if(add2=='' || add2==null || add2.trim().length==0)
		{
			$('#profileerror10').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror10').html("");
		}
		var city=$('#city').val();
		if(city=='' || city==null || city.trim().length==0)
		{
			$('#profileerror5').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror5').html("");
		}
		var state=$('#state').val();
		if(state=='' || state==null || state.trim().length==0)
		{
			$('#profileerror6').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror6').html("");
		}
		var pin=$('#pin').val();
		if(pin=='' || pin==null || pin.trim().length==0)
		{
			$('#profileerror7').html("Required Field");
			i=1;
		}
		else
		{
			$('#profileerror7').html("");
		}
		var email_id=$('#email').val();
		var efilter= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if(email_id=="" || email_id==null || email_id.trim().length==0)
		{	
		   $("#profileerror8").html("Required Field");
		   i=1;
		}
		else if(!efilter.test(email_id))
		{
			$("#profileerror8").html("Enter Valid Email");
			i=1;
		}
		else
		{
			$("#profileerror8").html("");
		}
		var mess=$('#profileerror9').html();
		if((mess.trim()).length>0)
		{
			i=1;
		}
		if(i==1)
		{
			return false;
		}
		else
		{
			return true;
		}
		
	});
	});
	$('#cancel').click(function()
	{
		$('.val').html("");
		
	});
	</script>