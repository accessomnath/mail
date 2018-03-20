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
                <h4 class="card-title">Add a new Portfolio</h4>

                <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>

                <form class="form-horizontal m-t-40" method="post" action="<?php echo base_url() ?>admin/dashboard/insert_portfolio" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Portfolio Title<span class="required">*</span></label>
                        <input type="text" name="portfolio_title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Client Name<span class="required">*</span></label>
                        <input type="text" name="client" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Portfolio Category<span class="required">*</span></label>
                        <select name="category" class="form-control" style="height: 45px !important;">
                            <option>Select Category</option>
                            <option value="Ecommerce">Ecommerce</option>
                            <option value="Blog">Blog</option>
                            <option value="Health">Health</option>
                            <option value="Travel">Travel</option>
                            <option value="NGO/NonProfit">NGO/NonProfit</option>
                            <option value="Logo">Logo</option>
                            <option value="Business">Business</option>
                            <option value="Portfolio">Portfolio</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label>Website URL (If any)<span class="required"></span></label>
                        <input type="text" name="url" class="form-control" value="">
                    </div>


                    <div class="form-group">
                        <h4 class="card-title">Portfolio Image</h4>
                        <label for="input-file-now-custom-1"></label>
                        <input type="file" name="userfile" id="input-file-now-custom-1" class="dropify" data-default-file="" required/>
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