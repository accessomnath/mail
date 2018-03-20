<style>

    .required{

        color: red;
    }

</style>


<section id="page-content" class="sidebar-right pt-40" style="min-height: 600px;">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-xs-8" style="margin-top: 90px;">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">

                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" id="checkout_form" action="<?php echo base_url()  ?>payment/make_payment">

                        <input type="hidden" value="<?php echo $message_details->product_title ?>"  name="purpose">

                        <input type="hidden" value="<?php echo $message_details->id ?>"  name="id">
                        <input type="hidden" value="<?php echo $message_details->duration ?>"  name="duration">


                        <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong><?php echo $message_details->product_title  ?></strong></h4>
                                <h4><small>Duration : <?php echo $message_details->duration  ?> days</small></h4>
                            </div>
                            <div class="col-md-offset-2 col-xs-6">
                                <div class="col-xs-8 text-right">
                                    <h6><strong>Rs <?php echo $message_details->price_inr ?> (excluding taxes)</strong></h6>
                                </div>
                            </div>
                        </div>
                        <hr>
                             <hr>
                        <div class="row">
                            <div class="">
                                <div class="col-sm-8">
                                    <label>Name<span class="required">*</span></label>
                                    <div class="form-group">
                                        <input id="buyer_name" maxlength="25" type="text" name="buyer_name" class="form-control" required placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <label>Email<span class="required">*</span></label>
                                    <div class="form-group">
                                        <input id="email" type="text" name="email" class="form-control" required placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <label>Phone<span class="required">*</span></label>
                                    <div class="form-group">
                                        <input id="phone" type="text" maxlength="10" name="phone"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" required placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $tax_amt= (2.8*$message_details->price_inr)/100;
                        $total_amt= $message_details->price_inr + $tax_amt;
                        ?>
                            <input type="hidden" value="<?php echo round($total_amt)?>" name="price">
                            <p>**Taxes (Transaction + GST): 2.8%</p>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total Rs <strong><?php echo round($total_amt) ?></strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</section>