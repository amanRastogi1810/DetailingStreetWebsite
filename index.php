 <?php include 'header.php';?>

 <style type="text/css">
.cls_mobile {
    margin-left: auto;
}

.videoSectionForMobile {
    display: none;
}

.mainOverlayDiv {
    position: relative;
    background: #000000;
}

.thevideo {
    width: 305px !important;
    height: 172px;
    object-fit: cover;
}

.protectionImages {
    height: 137px;
    width: 274px;
}

.popmake-close {
    background-color: #D91309 !important;
    height: 26px;
    width: 26px;
    left: auto;
    right: -509px;
    bottom: auto;
    top: -246px;
    position: relative;
    padding: 0px;
    color: #ffffff;
    font-family: Arial;
    font-size: 24px;
    line-height: 24px;
    border: 2px solid #ffffff;
    border-radius: 26px;
    box-shadow: 0px 0px 15px 1px rgba(2, 2, 2, 0.75);
    text-shadow: 0px 0px 0px rgba(0, 0, 0, 0.23);
    background-color: rgba(0, 0, 0, 1.00);
}

.offerPopup {
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1999999999;
    opacity: 1;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1999999999;
    overflow: initial;
    transition: .15s ease-in-out;
    background-color: rgba(0, 0, 0, 0.9);
}

.modal-header {
    padding: 0px !important;
    border-bottom: none !important;
}

.offerPopupImg {
    width: 500px;
    height: 500px;
}

