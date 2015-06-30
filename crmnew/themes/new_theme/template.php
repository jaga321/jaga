<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
 <?php
	$user_det = $this->session->userdata('logged_in');
	//print_r($user_det); exit;
	if(empty($user_det['application']))
			redirect($this->config->item('base_url').'admin/');
?>
<script type="text/javascript">
		var BASE_URL = '<?php echo $this->config->item('base_url');  ?>';
</script>

<title>CRM</title>
 <title><?=$this->config->item('site_title'); ?> | <?= $this->config->item('site_powered'); ?></title>    	
        <?php  $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/bootstrap.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/plugins/morris/morris.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/plugins/icheck/skins/minimal/blue.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/plugins/select2/select2.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/plugins/fullcalendar/fullcalendar.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/target-admin.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/custom.css">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <div class="navbar">
   

  <div class="container">
  <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      <a class="navbar-brand navbar-brand-image" href="#">
        <img src="<?=$theme_path; ?>/img/logo.png" style="width:147px;" alt="Site Logo" >
      </a>

    </div>

     <!-- /.navbar-header -->

    <div class="navbar-collapse collapse">

      

      

      <ul class="nav navbar-nav navbar-right">   

       

        <li class="dropdown navbar-profile">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
             <?php if($user_det['log_type']!='Admin'){ 
			
			
			        echo $user_det['email'];
                         
                         } 
						    else
							{
								
                                echo Administrator;
						 } ?>
            <span class="navbar-profile-label">rod@rod.me &nbsp;</span>
            <i class="fa fa-caret-down"></i>
          </a>

          <ul class="dropdown-menu" role="menu">
         
                                <?php if($user_det['log_type']!='Agent'){ ?>
                                
                                <li>
                                  <a href="<?php echo $this->config->item('base_url').'admin/account'?>">
                                   <i class="fa fa-cogs"></i> 
                                     
                                    &nbsp;&nbsp;Account
                                  </a>
                                </li>
                    
                                <li>
                                  <a href="<?php echo $this->config->item('base_url').'user/user'?>">
                                  <i class="fa fa-user"></i>
                                    &nbsp;&nbsp;Users
                                  </a>
                                </li>
                                  <?php } ?>
                                   <li class="divider"></li>
                                <li>
                                <a href="<?php echo $this->config->item('base_url').'admin/logout'?>">
                                <i class="fa fa-sign-out"></i> 
                                &nbsp;&nbsp;Logout
                                </a>
                                </li>
                               

            
          </ul>

        </li>

      </ul>

       



       

    </div> <!--/.navbar-collapse -->

  </div> <!-- /.container -->

</div> <!-- /.navbar -->

  <div class="mainbar">

  <div class="container">

    <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
      <i class="fa fa-bars"></i>
    </button>

    <div class="mainbar-collapse collapse">

      <ul class="nav navbar-nav mainbar-nav">

        

        <li class="dropdown">
         
            
             <li class="active"></li>
                        <li><a href="<?php echo $this->config->item('base_url').'enquiry/enquiry'?>">Enquiry</a></li>
                        <li><a href="<?php echo $this->config->item('base_url').'lead/lead'?>">Lead</a></li>
                        <li><a href="<?php echo $this->config->item('base_url').'enquiry/add_enquiry'?>">Add Enquiry</a></li>
						<?php if($user_det['log_type']!='Agent'){ ?>
                        <li><a href="<?php echo $this->config->item('base_url').'user/user'?>">Add User</a></li>
                        
                        
                       <?php } ?>
           
        </li>
      </ul>

    </div> <!-- /.navbar-collapse -->   

  </div> <!-- /.container --> 

</div> <!-- /.mainbar -->

 
<div class="container">

  <div class="content">
  <?php echo $content;?>

     <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->


<footer class="footer">

  <div class="container">

    <div class="row">

      <div class="col-sm-12">

      
       <p>  <div align="right">Powered by <a href="http://www.i2softwaretechsolutions.com">i2softwaretechsolutions Pvt.Ltd.</a></div>
  
            <a href="http://www.suryapowermagic.com">Surya Powermagic</a>  All Rights Reserved.</p>


      </div> <!-- /.col -->

     
    </div> <!-- /.row -->

  </div> <!-- /.container -->
  
</footer>

  <script src="<?=$theme_path; ?>/js/libs/jquery-1.10.1.min.js"></script>
  <script src="<?=$theme_path; ?>/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?=$theme_path; ?>/js/libs/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  
  <!-- Plugin JS -->
  <script src="<?=$theme_path; ?>/js/plugins/icheck/jquery.icheck.js"></script>
  <script src="<?=$theme_path; ?>/js/plugins/select2/select2.js"></script>
  <script src="<?=$theme_path; ?>/js/libs/raphael-2.1.2.min.js"></script>
  <script src="<?=$theme_path; ?>/js/plugins/morris/morris.min.js"></script>
  <script src="<?=$theme_path; ?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?=$theme_path; ?>/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?=$theme_path; ?>/js/plugins/fullcalendar/fullcalendar.min.js"></script>

  <!-- App JS -->
  <script src="<?=$theme_path; ?>/js/target-admin.js"></script>
  
  <!-- Plugin JS -->
  <script src="<?=$theme_path; ?>/js/demos/dashboard.js"></script>
  <script src="<?=$theme_path; ?>/js/demos/calendar.js"></script>
  <script src="<?=$theme_path; ?>/js/demos/charts/morris/area.js"></script>
  <script src="<?=$theme_path; ?>/js/demos/charts/morris/donut.js"></script>

  


  
</body>
</html>






















