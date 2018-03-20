    <section id="page-content">
        <div class="contact05-bg01 color-white pt-80 pb-80" style="    background: url(<?php echo base_url()  ?>site_asset/inset/pages-images/contact05-bg01.jpg) no-repeat center center;">
            <div class="container pt-50">
                <!--Form -->
                <div class="width-55">
                    <div class="row dg-form-content16">
                        <div>
                            <p><strong>Pay For:</strong> 7 days who is data subscription</p>
                            <p><strong>Product Price:</strong> Rs 400</p>
                       <form method="post" action="<?php echo base_url()  ?>payment/make_payment">
                            <input name="purpose" value="7 days whois" type="hidden">
                            <input name="price" value="400" type="hidden">
                        </div>

                        <div class="col-sm-12">
                            <div class="form-row">
                                <input id="buyer_name" type="text" name="buyer_name" class="flvname" required placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-row">
                                <input id="email" type="text" name="email" class="flvname" required placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-row">
                                <input id="phone" type="text" name="phone" class="flvname" required placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input type="submit" name="submit" value="PAY RS 400 NOW" class=" btn submit_but">
                        </div>
                       <form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--Content End-->