@media only screen and (min-width : 100px) and (max-width : 580px) {


    .video-slider {
        display: none;
        /* background-image: url('img/more/mob1.png'); */
        /* background-repeat: no-repeat; */
    }


    .thevideo {
        width: 274px;
        height: 172px;
        object-fit: cover;
    }

    .cls_mobile {
        margin: 0px 20px;
    }

    .welcome-block.objects-car {
        overflow: initial;
    }

    .videoSectionForMobile {
        text-align: center;
        display: block;
    }

    .car-item .car-content {
        width: 100% !important;
    }

    .protectionImages {
        height: 137px;
        width: 274px;
        margin-left: 10px;
    }

    .protectionMargin {
        margin-left: 0px;
        margin-right: 0px;
    }

    .price {
        padding: 10px;
    }

    .coatingPara {
        padding: 0px 15px !important;
    }

    .offerPopupImg {
        width: 315px;
        height: 320px;
        margin-left: -16px;
    }

    .offerPopup {
        padding-top: 152px;
        align-items: unset;
    }

    .popmake-close {
        right: -304px;
        top: -7px;
    }
}
 </style>

 <div class="modal fade in" id="offerModal">
     <div class="offerPopup">
         <button type="button" class="pum-close popmake-close" aria-label="Close">×</button>
         <img class="offerPopupImg" src="images/offer-popup.jpg" alt="New year offer" />
     </div>
 </div>

 <section class="video-slider">
     <div class="bg-overlay-black mainOverlayDiv">
         <video id="bgvid" autoplay="false" loop="true" muted="true" preload="none" width="100%" height="100%">
             <source data-src="https://detailingstreet.com/video/video.mp4" type="video/mp4" />
         </video>
     </div>
 </section>
 <!-- END REVOLUTION SLIDER -->

 <section class="videoSectionForMobile">
     <iframe src="https://www.youtube.com/embed/DgJf1PexHe4" width="95%" height="240" allowFullScreen frameBorder="0"
         allow="autoplay; encrypted-media">
     </iframe>
 </section>

 <!--=================================
  rev slider -->
 <!--=================================
 welcome -->

 <section class="welcome-block objects-car page-section-ptb white-bg">
     <!-- <div class="objects-left left"><img class="img-responsive objects-1" src="images/objects/01.jpg" alt=""></div>
 <div class="objects-right right"><img class="img-responsive objects-2" src="images/objects/02.jpg" alt=""></div> -->
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12">
                 
                 <div class="section-title"><span>The only coating solution for your vehicle</span>
                    
                     <h2>What we do</h2>

                     <div class="separator"></div>

                     <p>GET READY TO TAKE PRIDE IN YOUR RIDE WITH DETAILING STREET! Detailing Street is the leader in
                         ceramic armour coatings based on nano-technology. We offer wide range of products each formulated for
                         specific surfaces. Our ceramic coatings are designed for automotive applications. The formulas
                         are molecularly designed for surfaces such as paint, vinyl, polymers, glass and more. Our
                         coatings bond to surfaces at a molecular level, filling in any nano-pores and creating a
                         hydrophobic surface that is impervious to contamination. This makes our products ideal for
                         critical applications across all industries. No other product in the world performs quite like
                         this..</p>
                 </div>
             </div>
         </div>

         <div class="row">

             <div class="section-title">
                 
                 <h4> The Ultimate Protective Coating For Your Vehicle</h4>
                 <div class="separator"></div>
                 <h1>Best Nano Ceramic Coating</h1>

                 <div class="separator"></div>

                 <p class="coatingPara" style="text-align: center;">Detailing Street believes in giving quality services
                     with its best Ultra
                     Hard Extremely Durable Ultra 9H Nano Ceramic Armour Coatings and the Ultra Paint Protection Film. Some of the benefits of our extreme
                     coating and ultra paint protection film are Super High Gloss, 9H Hardness, Super Hydrophobic Effect, UV & Corrosion Resistance. All
                     these properties together makes our coating the Best Nano Ceramic Coating and the only coating solution for your car.</p>
                 <a class="button border" href="about.php">Know More</a>

             </div>

             <div class="separator"></div>

             <div class="col-lg-3 col-md-3 col-sm-6">
                 <div class="feature-box text-center">
                     <div class="icon">
                         <i>
                             <img src="img/icon/gloss.png" style="width: 55px;height: 60px;"alt="Superior Gloss Car Coating" />
                             <!--   <i class="glyph-icon flaticon-beetle"></i> -->
                         </i>
                     </div>

                     <div class="content">
                         <h6>COATING FOR HIGH GLOSS</h6>

                         <p>Our Ultra 9H Nano Ceramic Armour Coating features a super high gloss along with a long
                             lasting shine on your vehicle making it look brand new always.</p>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-6">
                 <div class="feature-box text-center">
                     <div class="icon">
                         <i>
                             <img src="img/icon/9H.png" style="width: 55px;height: 60px;"alt="9h nano ceramic armour coating" />

                         </i>
                     </div>

                     <div class="content">
                         <h6>9H HARDNESS</h6>

                         <p>Our Ultra 9H coating thickness can be increased with additional layers allowing a
                             thicker/harder film that will increase its scratch resistance.</p>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-6">
                 <div class="feature-box text-center">
                     <div class="icon">
                         <i>
                             <img src="img/icon/Hydrophobic.png" style="width: 55px;height: 60px;"alt="best hydrophobic coating and ppf" /> </i>
                     </div>

                     <div class="content">
                         <h6>SUPER HYDROPHOBIC</h6>

                         <p>The Super Hydrophobic Effect of the surface coated with 9H will stay cleaner for longer as
                             dirt and grime will not stick to the surface.</p>
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-6">
                 <div class="feature-box text-center">
                     <div class="icon">
                         <i>
                             <img src="img/icon/uv_corrosion.png" style="width: 55px;height: 60px;"alt="anti corrosion coating" /> </i>
                     </div>

                     <div class="content">
                         <h6>UV &amp; CORROSION RESISTANCE</h6>

                         <p>9H forms a permanent bond to the paint work and will not wash away or break down making it
                             strong enough to be UV &amp; Corrosion resistant.</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <section class="feature-car bg-2 bg-overlay-black-70 page-section-ptb">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12">
                 <div class="section-title"><span class="text-white">OUR SERVICES</span>

                     <h3 class="text-white">DETAILING</h3>

                     <div class="separator"></div>
                 </div>
             </div>
         </div>

         <style>
         #videosList {
             max-width: 200px;
             overflow: hidden;
         }

         .servicesImages {
             /*background-image: url('https://img.youtube.com/vi/nZcejtAwxz4/maxresdefault.jpg');*/
             height: 137px;
             width: 274px;

         }

         /* Hide Play button + controls on iOS */
         /* video::-webkit-media-controls {
             display: none !important;
         } */
         </style>
         <div class="row">
             <div class="col-lg-12 col-md-12 cls_mobile">
                 <div class="owl-carousel-1">
                     <div class="item">


                         <div class="car-item text-center">

                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/paint-restoration.jpg"
                                         alt="Vehicle Paint Restoration" />
                                 </div>
                             </div>


                             <!--  <div class="car-list">
																<ul class="list-inline">
																	<li><i class="fa fa-registered"></i> 2017</li>
																	<li><i class="fa fa-cog"></i> Manual </li>
																	<li><i class="fa fa-dashboard"></i> 6,000 mi</li>
																</ul>
															</div> -->

                             <div class="car-content">

                                 <a href="services.php">Paint Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;"><span class="cls_cut">
                                         <?php echo substr('Our paint restoration techniques gives truly amazing results with the help of our trained professionals. Our team focuses on removing scratches, oxidation, fade, hard water marks, swirl marks and holograms.', 0, 50);
