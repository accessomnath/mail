<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Portfolio</h4>
                    <a href="<?php echo base_url()  ?>admin/dashboard/addnew_portfolio" class="btn btn-danger" style="float: right; margin-top: -30px">Add New Portfolio</a>
                    <h6 class="card-subtitle">Manage all your Portfolio. You can edit the existing portfolio from here.</h6>
                    <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Client</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach (array_reverse($all_message) as $message){
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i  ?></td>
                                    <td width="150"><img src="<?php echo base_url()  ?>uploads/portfolio/<?php echo $message->portfolio_image ?>" style="width: 100%">
                                    </td>
                                    <td><?php echo $message->portfolio_title ?></td>
                                    <td><?php echo $message->category  ?></td>
                                    <td><?php echo $message->client  ?></td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo base_url() ?>admin/dashboard/portfolio_view/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                        <a href="<?php echo base_url() ?>admin/dashboard/portfolio_delete/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure to delete this blog?')"> <i class="fa fa-close text-danger"></i> </a>
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