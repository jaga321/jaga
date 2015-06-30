<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php $logged_in=$this->session->userdata('user_info'); $this->load->model('admin/admin_model'); $data["admin"]=$this->admin_model->get_admin(); if(empty($logged_in[0]['username'])) redirect($this->config->item('base_url').'admin/'); ?>
    <title>
        <?=$this->config->item('site_title'); ?> |
            <?=$this->config->item('site_powered'); ?></title>
    <?php $theme_path=$this->config->item('theme_locations').$this->config->item('active_template'); ?>
    
    <link href="<?= $theme_path; ?>/images/favicon.png" rel="shortcut icon">
    <link href="<?= $theme_path; ?>/css/style.default.css" rel="stylesheet">
    <link href="<?= $theme_path; ?>/css/morris.css" rel="stylesheet">
    <link href="<?= $theme_path; ?>/css/select2.css" rel="stylesheet" />
    <link href="<?= $theme_path; ?>/css/media_print.css" rel="stylesheet" />

    <link href="<?=$theme_path?>/css/style.datatables.css" rel="stylesheet">
    <link href="<?=$theme_path?>/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?=$theme_path?>/css/dataTables.bootstrap.css" rel="stylesheet">

    <script src="<?= $theme_path; ?>/js/jquery-1.11.1.min.js"></script>
</head>

<?php $data[ 'company_details']=$this->admin_model->get_company_details(); ?>

