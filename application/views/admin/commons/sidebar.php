<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->

            <!-- User profile text-->
            <div class="profile-text" style="margin-top: 20px">
                <h5><?php echo $meta_data->admin_name  ?></h5>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="#" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="<?php echo base_url() ?>admin/account/login" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>

            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">PERSONAL</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Account Setting

                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/setting_personal">Pesonal Settings</a></li>
                        <li><a href="#">Website Settings</a></li>

                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?php echo base_url()   ?>admin/dashboard/contacts"><i class="mdi mdi-email"></i>Contact Messages</a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Career</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url() ?>admin/dashboard/application_recieved">Application Recieved</a></li>
<!--                        <li><a href="#">About Us</a></li>-->

                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Blogs</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/blogs">Manage Blogs</a></li>
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/addnew_blog">Add New Blog</a></li>

                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Leads</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/leads">Leads</a></li>
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/addnew_lead">Add New Lead</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/product">Manage Products</a></li>
                        <li><a href="<?php echo base_url()  ?>admin/dashboard/addnew_products">Add New Products</a></li>

                    </ul>
                </li>






            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>