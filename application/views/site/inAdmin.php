<section id="page-content" style="height: 800px">
    <div class="contact05-bg01 color-white pt-80 pb-80">
        <div class="container pt-50">
<!--            <p>--><?php //echo $this->session->flashdata('add_blog_msg'); ?><!--</p>-->
            <ul style="color: black">
            <?php $i=0; foreach (array_reverse($all_message) as $message){
                $i++;
                ?>
                    <a href="<?php echo $message->lead_url;  ?>" target="_blank"> <li style="color: #0c6a06"><?php echo date("d-m-Y",strtotime($message->date)); ?></li></a>


<!--                    <li>--><?php //echo $message->lead_url;  ?><!--</li>-->
<!--                    <li class="text-nowrap">-->
<!--                        <!--                                        <a href="--><?php ////echo base_url() ?><!--<!--admin/dashboard/portfolio_view/--><?php ////echo $message->id ?><!--<!--" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>-->
<!--                        <a href="--><?php //echo base_url() ?><!--admin/dashboard/lead_delete/--><?php //echo $message->id ?><!--" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure to delete this blog?')"> <i class="fa fa-close text-danger"></i> </a>-->
<!--                    </li>-->

            <?php } ?>

            </ul>

        </div>
    </div>
</section>
<div class="clearfix"></div>