<body>

    <div class="print_header">
        <div class="print_header_logo"><img src="<?= $theme_path; ?>/images/print_logo.png" />
        </div>
        <div class="print_header_tit">
            <h2><?=$data['company_details'][0]['company_name']?></h2>
            <p>
                <?=$data[ 'company_details'][0][ 'address1']?>,
                    <?=$data[ 'company_details'][0][ 'address2']?>,
                        <?=$data[ 'company_details'][0][ 'city']?>,
                            <?=$data[ 'company_details'][0][ 'state']?>-
                                <?=$data[ 'company_details'][0][ 'pin']?>
            </p>
            <p></p>
            <p><strong>Ph</strong>:
                <?=$data[ 'company_details'][0][ 'phone_no']?>, <strong>Email</strong> :
                    <?=$data[ 'company_details'][0][ 'email']?>
            </p>
        </div>
    </div>

    <header>
        <div class="headerwrapper">
            <div class="header-left">
                <a href="<?php echo $this->config->item('base_url').'admin/'?>" class="logo">
                        <img src="<?= $theme_path; ?>/images/logo.png" alt="" /> 
                    </a>
                <div class="pull-right">
                    <a href="#" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            <!-- header-left -->

            <div class="header-right">
                <div class="pull-left ims"><img src="<?= $theme_path; ?>/images/ims_logo.png" alt="" /> </div>
                <div class="pull-right">
                    <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="<?php echo $this->config->item('base_url').'admin/update_profile'?>"><i class="glyphicon glyphicon-user"></i> My Profile</a>
                            </li>

                            <li><a href="<?php echo $this->config->item('base_url').'admin/logout'?>"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a>
                            </li>
                        </ul>
                    </div>
                    <!-- btn-group -->

                </div>
                <!-- pull-right -->

            </div>
            <!-- header-right -->

        </div>
        <!-- headerwrapper -->
    </header>


    <div class="mainwrapper">
        <div class="leftpanel">
            <div class="media profile-left">
                <a class="pull-left profile-thumb" href="<?php echo $this->config->item('base_url').'admin/update_profile'?>">
                        <img src="<?= $this->config->item('base_url').'admin_image/original/'.$data['admin'][0]['admin_image'] ?>"
                         class="img-circle" /></a>

                <div class="media-body">
                    <h4 class="media-heading"><?=ucfirst($logged_in[0]['username'])?></h4>

                </div>
            </div>
            <!-- media -->
            <?php $cur_class=$this->router->class; $cur_method = $this->router->method; ?>
            <ul class="nav nav-pills nav-stacked">
                <li class="<?=($cur_class=='admin' && $cur_method=='dashboard')?'active':''?>"><a href="<?php echo $this->config->item('base_url').'admin/dashboard'?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="parent <?=($cur_class=='add_group' || $cur_class=='group' || $cur_class=='line_man' || $cur_class=='item_code' || $cur_class=='master_style_type' || $cur_class=='master_fit' || $cur_class=='vendor' || $cur_class=='customer' || $cur_class=='master_style'||  $cur_class=='master_category')?'active':''?>"><a href="#"><i class="fa fa-suitcase"></i> <span>Masters</span></a>
                    <ul class="children">
                        <li class="<?=($cur_class=='add_group')?'active':''?>">
                            <a href="<?php echo $this->config->item('base_url').'add_group/index'?>">Group</a>
                        </li>
                        <li class="<?=($cur_class=='group')?'active':''?>">
                            <a href="<?php echo $this->config->item('base_url').'group/index'?>">Area</a>
                        </li>
                        <li class="<?=($cur_class=='line_man')?'active':''?>">
                            <a href="<?php echo $this->config->item('base_url').'line_man/index'?>">Line Man</a>
                        </li>
                        
                         <li class="<?=($cur_class=='customer')?'active':''?>">
                            <a href="<?php echo $this->config->item('base_url').'customer/index'?>">Customers</a>
                        </li>
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                </li>
               
               
                <!--  <li class="parent"><a href="#"><i class="fa fa-suitcase"></i> <span>Goods Entry Note</span></a>
                            <ul class="children">
                                 <li class=""><a href="<?php echo $this->config->item('base_url').'gen/'?>"><i class="fa fa-map-marker"></i> <span>Add GEN</span></a></li>
                                 <li class=""><a href="<?php echo $this->config->item('base_url').'gen/'?>"><i class="fa fa-map-marker"></i> <span>Update GEN</span></a></li>
                            </ul>
                        </li>
                         <li style="display:none;" class="parent"><a href="#"><i class="fa fa-suitcase"></i> <span>Buying and Sales Plan</span></a>
                            <ul class="children">
                                <li><a href="<?php echo $this->config->item('base_url').'buying/add_buying'?>">Add</a></li>
                                <li><a href="<?php echo $this->config->item('base_url').'buying/update_buying'?>">Update</a></li>
                                <li><a href="<?php echo $this->config->item('base_url').'buying/view_buying'?>">View</a></li>
                            </ul>
                        </li>-->
            </ul>
        </div>
        <!-- leftpanel -->
        <!--AJAX LOADING AND NOTIFICATIONS STARTS HERE-->
        <script type="text/javascript">
            function for_loading() {
                //THIS IS FOR NOTIFICATION WHEN AJAX LOAD STARTS, CODE STARTS HERE 
                $('#main_load_div').css('display', 'block');
                $('#dyna_div').addClass('my_alert-info').removeClass('my_alert-success');
                $('#info_txt').html('Loading...');
                //THIS IS FOR NOTIFICATION WHEN AJAX LOAD STARTS, CODE ENDS HERE
            }

            function for_response(txt) {
                //THIS IS FOR NOTIFICATION WHEN AJAX LOAD RESPONSE CAME CODE STARTS HERE
                $('#dyna_div').addClass('my_alert-success').removeClass('my_alert-info');
                $('#info_txt').html('Success...');
                setTimeout(function() {
                    $('#main_load_div').css('display', 'none');
                }, 100);
                //THIS IS FOR NOTIFICATION WHEN AJAX LOAD RESPONSE CAME CODE ENDS HERE	
            }

            $(document).ready(function() {
                $('#cls_inf_bt').click(function() {
                    $('#main_load_div').css('display', 'none');
                });
            });
        </script>
        <input name="" type="hidden" value="1000" id="aja_notf_time">
        <!--AJAX LOADING AND NOTIFICATIONS ENDS HERE-->

        <div class="alert_img" id="main_load_div" style="display:none;">
            <div class=" my_alert my_alert-dismissable my_alert-info" id="dyna_div">
                <div class="fa" id="load_img_div"><img src="<?= $theme_path; ?>/images/loader7.gif" style="position:relative; top:-2px;" />
                </div>
                <div id="info_txt" class=""></div>
                <button id="cls_inf_bt" type="button" class=" my_close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        </div>

        <?php echo $content;?>
    </div>
    <!-- mainwrapper -->

    <script type="text/javascript">
        $('input').attr('autocomplete', 'off');
        var BASE_URL = '<?php echo $this->config->item('base_url');  ?>';
    </script>
    <script src="<?= $theme_path; ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?= $theme_path; ?>/js/bootstrap.min.js"></script>
    <script src="<?= $theme_path; ?>/js/modernizr.min.js"></script>
    <script src="<?= $theme_path; ?>/js/pace.min.js"></script>
    <script src="<?= $theme_path; ?>/js/retina.min.js"></script>
    <script src="<?= $theme_path; ?>/js/jquery.cookies.js"></script>
    <script src="<?= $theme_path; ?>/js/flot/jquery.flot.min.js"></script>
    <script src="<?= $theme_path; ?>/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?= $theme_path; ?>/js/flot/jquery.flot.spline.min.js"></script>
    <script src="<?= $theme_path; ?>/js/jquery.sparkline.min.js"></script>
    <script src="<?= $theme_path; ?>/js/morris.min.js"></script>
    <script src="<?= $theme_path; ?>/js/raphael-2.1.0.min.js"></script>
    <script src="<?= $theme_path; ?>/js/bootstrap-wizard.min.js"></script>
    <script src="<?= $theme_path; ?>/js/custom.js"></script>
    <script src="<?= $theme_path; ?>/js/dashboard.js"></script>
    <script src="<?= $theme_path; ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= $theme_path; ?>/js/dataTables.bootstrap.js"></script>
    <!--<script src="<?= $theme_path; ?>/js/dataTables.responsive.js"></script>-->
    <script src="<?= $theme_path; ?>/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function() {

            jQuery('#basicTable').DataTable({
                responsive: true
            });

            var shTable = jQuery('#shTable').DataTable({
                "fnDrawCallback": function(oSettings) {
                    jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                },
                responsive: true
            });

            // Show/Hide Columns Dropdown
            jQuery('#shCol').click(function(event) {
                event.stopPropagation();
            });

            jQuery('#shCol input').on('click', function() {

                <!--Notification JSON coding-->



                // Get the column API object
                var column = shTable.column($(this).val());

                // Toggle the visibility
                if ($(this).is(':checked'))
                    column.visible(true);
                else
                    column.visible(false);
            });

            var exRowTable = jQuery('#exRowTable').DataTable({
                responsive: true,
                "fnDrawCallback": function(oSettings) {
                    jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                },
                "ajax": "ajax/objects.txt",
                "columns": [{
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                }, {
                    "data": "name"
                }, {
                    "data": "position"
                }, {
                    "data": "office"
                }, {
                    "data": "salary"
                }],
                "order": [
                    [1, 'asc']
                ]
            });

            // Add event listener for opening and closing details
            jQuery('#exRowTable tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = exRowTable.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });


            // DataTables Length to Select2
            jQuery('div.dataTables_length select').removeClass('form-control input-sm');
            jQuery('div.dataTables_length select').css({
                width: '60px'
            });
            jQuery('div.dataTables_length select').select2({
                minimumResultsForSearch: -1
            });

        });

        function format(d) {
            // `d` is the original data object for the row
            return '<table class="table table-bordered nomargin">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extension number:</td>' +
                '<td>' + d.extn + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '</table>';
        }
    </script>
    <style type="text/css">
        .text_right {
            text-align: right;
        }
    </style>

</body>

</html>
<!--9965162330-->