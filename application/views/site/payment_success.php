<style>
   .success{
        margin-top: 40px;
        text-align: center;
    }
    .success_image{
        padding: 10px;
    }
    .box{
        margin-top: 100px;
        padding: 10px;
        border: 1px solid black;
        text-align: center;
    }
</style>
<section id="page-content" class="sidebar-right pt-40" style="min-height: 600px">
    <div class="container">
        <div class="row">
            <div class="success  col-md-8">
                <div class="success_image">
                <img src="<?php echo base_url()  ?>site_asset/thanks.jpg">
                </div>
                <div class="success_text">
                    <h4>Payment ID: <?php echo $payment_data['payment_id']; ?></h4>
                    <h4>Product Name: <?php echo $payment_data['order_title']; ?></h4>

                    <p><strong>Please use the below credentials to log in to your account: </strong></p>
                          <p>username: <?php  $payment_data['cred'] ?></p>
                          <p>Password: <?php  $payment_data['cred'] ?></p>  

                    <h3>Payment Amount: <?php echo $payment_data['purchase_amt']  ?></h3>
                    <a href="<?php echo base_url()  ?>client/login" class="btn btn-success">Log In Now</a>
                </div>
            </div>
            <div class="col-md-4 box">
                <h2>For Query Contact</h2>
                <hr>
                <p><strong>Skype:</strong> mystartupleads@gmail.com</p>
                <p><strong>Phone:</strong> +91-9673879759</p>
                <p><strong>Email:</strong> mystartupleads@gmail.com</p>
            </div>
        </div>
    </div>
</section>