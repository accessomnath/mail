<style>
    label{
        margin-bottom: 10px !important;
    }
    .required{
        color: red;


    }

</style>
<script src="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-body">
                <h4 class="card-title">Add Lead</h4>

                <p><?php echo $this->session->flashdata('add_blog_msg')  ?></p>

                <form class="form-horizontal m-t-40" method="post" action="<?php echo base_url() ?>admin/dashboard/insert_lead" enctype="multipart/form-data">
                    <label>Lead date<span class="required">*</span></label>
                    <div class="input-group date" data-provide="datepicker">
                        <input class="data-datepicker"
                               id="task_last_day_to_submit" name="date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <label>Url<span class="required">*</span></label>
                        <input type="text" name="lead_url" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        // $(function(){
        //     $('.data-datepicker').datepicker({
        //         "setDate": new Date(),
        //         "autoclose": true
        //     });
        // });

        $('.data-datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: ''
        });


    });
</script>