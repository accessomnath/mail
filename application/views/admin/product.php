<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Product</h4>
                    <a href="<?php echo base_url()  ?>admin/dashboard/addnew_product" class="btn btn-danger" style="float: right; margin-top: -30px">Add New Product</a>
                    <h6 class="card-subtitle">Manage all your Product. You can edit the existing portfolio from here.</h6>
                    <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Title</th>
                                <th>Price INR</th>
                                <th>Price USD</th>
                                <th>Duration</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach (array_reverse($all_message) as $message){
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i  ?></td>

                                    <td><?php echo $message->product_title ?></td>
                                    <td><?php echo 'INR '. $message->price_inr  ?></td>
                                    <td><?php echo '$ '. $message->price_usd	  ?></td>
                                    <td><?php echo $message->duration.' days'	  ?></td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo base_url() ?>admin/dashboard/product_view/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                        <a href="<?php echo base_url() ?>admin/dashboard/product_delete/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure to delete this blog?')"> <i class="fa fa-close text-danger"></i> </a>
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