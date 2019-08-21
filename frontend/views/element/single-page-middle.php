<?php
use frontend\models\SinglePage;

$data = SinglePage::getDataByCustomSetting('one_middle_home');

?>
<!-- About section -->
<section class="about-section sp-two">
    <div class="container">
        <div class="sec-title centered">
            <a href="#" class="theme-btn">Nhận Tư Vấn Miễn Phí</a>
            <h1>Thiết Kế Của Bạn</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text-block ">
                    <div class="top-content">
                        <div class="inner-box">
                            <div class="icon"><span class="icon-chess"></span></div>
                            <div class="content-text">
                                <h4><?= $data->desc?></h4>
                                <h2><?= $data->name ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="author-info">
                            <div class="inner-box">
                                <div class="image"><img src="images/resource/sign.png" alt=""></div>
                                <div class="author-content">
                                    <?= $data->content ?>
                                </div>
                            </div>
                        </div>
                        <div class="link-btn">
                            <a href="<?= $data->getUrl() ?>" class="theme-btn">Xem Thêm</a>
                        </div>
                        <div class="year-of-service">Thành Lập Từ 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image img-100 mb-30"><img src="images/resource/image-4.jpg" alt=""></div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-image-box">
                            <div class="image">
                                <img src="images/resource/image-5.jpg" alt="">
                                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="overlay-link lightbox-image video-fancybox"><span class="icon-play"></span></a>
                            </div>
                        </div>
                        <div class="link-btn more-gallery-btn mb-30" style="background-image:url(images/resource/image-6.jpg)"><a href="#" class="theme-btn">More From Gallery</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
