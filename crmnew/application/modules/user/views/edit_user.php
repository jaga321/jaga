<?php $theme_path= $this->config->item('theme_locations').$this->config->item('active_template'); ?>
<div class="content">
    <div class="content-container">
        <div class="content-header">
            <h2 class="content-header-title">Edit User</h2>
        </div>
        <!-- /.content-header -->
        <div class="row">

            <div class="col-md-12">

                <div class="portlet">

                    <div class="portlet-header">

                        <h3>
                <i class="fa fa-table"></i>
                Edit
              </h3>

                    </div>
                    <!-- /.portlet-header -->

                    <div class="portlet-content">
                        <?php if(isset($customers1) && !empty($customers1)) { foreach($customers1 as $cus) { ?>

                        <form class="form-horizontal" method="post">

                            <div class="form-group">
                                <label class="col-md-2">Name</label>
                                <div class="col-md-4">

                                    <input type="text" name="name_up" class="form-control" value="<?php echo $cus["username"]; ?>" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">User Id</label>
                                <div class="col-md-4">

                                    <input type="uid" name="user_id_up" class="form-control" value="<?php echo $cus["user_id"]; ?>" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">Password</label>
                                <div class="col-md-4">
                                    <input type="password" name="password_up" class="form-control" value="<?=$val['password'] ?>" 
                                    placeholder="max. 30 char." maxlength="30">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">Phone Number</label>
                                <div class="col-md-4">
                                    <input type="text" name="p_number_up" class="form-control" value="<?php echo $cus["phone_no"]; ?>" 
                                    required="required" maxlength="12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">Address</label>
                                <div class="col-md-4">
                                    <textarea name="address_up" class="form-control">
                                        <?php echo $cus[ "address"]; ?>
                                    </textarea>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2">User Type</label>
                                <div class="col-md-4">
                                    <select id='designation' name='user_type_up' class="form-control">
                                    <option <?=($cus[ 'log_type']=='Agent' )? 'selected': '';?> id="1">Agent</option>
                                        <option <?=($cus[ 'log_type']=='VLE' )? 'selected': '';?> id="2">VLE</option>
                                        <option <?=($cus[ 'log_type']=='FLD' )? 'selected': '';?> id="3">FLD</option>
                                        <option <?=($cus[ 'log_type']=='Delear' )? 'selected': '';?> id="4">Delear</option>
                                    </select>
                                </div>
                            </div>
                            <?php if($cus[ "del_point"]!="" ){ ?>
                            <div class="form-group" id="crt_point">
                                <label class="col-md-2">Credit Points</label>
                                <div class="col-md-4">
                                    <input type="text" name="credit_point_up" value="<?php echo $cus["del_point"]; ?>"
                                     class="form-control" required="required" maxlength="12">
                                </div>
                            </div>

                            <?php } else {?>
                            <div class="form-group" style="display:none;" id="crt_point">
                                <label class="col-md-2">Credit Points</label>
                                <div class="col-md-4">
                                    <input type="text" name="credit_point_up" value="<?php echo $cus["del_point"]; ?>" class="form-control"
                                    id="point" maxlength="12">
                                </div>
                            </div>

                            <?php }}}?>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div align="center">
                                        <button class="btn btn-info" type="submit"><span class="accept"></span>Update</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.portlet-content -->

                </div>
                <!-- /.portlet -->

            </div>
        </div>

    </div>
    <!-- /.col -->

</div>
<!-- /.row -->
<script type="text/javascript" src="<?= $theme_path; ?>/js/jquery-1.8.2.js"></script>

</div>
<script>
    $("#designation").live('change', function() {
        id = $(this).val();
        if (id == 'Delear') {
            $('#crt_point').css('display', 'block');
        } else {
            $('#crt_point').css('display', 'none');
            $('#point').html('');
        }
    });
</script>

<script>
    $("#designation").live('change', function() {
        id = $(this).val();
        if (id == 'Delear') {
            $('#credit_point_up').css('display', 'block');
        } else {
            $('#credit_point_up').css('display', 'none');
            $('#credit_point_up').html.val('');
        }

    });
</script>

<script>
    function newDoc() {
        window.location.assign("../index")
    }
</script>

</div>





<!-- End Forms Section -->