echo '...'; ?>
                                     </span> <span class="new-price"><a class="button border" href="services.php">Know
                                             More</a> </span></div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/headlight-restoration.jpg"
                                         alt="Headlight Restoration" />
                                 </div>

                             </div>


                             <div class="car-content"> <a href="services.php">Headlight Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;">
                                     <span><?php echo substr('Our trained professionals focuses on every detail of your vehicle including the headlights and tail lights. Over time the protective hard coat breaks down with UV degradation and wear from abrasion, etc. If left untreated the headlights will eventually develop small surface cracks Our team use different kinds of high quality products to restore the beautiful eyes of your car making them look like new.', 0, 50); ?></span><br />
                                     <br>
                                     <a class="button border" href="services.php">Know More</a> <span class="new-price">
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/wheel-restoration.jpg"
                                         alt="Wheel Restoration" />
                                 </div>

                             </div>


                             <div class="car-content"> <a href="services.php">Wheel Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;"><span class="cls_cut"><?php echo substr('We provide complete restoration on wheels to curb rash, corrosion and small scratches. Our trained professionals take care of the wheels of your vehicle.', 0, 50);
echo '...'; ?>
                                     </span> <span class="new-price"> <br> <a class="button border"
                                             href="services.php">Know More</a></span></div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/trim-restoration.jpg"
                                         alt="Trim Restoration" />
                                 </div>

                             </div>


                             <div class="car-content"> <a href="services.php">Trim Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;"><span
                                         class="cls_cut"><?php echo substr('The trim restoration service is a combination of using high quality detailing products along with best quality machines and brushes to clean the interiors of your cars.', 0, 50) ?></span>
                                     <span class="new-price"><br> <a class="button border" href="services.php">Know
                                             More</a> </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/interior-restoration.jpg"
                                         alt="Interior Restoration" />
                                 </div>

                             </div>


                             <div class="car-content"> <a href="services.php">Interior Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;"><span
                                         class="cls_cut"><?php echo substr('The interior of a car is the most important part of the detailing process. A detailing is incomplete without restoring the interiors of the car.', 0, 50) ?></span>
                                     <span class="new-price"> <br> <a class="button border" href="services.php">Know
                                             More</a> </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="servicesImages">
                                     <img class="thevideo" src="images/services/chrome-restoration.jpg"
                                         alt="Chrome Restoration" />
                                 </div>
                             </div>


                             <div class="car-content">
                                 <a href="services.php">Chrome Restoration</a>

                                 <div class="separator"></div>

                                 <div class="price" style="height: 170px;"><span
                                         class="cls_cut"><?php echo substr('The team of our trained professionals pay attention to the chrome of your vehicle. With the help of our branded detailing products our team is able to restore the chrome parts by removing rust, fade, etc.', 0, 50) ?></span>
                                     <span class="new-price"> <br><a class="button border" href="services.php">Know
                                             More</a></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <hr class="gray" />
 <section class="testimonial-1 white-bg page page-section-ptb">
     <div class="container">
         <div class="row protectionMargin">
             <div class="col-lg-12 col-md-12">
                 <div class="section-title"><span>Our Kind Of Extreme</span>

                     <h3>Protection</h3>

                     <div class="separator"></div>
                 </div>
             </div>
         </div>

         <div class="row protectionMargin">
             <div class="col-lg-12 col-md-12">
                 <div class="owl-carousel-1">
                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/ultra9h-armour.jpg"
                                         alt="Ultra 9H Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content">
                                 <a href="services.php">Ultra 9H Armour</a>

                                 <div class="separator"></div>

                                 <div class="price"><span>
                                         <?php echo substr('Our 9H Nano Ceramic Armour Coating provides an ultimate gloss on your vehicle along with supreme protection and durability of upto 7 years according to the packages. The Super Hydrophobic and Anti-Graffiti effect combined mean the surface coated with 9H will stay cleaner for longer as dirt and grime will not stick to the surface and the super hydrophobic effect of the coating will cause water to bead up and roll of the surface with any dirt and grime, the hard ceramic film also offers superior protection from damaging contamination and harsh chemicals. Our 9H Nano Ceramic Armour Coating forms a permanent bond to the paint work and will not wash away or break down, it can only be removed by abrasion making it a highly durable protective coating to protect your paint work from damaging contaminants. The unique formulation of our coating has enabled it to be multi-layered which means the thickness of the coating can be increased with additional layers allowing a thicker/harder film that will increase its scratch resistance.', 0, 100);
