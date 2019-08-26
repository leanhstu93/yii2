<?php

use frontend\models\ConfigPage;

$pageProduct = ConfigPage::find()->where(['id' => ConfigPage::TYPE_PRODUCT])->one()
?>
<!-- Services section -->
<section class="services-section-two sp-two grey-bg" style="background-image:url(<?= $pageProduct->getImageDecode() ?>)">
    <div class="container">
        <div class="sec-title centered">
            <a href="#" class="theme-btn">Our Services</a>
            <h1>Industries Served</h1>
            <div class="text">We denounce with righteous indignation and dislike men who are so beguiled.</div>
        </div>
        <div class="row">
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-1.png" alt=""></div>
                    <h4>Banking & <br>Capital Markets</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-2.png" alt=""></div>
                    <h4>Finance & <br>Insurance Markets</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-3.png" alt=""></div>
                    <h4>Life Science & <br>Health Care Provider</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-4.png" alt=""></div>
                    <h4>Retail & <br>Transporation</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-5.png" alt=""></div>
                    <h4>Justice & <br>Defence Security</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="images/icons/icon-6.png" alt=""></div>
                    <h4>Energy, Resources <br>Industrial</h4>
                    <div class="text">Power of choice is untrammelled and when nothing prevent our being able to do what we like best.</div>
                    <div class="link-btn"><a href="single-service.html"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
