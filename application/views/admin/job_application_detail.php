<style>

    b{

        color: black;
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="card-body">
                                    <h3 class="card-title m-b-0">Detailed Job application.</h3>
                                <p>Recieved at: <?php echo $message_details->sent_at ?></p>
                                </div>

                                <div>
                                    <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex m-b-40">
                                        <div class="p-l-6" style="margin-right: 80px">
                                            <span>Applicant Name: </span><h4 class="m-b-0"><?php echo $message_details->uname  ?></h4><br>
                                            <span>From: </span><h4 class="m-b-0"><?php echo $message_details->email  ?></h4><br>
                                            <span>Applied For: </span><h4 class="m-b-0"><?php echo $message_details->applied_for  ?></h4>
                                        </div>
                                        <div class="p-l-6">

                                            <p class="p-l-10"><b>Current Location: </b> <?php
                                                echo $message_details->city
                                                ?></p>

                                            <p class="p-l-10"><b>Address Details: </b> <?php
                                                echo $message_details->address
                                                ?></p>

                                            <p class="p-l-10"><b>Qualification: </b> <?php
                                                echo $message_details->educational_qualification
                                                ?></p>

                                            <p class="p-l-10"><b>Experience: </b> <?php
                                                echo $message_details->experience
                                                ?></p>

                                            <p class="p-l-10"><b>Skills: </b> <?php
                                                echo $message_details->skills
                                                ?></p>

                                            <p class="p-l-10"><b>Download CV: </b>
                                                <a href="<?php echo base_url() ?>uploads/cv/<?php echo $message_details->cv_url ?>"> Click Here </a>
                                            </p>
                                            <p class="p-l-10">
                                                <button>Reply Now</button>
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <div>
                                    <hr class="m-t-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>