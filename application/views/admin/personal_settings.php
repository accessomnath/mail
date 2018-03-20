<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="<?php echo base_url() ?>uploads/profile/<?php echo $meta_data->profile_image ?>" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10"><?php echo $meta_data->admin_name  ?></h4>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6><?php echo $meta_data->email_id  ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                    <h6><?php echo $meta_data->phone_no  ?></h6> <small class="text-muted p-t-30 db">Address</small>
                    <h6><?php echo $meta_data->address  ?></h6>
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <a href="<?php echo 'https://'.$meta_data->fb_link   ?>" class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo 'https://'.$meta_data->twitter_link   ?>" class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo 'https://'.$meta_data->youtube_link   ?>"class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <p style="padding: 10px; text-align: center"><?php echo $this->session->flashdata('meta_data_update_msg') ?></p>
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile_image" role="tab">Profile Image</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                   <!--second tab-->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="post" action="<?php echo base_url()   ?>admin/dashboard/update_setting_personal">

                                <input type="hidden" name="update_type" value="profile_update">
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php echo $meta_data->admin_name ?>" name="admin_name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" value="<?php echo $meta_data->email_id ?>" name="email_id" id="email_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Alternate Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" value="<?php echo $meta_data->alertnate_email_id ?>" name="alertnate_email_id" id="alertnate_email_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Phone</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" value="<?php echo $meta_data->phone_no ?>" name="phone_no" id="phone_no">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Alternate Phone</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="alternamte_phone_no" value="<?php echo $meta_data->alternamte_phone_no ?>" id="alternamte_phone_no">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" name="address"><?php echo $meta_data->address ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Fb Link</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" value="<?php echo $meta_data->fb_link ?>" name="fb_link" id="fb_link">
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="example-email" class="col-md-12">Twitter Link</label>
                                <div class="col-md-12">
                                    <input type="text"  class="form-control form-control-line" value="<?php echo $meta_data->twitter_link ?>" name="twitter_link" id="twitter_link">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Youtube Link</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control form-control-line" value="<?php echo $meta_data->youtube_link ?>" name="youtube_link" id="youtube_link">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="post" action="<?php echo base_url()   ?>admin/dashboard/update_setting_personal">
                                <input type="hidden" name="update_type" value="settings_update">
                                <div class="form-group">
                                    <label class="col-md-12">admin Username</label>
                                    <div class="col-md-12">
                                     <input type="text" name="admin_username" value="<?php echo $admin_detail->admin_username ?>" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label for="example-email" class="col-md-12">Password</label>
                                   <div class="col-md-12">
                                   <input type="password" value="<?php echo $admin_detail->admin_password ?>" class="form-control form-control-line" name="admin_password" id="admin_password" readonly>
                                   <a href="#" id="show" onclick="show_pass()">Show</a>
                                   <a href="#" id="hide" onclick="hide_pass()" style="display: none">Hide</a>
                                   <a href="#" id="enable_pass_change" onclick="enable_pass_change()" style="float: right">Enable Password Change</a>
                                   </div>
                                </div>
                              <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Settings</button>
                                    </div>
                              </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile_image" role="tabpanel">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/dashboard/update_setting_personal">
                                    <input type="hidden" name="update_type" value="profile_image_update">
                                    <div class="form-group">
                                    <h4 class="card-title">Profile Image</h4>
                                    <label for="input-file-now-custom-1">You can change your profile image from here.</label>
                                    <input type="file" name="userfile" id="input-file-now-custom-1" class="dropify" data-default-file="<?php echo base_url() ?>uploads/profile/<?php echo $meta_data->profile_image  ?>" />
                                    </div>
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                      <button type="submit" class="btn btn-success">Update Image</button>
                                      </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<!--                        <div class="card-body">-->
<!--                            <form class="form-horizontal form-material" method="post" action="--><?php //echo base_url()   ?><!--admin/dashboard/update_setting_personal">-->
<!---->
<!--                                <input type="hidden" name="update_type" value="profile_image">-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    <label class="col-md-12">admin Username</label>-->
<!--                                    <div class="col-md-12">-->
<!--                                        <input type="text" name="admin_username" value="--><?php //echo $admin_detail->admin_username ?><!--" class="form-control form-control-line">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    -->
<!---->
<!--                                </div>-->
<!---->
<!---->
<!---->
<!--                                <div class="form-group">-->
<!--                                    <div class="col-sm-12">-->
<!--                                        <button class="btn btn-success">Update Settings</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="<?php echo base_url() ?>admin_assets/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>

<script>
    function show_pass() {
        $('#admin_password').attr('type', 'text');
        $('#show').hide();
        $('#hide').show();
    }
    function hide_pass(){
        $('#admin_password').attr('type', 'password');
        $('#show').show();
        $('#hide').hide();
    }
    function enable_pass_change() {
        $("#admin_password").attr("readonly", false);
        alert('You can now change the password');
    }
</script>