echo '...'; ?>
                                     </span> <span class="new-price"> <br> <a class="button border"
                                             href="services.php">Know More</a> </span></div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/vision-armour.jpg"
                                         alt="Vision Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content">
                                 <a href="services.php">Vision Armour</a>
                                 <div class="separator"></div>
                                 <div class="price"><span>
                                         <?php echo substr('Our Vision Armour coating is specifically designed for glass with excellent durability of about 6 months without affecting the motion of the front wiper blades, the super hydrophobic effect of the coating means water will simply beads up creating an angle of 110° and run off the glass while you drive your car. An unprotected glass can be a hazard in the rain as water can stick on the glass and sheet over the windows decreasing visibility and become a safety hazard, by having our Vision Armour on all windows it will increase the visibility by repelling water and allowing it to bead up and roll straight off the glass, this will also keep the glass cleaner for longer as dirt and grime will never stick.', 0, 100);
echo '...'; ?></span>
                                     <span class="new-price"> <br><a class="button border" href="services.php">Know
                                             More</a> </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/leather-armour.jpg"
                                         alt="Leather Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content">
                                 <a href="services.php">Leather Armour</a>

                                 <div class="separator"></div>

                                 <div class="price"><span class="new-price"><?php echo substr('Our Leather Armour Coating is a true protective coating for all leather surfaces. Leather surfaces will stay cleaner for longer reducing dirt and grime from becoming ingrained in the leather substrate with a durability of 6 months. The Leather coating also features a super hydrophobic effect so that any liquid spills will simply bead up on the surface and can be easily wiped away without affected the leather substrate. The UV Resistance of the coating will help reduce the ageing of the leather from UV damage and keep the leather soft whilst still keeping the factory look and feel.', 0, 100);
