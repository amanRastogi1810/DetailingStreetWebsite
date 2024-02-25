<?php include('header.php'); ?>

<!--=================================
 inner-intro -->



<section class="inner-intro bg-1 bg-overlay-black-70">
    <div class="container">
        <div class="row text-center intro-title">
            <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                <h1 class="text-white">Check Warrenty </h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                    <li><a href="#">Check Warrenty</a> <i class="fa fa-angle-double-right"></i></li>

                </ul>
            </div>
        </div>
    </div>
</section>
<section class="contact page-section-ptb white-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- <div class="section-title"> -->
                <form class="form-horizontal" id="checkwarrenty" role="form">
                    <div class="contact-form" style="display:flex; justify-content: center;">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <input id="phone_no" type="text" placeholder="Mobile No.*"
                                    class="form-control placeholder" name="phone_no">
                            </div>
                        </div>
                        <div style="width:fit-content">
                            <button id="submit" name="submit" type="button" value="Send" class="button red">
                                Check Warrenty
                            </button>
                        </div>
                    </div>
                </form>

                <div id="table">
                </div>
                <div id="ajaxloader1"></div>
                <div id="ajaxloader" style="display:none"><img class="center-block" src="images/ajax-loader.gif" alt="">
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#submit').click(function () {

            maildata = $('#checkwarrenty').serialize();
            $('#ajaxloader').show();
            $.ajax({

                type: 'post',
                url: 'check_warrenty.php',
                data: maildata,

                success: function (htm) {

                    $('#phone_no').val('');

                    $('#ajaxloader').hide();
                    $('#table').html(htm);


                }
            });

        });

    });
</script>
<?php include('footer.php'); ?>