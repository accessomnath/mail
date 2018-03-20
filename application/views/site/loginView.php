<section id="page-content">
    <div class="contact05-bg01 color-white pt-80 pb-80" style="    background: url(<?php echo base_url()  ?>site_asset/inset/pages-images/contact05-bg01.jpg) no-repeat center center;">
        <div class="container pt-50">
            <!--Form -->

            <div class="width-55">

                <div class="row dg-form-content16">
                    <p style="color: red"><?php echo $this->session->flashdata('errmsg')?></p>
                    <form action="<?php  echo base_url()?>login/checklogin" method="post">
                    <div class="col-sm-12">
                        <div class="form-row">
                            <input id="email" type="text" name="email" class="flvname" required placeholder="Email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-row">
                            <input id="phone" type="password" name="password" class="flvname" required placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <input type="submit" value="Sign in" class=" btn submit_but">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!--Content End-->