echo '...'; ?></span>
                                     <span class="new-price"> <br> <a class="button border" href="services.php">Know
                                             More</a></span> </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/textile-armour.jpg"
                                         alt="Textile Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content">


                                 <a href="services.php">Textile Armour</a>

                                 <div class="separator"></div>

                                 <div class="price">
                                     <span><?php echo substr('Our Textile Armour Coating dramatically reduces the surface energy of textile or suede, so that when liquids come into contact with it, they form beads and simply roll off while keeping the textile substrate completely dry. This coating has a durability of about 6 months. It enables the fabric, suede and tissue surface to be free from the water/dust and all other liquids, without affecting the look or feel.', 0, 90);
echo '...'; ?></span>
                                     <span class="new-price"> <br> <a class="button border" href="services.php">Know
                                             More</a> </span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/wheel-armour.jpg"
                                         alt="Wheel Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content">
                                 <a href="services.php">Wheel Armour</a>

                                 <div class="separator"></div>

                                 <div class="price">
                                     <span><?php echo substr('Our Wheel Armour Coating is one of the best kind of protection for the wheels which dramatically improves the shine of the wheel and have durability of about 6 months. It enables the wheel surface to be free from the water/dust and all other liquids, without affecting the look or feel of the most loved part of your vehicle.', 0, 100);
echo '...'; ?></span>
                                     <span class="new-price"> <br> <a class="button border" href="services.php">Know
                                             More</a></span>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="car-item text-center">
                             <div class="car-image">
                                 <div class="protectionImages">
                                     <img class="thevideo" src="images/protection/plastic-armour.jpg"
                                         alt="Plastic Armour" />
                                 </div>

                             </div>

                             <div class="car-list">
                                 <ul class="list-inline">
                                     <li>2017</li>
                                     <li>Manual</li>
                                     <li>6,000 mi</li>
                                 </ul>
                             </div>

                             <div class="car-content"><a href="services.php">Plastic Armour</a>

                                 <div class="separator"></div>

                                 <div class="price">
                                     <span><?php echo substr(' Our Plastic Armour Coating is a unique coating for plastic and rubber surfaces, suitable for both interior and exterior use. Plastic and rubber surfaces coated with our coating will feature a super hydrophobic effect with excellent wear resistance and enhanced shine. The coating will add a moderate sheen to the substrate making it a great permanent dressing for both exterior and interior plastics whether they are new or need restoring.', 0, 100);
echo '...'; ?></span>

                                     <span class="new-price"> <br> <a class="button border" href="services.php">Know
                                             More</a></span>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--=================================
 testimonial -->
 <!--=================================
 footer -->

 <footer class="footer bg-2 bg-overlay-black-90">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12">
                 <div class="social">
                     <!-- <ul>
	<li><a class="facebook" href="services.php">facebook </a></li>
	<li><a class="twitter" href="services.php">twitter </a></li>
	<li><a class="pinterest" href="services.php">pinterest </a></li>
	<li><a class="dribbble" href="services.php">dribbble </a></li>
	<li><a class="google-plus" href="services.php">google plus </a></li>
	<li><a class="behance" href="services.php">behance </a></li>
</ul> -->
                     <br>
                 </div>
             </div>
         </div>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script type="text/javascript">
         //  $(window).on('load', function() {
         //      $('#offerModal').show();
         //  });

         //  $("#offerModal").click(function() {
         //      $("#offerModal").hide();
         //  });

         $(document).ready(function() {

             // 	if($(window).width() <= 580){

             // 	$( "video" ).remove();
             // }


             const bgv = $('#bgvid');

             if (bgv.is(':visible')) {
                 $('source', bgv).each(
                     function() {
                         const el = $(this);
                         el.attr('src', el.data('src'));
                     }
                 );

                 bgv[0].load();
             }

         });
         </script>
         <?php include 'footer.php';?>