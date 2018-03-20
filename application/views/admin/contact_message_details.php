<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-10 col-lg-9 col-md-8 bg-light-part b-l">
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="card-body">
                                    <h3 class="card-title m-b-0">Your message details goes here</h3>
                                </div>
                                <div>
                                <hr class="m-t-0">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex m-b-40">
                                        <div class="p-l-10">
                                            <span>Sender Name: </span><h4 class="m-b-0"><?php echo $message_details->custname  ?></h4><br>
                                            <span>From: </span><h4 class="m-b-0"><?php echo $message_details->email  ?></h4><br>
                                            <span>Phone: </span><h4 class="m-b-0"><?php echo $message_details->phone  ?></h4>
                                        </div>
                                    </div>
                                    <p class="p-l-10"><b>Message subject: </b></p>
                                    <p class="p-l-10">
                                        <?php
                                        echo $message_details->subject
                                        ?>
                                    </p>
                                    <p class="p-l-10"><b>Message Details: </b></p>
                                    <p class="p-l-10">
                                        <?php
                                        echo $message_details->message
                                        ?>
                                    </p>
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