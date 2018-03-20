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
                <h4 class="card-title">Add a new blog</h4>

                <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>

                <form class="form-horizontal m-t-40" method="post" action="<?php echo base_url() ?>admin/dashboard/update_blog" enctype="multipart/form-data">

                   <input type="hidden" name="id" value="<?php echo $message_details->id  ?>"   >

                    <div class="form-group">
                        <label>Blog page title<span class="required">*</span> (For Seo)<span class="help"></span></label>
                        <input type="text" name="page_title" class="form-control" value="<?php echo $message_details->page_title  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="example-email">Meta Description<span class="required">*</span>  <span class="help">(For Seo)</span></label>
                        <input type="text" id="" name="meta_description" class="form-control" placeholder="" value="<?php echo $message_details->meta_description  ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Blog Title<span class="required">*</span></label>
                        <input type="text" name="blog_title" class="form-control" value="<?php echo $message_details->blog_title  ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Blog Subtitle<span class="help">(Optional)</span></label>
                        <input type="text" class="form-control" value="<?php echo $message_details->blog_subtitle  ?>" name="blog_subtitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Content<span class="required">*</span> </label>
                        <textarea id="summernote" name="content" rows="10"><?php echo $message_details->content  ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Summary<span class="required">*</span></label>
                        <textarea class="form-control" name="blog_summary" rows="6" required><?php echo $message_details->blog_summary  ?></textarea>
                    </div>
                    <div class="form-group">
                        <h4 class="card-title">Blog Featured Image</h4>
                        <label for="input-file-now-custom-1"></label>
                        <input type="file" name="userfile" id="input-file-now-custom-1" class="dropify" data-default-file="<?php echo base_url()  ?>uploads/blogs/<?php echo $message_details->blog_image ?>"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update Blog</button>
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