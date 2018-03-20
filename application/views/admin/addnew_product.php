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
                <h4 class="card-title">Add a new Product</h4>

                <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>

                <form class="form-horizontal m-t-40" method="post" action="<?php echo base_url() ?>admin/dashboard/insert_product" enctype="multipart/form-data">


                    <div class="form-group">
                        <label>Product Title<span class="required">*</span></label>
                        <input type="text" name="product_title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Price In Inr<span class="required">*</span></label>
                        <input type="text" name="price_inr" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Price In USD<span class="required">*</span></label>
                        <input type="text" name="price_usd" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Duration<span class="required"></span></label>
                        <input type="number" name="duration" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Summary<span class="required"></span></label>
                        <textarea name="summary" class="form-control" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit Product</button>
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
</script><?php
/**
 * Created by PhpStorm.
 * User: debayan
 * Date: 6/2/18
 * Time: 8:01 AM
 */