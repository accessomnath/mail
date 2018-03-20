<div class="pagetitleBox pagetitle-layout-center pagetitle-xl pagetitle-images Portfolios-pagetitle-images01 mb-0">
    <div class="container ">
        <div class="pagetitle-border">
            <h1 class="title">Blog</h1>
        </div>
    </div>
</div>
<!-- Page Title End-->
<!--Content -->
<section id="page-content" class="sidebar-right pt-40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 main-content">
                <div class="blog-classic2-list-main ">
                    <?php $i = 0;
                    foreach (array_reverse($all_message) as $message) {
                        $i++;
                        $dateall = $message->created_at;

                        $d = date("d", strtotime($dateall));
                        $m = date("m", strtotime($dateall));

                        $monthNum = $m;
                        $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                        $shortmonthname = substr($monthName, 0, 3)

                        ?>
                        <div class="blog-classic2-list clearfix">
                            <div class="list-image "><img style="height: 258px;" alt="Class Aptent Taciti Soci"
                                                          src="<?php echo base_url() ?>uploads/blogs/<?php echo $message->blog_image ?>"/>
                                <div class="list-date "><span class="day "><?php echo $d; ?></span><span
                                            class="month "><?php echo $shortmonthname; ?></span>
                                </div>
                            </div>
                            <div class="list-main ">
                                <h3 class="list-title "><a href="#"
                                                           title="Class Aptent Taciti Soci"><?php echo $message->page_title; ?></a>
                                </h3>
                                <div class="list-info"><span class="fa fa-user2"></span><a href="#"
                                                                                           title="admin"><?php echo $message->added_by; ?></a><span
                                            class="sep"></span><span class="fa fa-tag2"></span> <a href="#"
                                                                                                   title="Design">Design</a>,
                                    <a href="#" title="Web">Web</a><span class="sep"></span>
                                    <span class="fa fa-bubble-dots"></span>12
                                </div>
                                <div class="list-description "><?php echo $message->blog_summary; ?>
                                </div>
                                <div class="clearfix list-bottom-info "><a
                                            href="<?php echo base_url() ?>blog/detail/<?php echo $message->blog_slug; ?>"
                                            class="list-more "
                                            title="View more ">View more</a>
                                    <div class="list-info no-margin right "><span class="fa fa-bubble-dots "></span>12
                                        <span class="sep"></span><span class="fa fa-heart2 "></span>180
                                        <span class="sep "></span><span class="fa fa-share2 "></span>Share
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                </div>
                <div class="blog-page text-left"><span class="page-info">Page 1 of 2</span> <a href="#">First</a> <a
                            href="#"><span class="fa fa-angle-left"></span></a> <a href="#">1</a> <a href="#"
                                                                                                     class="current">2</a>
                    <a href="#">...</a> <a href="#"><span class="fa fa-angle-right"></span></a> <a href="#"
                                                                                                   class="disable"
                                                                                                   disable>Last</a>
                </div>
                <div class="pb-60"></div>
            </div>

            <div class="col-sm-12 col-md-3 sidebar">
                <div class="blog-sidebar-content">
                    <div class="widget-data-box">
                        <h4 class="widget-title">CALENDAR</h4>
                        <div id="datetimepicker12"></div>
                    </div>
                    <!-- Widget Data End-->
                    <hr/>
                    <!-- Widget Gallery-->
                    <ul class="widget-gallery">
                        <h2 class="widget-title">MINI GALLERY</h2>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget09.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget09.jpg"
                                   title="Image 01"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget10.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget10.jpg"
                                   title="Image 02"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget11.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget11.jpg"
                                   title="Image 03"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget12.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget12.jpg"
                                   title="Image 04"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget13.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget13.jpg"
                                   title="Image 05"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget14.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget14.jpg"
                                   title="Image 06"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget15.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget15.jpg"
                                   title="Image 07"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget16.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget16.jpg"
                                   title="Image 08"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget17.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget17.jpg"
                                   title="Image 09"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget18.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget18.jpg"
                                   title="Image 10"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget19.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link"
                                   href="<?php echo base_url() ?>site_asset/inset/blog/blog-widget19.jpg"
                                   title="Image 11"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget20.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link" href="inset/blog/blog-widget20.jpg"
                                   title="Image 12"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget21.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link" href="inset/blog/blog-widget21.jpg"
                                   title="Image 13"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget22.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link" href="inset/blog/blog-widget22.jpg"
                                   title="Image 14"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget23.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link" href="inset/blog/blog-widget23.jpg"
                                   title="Image 15"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                        <li>
                            <div class="lightbox-box">
                                <div class="pic"><img alt="Photo"
                                                      src="<?php echo base_url() ?>site_asset/inset/blog/blog-widget24.jpg">
                                </div>
                                <a class="LightBox_image_gallery1 full-link" href="inset/blog/blog-widget24.jpg"
                                   title="Image 16"> </a>
                                <span class="bg bg-accent"></span>
                            </div>
                        </li>
                    </ul>
                    <!-- Widget Gallery End-->
                    <hr/>
                    <!-- Widget Tag-->
                    <div class="widget-tag">
                        <h2 class="widget-title">TAGS</h2>
                        <a href="#">Nature</a> <a href="#">Opportunities</a> <a href="#">Development</a> <a
                                href="#">Art</a> <a href="#">Articles</a> <a href="#">Audio</a> <a href="#">Culture</a>
                        <a href="#">Business</a> <a href="#">Trends</a> <a href="#">Information </a></div>
                    <!-- Widget Tag End-->
                    <hr/>
                    <!-- Widget Archive-->
                    <div class="widget-archive">
                        <h2 class="widget-title">ARCHIVE</h2>
                        <ul class="archive_list">
                            <li class=""><a href="#" title="February 2017">Jun 2015</a></li>
                            <li class=""><a href="#" title="January 2017">January 2017</a></li>
                            <li class=""><a href="#" title="February 2017">March 2017</a></li>
                            <li class=""><a href="#" title="January 2017">April 2017</a></li>
                        </ul>
                    </div>
                    <!-- Widget Archive End-->
                </div>
            </div>
        </div>
</section>
<div class="clearfix"></div>


