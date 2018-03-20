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
                    <h4 class="card-title">Job Application Recieved</h4>
                    <h6 class="card-subtitle">Sell all the details of those who have sent there application through career page.</h6>
                    <p><?php echo $this->session->flashdata('del_msg')  ?></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Applicant Name </th>
                                <th>Applied For</th>
                                <th>Experience</th>
                                <th>Email</th>
                                <th>Sent at</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach (array_reverse($all_message) as $message){
                                ?>
                                <tr>
                                    <td><?php echo $message->uname  ?></td>
                                    <td><?php echo $message->applied_for ?></td>
                                    <td><?php echo $message->experience ?></td>
                                    <td><?php echo $message->email  ?></td>
                                    <td><?php echo $message->sent_at  ?></td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo base_url() ?>uploads/cv/<?php echo $message->cv_url ?>" data-toggle="tooltip" data-original-title="Download CV"> <i class="fa fa-download text-inverse m-r-10"></i> </a>
                                        <a href="<?php echo base_url() ?>admin/dashboard/application_detail/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="<?php echo base_url() ?>admin/dashboard/contact_delete/<?php echo $message->id ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure to delete this message?')"> <i class="fa fa-close text-danger"></i> </a>
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