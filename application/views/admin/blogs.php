<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->

        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Blogs</h4>
                    <a href="<?php echo base_url()  ?>admin/dashboard/addnew_blog" class="btn btn-danger" style="float: right; margin-top: -30px">Add New Blog</a>
                    <h6 class="card-subtitle">Manage all your blog. You can edit the existing blogs from here.</h6>
                    <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Added By</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=0; foreach (array_reverse($all_message) as $message){
                                $i++;

                                ?>
                                <tr>
                                    <td><?php echo $i  ?></td>
                                    <td width="150"><img src="<?php echo base_url()  ?>uploads/blogs/<?php echo $message->blog_image ?>" style="width: 100%">
                                    </td>
                                    <td><?php echo $message->blog_title ?></td>
                                    <td><?php echo $message->blog_summary  ?></td>
                                    <td><?php echo $message->added_by  ?></td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo base_url() ?>admin/dashboard/blog_view/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                        <a href="<?php echo base_url() ?>admin/dashboard/blog_delete/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure to delete this blog?')"> <i class="fa fa-close text-danger"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->

    </div>

</div>