<?php include('header.php'); ?>

<style>
.franchisePaddingTop {
    padding-top: 60px;
}

.headingText {
    line-height: 28px !important;
}

.sectionLeftAlign {
    text-align: left;
}

.listBullet li {
    list-style-type: none !important;
}

#ajaxloader1 {
    position: absolute;
    top: 103%;
    left: 14px;
}

@media only screen and (min-width : 100px) and (max-width : 580px) {
    .franchisePaddingTop {
        padding-top: 0px;
    }
}
</style>



<section class="inner-intro bg-1 bg-overlay-black-70">
    <div class="container">
        <div class="row text-center intro-title">
            <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                <h1 class="text-white">Franchise </h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <ul class="page-breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                    <li><a href="#">franchise</a> <i class="fa fa-angle-double-right"></i></li>

                </ul>
            </div>
        </div>
    </div>
</section>

<!--=================================
 inner-intro -->


<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="section-title franchisePaddingTop">
                <br>
                <h2>Detailing Street Franchise</h2>
                <div class="separator"></div>
                <p style="text-align: justify">The Detailing Street brand is a pioneer in the auto detailing space.
                    Detailing Street is an organization that understands the evolving changes in the industry. The last
                    few years has marked our entry into automobile industry with the launch of our products like the
                    “ULTRA 9H ARMOUR & ULTRA PAINT PROTECTION FILM”.</p>
                <p style="text-align: justify">Detailing Street has taken the big steps in the industry and is committed
                    to bringing the very best and latest the world has to offer in terms of vehicle protection and
                    automobile technology. The result is a range of highly regarded and sought after detailing works in
                    automobiles.</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="section-title sectionLeftAlign">
                <div>
                    <h4 class="headingText">Detailing Street Mission</h4>
                </div>
                <p>Make every customer happy by delivering the best service and products.</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="section-title sectionLeftAlign">
                <h4 class="headingText sectionLeftAlign">Why Own a Franchise?</h4>
                <ol>
                    <ul class="listBullet">
                        <li>1. Investment friendly business plan</li>
                        <li>2. Be your own boss</li>
                        <li>3. Support from a trusted partner – Detailing Street, to help run a smooth business</li>
                        <li>4. Low Risk and High ROI</li>
                        <li>5. Growing Auto Detailing Market in India</li>
                        <li>6. The brand Detailing Street is trusted by thousands of customers</li>
                    </ul>
                </ol>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="section-title sectionLeftAlign">
                <h4 class="headingText sectionLeftAlign">The Detailing Street advantage:</h4>
                <ol>
                    <ul class="listBullet">
                        <li>1. <strong>Trusted by Franchise Partners</strong></li>
                        <li>2. <strong>Loved By Customers</strong></li>
                        <li>3. <strong>High ROI</strong></li>
                        <li>4. <strong>Strong Support System</strong> (marketing, operations and technical support)</li>
                        <li>5. <strong>Success Stories</strong></li>
                    </ul>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="section-title">
                <div class="submitFormDiv">
                    <h4 class="headingText sectionLeftAlign">INTERESTED IN OUR FRANCHISE</h5>
                </div>
                <p style="text-align: justify">If you would like to partner with us, fill out the form below and one of
                    our team members will get back to you.</p>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 80px;">
        <div class="col-md-offset-1 col-md-10">
            <div class="gray-form row">
                <div id="formmessage">Success/Error Message Goes Here</div>
                <form class="form-horizontal" id="contactform" role="form">
                    <div class="contact-form">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input id="name" type="text" placeholder="Name*" class="form-control placeholder"
                                    id="name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="location" placeholder="Location(City, State or Country if not India)*"
                                    class="form-control placeholder" id="location" name="location">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="email" placeholder="Email*" class="form-control placeholder" id="email"
                                    name="email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Phone*" class="form-control placeholder" id="phone"
                                    name="phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Current Profession*" class="form-control placeholder"
                                    id="profession" name="Current Profession">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea class="form-control input-message placeholder"
                                    placeholder="Comments (Optional)" rows="7" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="hidden" name="action" value="sendEmail">
                            <button id="submit" name="submit" type="button" value="Send" class="button red">
                                Send your message </button>
                        </div>
                    </div>
                </form>
                <div id="ajaxloader1" style="text-align: center"></div>
                <div id="ajaxloader" style="display:none"><img class="center-block" src="images/ajax-loader.gif" alt="">
                </div>
            </div>
        </div>

    </div>





    <div class="row" style="display: none;">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="feature-box text-center">
                <div class="icon">
                    <i class="glyph-icon flaticon-beetle"></i>
                </div>
                <div class="content">
                    <h6>All brands</h6>
                    <p>Printin k a galley of type lorem Ipsum is simply dummy text of the and</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="feature-box text-center">
                <div class="icon">
                    <i class="glyph-icon flaticon-interface-1"></i>
                </div>
                <div class="content">
                    <h6>Free Support</h6>
                    <p>Simply dummy text of the printin k a galley of type and lorem Ipsum is </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="feature-box text-center">
                <div class="icon">
                    <i class="glyph-icon flaticon-key"></i>
                </div>
                <div class="content">
                    <h6>Dealership</h6>
                    <p>Text of the printin lorem Ipsum is simply dummy k a galley of type and</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="feature-box text-center">
                <div class="icon">
                    <i class="glyph-icon flaticon-wallet"></i>
                </div>
                <div class="content">
                    <h6>AFFORDABLE</h6>
                    <p>The printin Lorem Ipsum is simply dummy text of k a galley of type and</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<!--=================================
car-details  -->





<!--=================================
 footer -->


<footer class="footer bg-2 bg-overlay-black-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="social">
                    <!-- <ul>
  <li><a class="facebook" href="#">facebook </a></li>
  <li><a class="twitter" href="#">twitter </a></li>
  <li><a class="pinterest" href="#">pinterest </a></li>
  <li><a class="dribbble" href="#">dribbble </a></li>
  <li><a class="google-plus" href="#">google plus </a></li>
  <li><a class="behance" href="#">behance </a></li>
</ul> -->
                    <br>
                </div>
            </div>
        </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#submit').click(function() {

        maildata = $('#contactform').serialize();
        $('#ajaxloader').show();
        $.ajax({

            type: 'post',
            url: 'mail.php',
            data: maildata,

            success: function(htm) {

                $('#name').val('');
                $('#email').val('');
                $('#location').val('');
                $('#phone').val('');
                $('#profession').val('');
                $('#message').val('');


                $('#ajaxloader').hide();
                $('#ajaxloader1').html(
                    '<span>Thank You for submitting your query - we will get back to you soon!</span>'
                );


            }
        });

    });
});
</script>

<?php include('footer.php'); ?>
