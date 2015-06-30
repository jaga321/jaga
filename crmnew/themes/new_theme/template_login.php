<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?=$this->config->item('site_title'); ?> | <?= $this->config->item('site_powered'); ?></title>    	
        <?php  $theme_path = $this->config->item('theme_locations').$this->config->item('active_template'); ?></title>
  
  <link rel="shortcut icon" href="<?=$theme_path; ?>/img/favicon.png">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/bootstrap.min.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="<?=$theme_path; ?>/css/my-style.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="login_bg">
<div class="account-wrapper">
  <div class="account-logo">
  <div align="center">
    	<img src="<?=$theme_path; ?>/img/login_logo.png" alt="Target Admin">
    </div>
  </div>
    <div class="account-body">
         <form action="<?php echo $this->config->item('base_url'); ?>admin/verify" method="post" onsubmit="return validate();">
            <p class="clearfix" align="center";>
            <div class="form-group">
            	<select class="form-control" name="u_type" id="utype" required>
               		<option value="">Select User Type</option>
                	<option value="0">admin</option>
                    <option value="Agent">agent</option>
                </select>
                </div>
            </p>
			<p> <div class="form-group">
						<input type="text" id="username"  class="large e_input form-control" value=""  name="email" required placeholder="User Name" />
                        </div>
                         <div class="form-group">
                        <input type="password" id="password" class="large form-control" value="" name="upass" required placeholder="Password" />
                        </div>
                        
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Login <i class="fa fa-play-circle"></i></button>
			</p>
			<p class="clearfix">
				<!--<span class="fl">
					<input type="checkbox" id="remember" class="" value="1" name="remember"/>
					<label class="choice" for="remember">Keep me logged-in for two weeks</label>
				</span>-->
			</p>
		</form>
    </div> <!-- /.account-body -->
    <div class="account-footer">
    </div> <!-- /.account-footer -->
  </div> <!-- /.account-wrapper -->
  <script src="<?=$theme_path; ?>/js/libs/jquery-1.10.1.min.js"></script>
  <script src="<?=$theme_path; ?>/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?=$theme_path; ?>/js/libs/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  <!-- App JS -->
  <script src="<?=$theme_path; ?>/js/target-admin.js"></script>
  
  <!-- Plugin JS -->
  <script src="<?=$theme_path; ?>/js/target-account.js"></script>
</body>
</html>


















