<style>
    label{
        margin-bottom: 10px !important;
    }
    .required{
        color: red;


    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-body">
                <h4 class="card-title">Update a new Portfolio</h4>

                <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>

                <form class="form-horizontal m-t-40" method="post" action="<?php echo base_url() ?>admin/dashboard/update_portfolio" enctype="multipart/form-data">


                    <input type="hidden" name="id" value="<?php echo $message_details->id ?>">

                    <div class="form-group">
                        <label>Portfolio Title<span class="required">*</span></label>
                        <input type="text" name="portfolio_title" class="form-control" value="<?php echo $message_details->portfolio_title ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Client Name<span class="required">*</span></label>
                        <input type="text" name="client" class="form-control" value="<?php echo $message_details->client ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Portfolio Category<span class="required">*</span></label>

                       <?php

                       $options = array(
                           'small'         => 'Select Category',
                           'Ecommerce'           => 'Ecommerce',
                           'Blog'         => 'Blog',
                           'Health'        => 'Health',
                           'Travel'        => 'Travel',
                           'NGO/NonProfit'        => 'NGO/NonProfit',
                           'Logo'        => 'Logo',
                           'Business'        => 'Business',
                           'Portfolio'        => 'Portfolio',
                       );

                       echo form_dropdown('category', $options, $message_details->category);


                       ?>



                    </div>
                    <div class="form-group">
                        <label>Website URL (If any)<span class="required"></span></label>
                        <input type="text" name="url" class="form-control" value="<?php echo $message_details->url  ?>">
                    </div>

                    <div class="form-group">
                        <h4 class="card-title">Portfolio Image</h4>
                        <label for="input-file-now-custom-1"></label>
                        <input type="file" name="userfile" id="input-file-now-custom-1" class="dropify" data-default-file="<?php echo base_url()  ?>uploads/portfolio/<?php echo $message_details->portfolio_image  ?>"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: "300px",
            styleWithSpan: false
        });
    });
    function postForm() {
        $('textarea[name="content"]').html($('#summernote').code());
    }
</script>