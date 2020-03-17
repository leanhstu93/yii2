<?php

use frontend\models\SinglePage;

echo $this->render("//element/page-title",['name' => 'Giới thiệu', 'bread' => $bread]);
$data = SinglePage::getDataByCustomSetting('one_middle_home');
$data_tree = SinglePage::getDataByCustomSetting('tree_middle_home');
?>

<div class="kc_clfw"></div>
<section data-kc-fullwidth="content" class="kc-elm kc-css-386362 kc_row ext_hm1">
    <div class="kc-row-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-992951 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" about-section-three sp-four grey-bg">
                        <div class="container">

                            <div class="sec-title centered">
                                <a href="#" class="theme-btn">HDESIGN</a>
                                <div class="title-section"><?= Yii::$app->view->params['lang']->professional_design ?> - Digital Marketing</div>
                            </div>

                            <div class="row mb-50">
                                <div class="col-lg-6">
                                    <div class="about-text-block ">
                                        <div class="top-content">
                                            <div class="inner-box">
                                                <div class="icon"><span class="icon-chess"></span></div>
                                                <div class="content-text">
                                                    <h4>Sáng tạo - Marketing
                                                    </h4>
                                                    <h2>Giải pháp thương hiệu
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <h4><?= $data->desc ?></h4>
                                            <div class="text"><?= $data->content ?>
                                            </div>
                                            <div class="author-info border-none">
                                                <div class="inner-box">
                                                    <div class="image"><img
                                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/sign-1.png"
                                                            alt="Image"></div>
                                                    <div class="author-content">
                                                        <div class="name">CEO – Hdesign</div>
                                                        <div class="designation">Founder Partner</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="year-of-service">SERVE SINCE 1964</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="icon"><span class="icon-patent"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->extend_2 ?></h4>
                                            <div class="text"><?= Yii::$app->view->params['lang']->extend_3 ?></div>
                                        </div>
                                    </div>
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="icon"><span class="icon-passion"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->extend_4 ?></h4>
                                            <div class="text"><?= Yii::$app->view->params['lang']->extend_5 ?></div>
                                        </div>
                                    </div>
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="icon"><span class="icon-brain"></span></div>
                                            <h4><?= Yii::$app->view->params['lang']->extend_6 ?></h4>
                                            <div class="text"><?= Yii::$app->view->params['lang']->extend_7 ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <?php
                                foreach ($data_tree as $item) {
                                    ?>
                                    <!-- Feature block -->
                                    <div class="feature-block-two col-lg-4">
                                        <div class="inner-box">
                                            <div class="image"><img src="<?= $item->image ?>" alt="<?= $item->name ?>">
                                                <div class="caption-title"><?= $item->name ?></div>
                                                <div class="overlay-content">
                                                    <div class="overlay-inner">
                                                        <div class="icon"><span class="icon-trust"></span></div>
                                                        <div class="text"><?= $item->desc ?></div>
                                                        <div class="shape-icon">M</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="kc-elm kc-css-892155 kc_row">
    <div class="kc-row-container  kc-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-413174 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" skills-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image">
                                        <img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/image-8.jpg"
                                            alt="Image">
                                        <div class="award">
                                            <div class="icon"><span class="icon-cup"></span></div>
                                            <h5>1st Place</h5>
                                            <div class="text">Best Consultant 2018
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="sec-title mb-30">
                                        <a href="#" class="theme-btn">HDESIGN</a>
                                        <div class="title-section">Lý do bạn chọn đến dịch vụ <br>Hdesign</div>
                                        <div class="text">Nor again is there anyone who loves or pursues or desires to
                                            obtain pain of itself, because it is pain but because occasionally
                                            circumstances occur pain can procure him some great pleasure.
                                        </div>
                                    </div>

                                    <!--Progress Levels-->
                                    <div class="progress-levels mb-30">


                                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms"
                                             data-wow-duration="1500ms">
                                            <h5>Là một thương hiệu của sáng tạo và giải pháp trực tuyến</h5>
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="75">
                                                            <div class="percent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms"
                                             data-wow-duration="1500ms">
                                            <h5>Những chuyên gia có chuyên môn và kinh nghiệm trong lĩnh vực marketing</h5>
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="86">
                                                            <div class="percent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="progress-box wow fadeInRight" data-wow-delay="100ms"
                                             data-wow-duration="1500ms">
                                            <h5>Đội ngũ copywriter, designer, photogapher chuyên nghiệp</h5>
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="68">
                                                            <div class="percent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End progress level -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-kc-fullwidth="content" class="kc-elm kc-css-888048 kc_row">
    <div class="kc-row-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-628022 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" video-section style-two"
                             style="background-image:url(http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/4-1.jpg)">
                        <div class="container">
                            <div class="video-content text-center">
                                <div class="default-video-box-two float-bob">
                                    <a href="#" class="overlay-link lightbox-image video-fancybox ripple"><span
                                            class="icon-multimedia"></span></a>
                                </div>
                                <h4>Hdesign</h4>
                                <div class="h1">Giải pháp thương hiệu marketing</div>
                            </div>
                        </div>
                        <div class="outer-box">
                            <div class="row">


                                <div class="success-block col-md-3">
                                    <div class="inner-box">
                                        <h4>Tư vấn giải pháp thiết kế</h4>
                                        <div class="icon">
                                            <span class="icon-contact"></span>
                                        </div>
                                        <div class="step">Bước 1</div>
                                        <div class="text"Tiếp nhận thông tin, triển khai thông tin, tư vấn giải pháp <br> Tổng hợp biên tập nội dung
                                        </div>
                                    </div>
                                </div>


                                <div class="success-block col-md-3">
                                    <div class="inner-box">
                                        <h4>Tổng hợp biên tập nội dung</h4>
                                        <div class="icon">
                                            <span class="icon-target"></span>
                                        </div>
                                        <div class="step">Bước 2</div>
                                        <div class="text">Tổng hợp nội dung và lên ý tưởng, triển khai giải pháp<br>
                                            Lên thiết kế

                                        </div>
                                    </div>
                                </div>


                                <div class="success-block col-md-3">
                                    <div class="inner-box">
                                        <h4>Lên thiết kế</h4>
                                        <div class="icon">
                                            <span class="icon-barrier"></span>
                                        </div>
                                        <div class="step">Bước 3</div>
                                        <div class="text">Tổng hợp và lên thiết kế, triển khai giải pháp cho thương hiệu
                                            chỉnh sữa hoàn thiện

                                        </div>
                                    </div>
                                </div>


                                <div class="success-block col-md-3">
                                    <div class="inner-box">
                                        <h4>Chĩnh sữa hoàn thiện</h4>
                                        <div class="icon">
                                            <span class="icon-goal"></span>
                                        </div>
                                        <div class="step">Bước 4</div>
                                        <div class="text">Gửi file và lấy thông tin chỉnh sửa, tư vấn thiết kế, hoàn thiện file
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="kc-elm kc-css-600244 kc_row">
    <div class="kc-row-container  kc-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-67338 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class="team-section-three sp-two">
                        <div class="container">

                            <div class="sec-title centered">
                                <a href="#" class="theme-btn">Thành viên</a>
                                <div class="title-section">Thành viên của Hdesign</div>
                            </div>

                            <div class="row">


                                <div class="team-block-one col-lg-4">
                                    <div class="inner-box">
                                        <div class="wrapper-box">
                                            <div class="image"><img width="370" height="330"
                                                                    src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-1.jpg"
                                                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                                    alt=""
                                                                    srcset="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-1.jpg 370w, http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-1-300x268.jpg 300w"
                                                                    sizes="(max-width: 370px) 100vw, 370px"/></div>
                                            <div class="lower-content">
                                                <h4><a href="">Mitchel Sweedon</a></h4>
                                                <div class="designation">CEO &amp; Founder</div>
                                                <div class="email"><a href="">smitchel@example.com</a></div>

                                                <ul class="social-icon-one">


                                                    <li><a href="#"><span class="fab fa fa-facebook"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-google-plus"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-linkedin"></span></a></li>


                                                </ul>

                                            </div>
                                            <div class="overlay-content">
                                                <div class="lower-content">
                                                    <h4><a href="">Mitchel Sweedon</a></h4>
                                                    <div class="designation">CEO &amp; Founder</div>
                                                    <div class="text">Nor again is there anyone loves or pursues or
                                                        desires to obtain pain some great pleasure.
                                                    </div>
                                                    <div class="email"><a href="">smitchel@example.com</a></div>

                                                    <ul class="social-icon-one">


                                                        <li><a href="#"><span class="fab fa fa-facebook"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                        <li><a href="#"><span class="fab fa fa-google-plus"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-linkedin"></span></a>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="team-block-one col-lg-4">
                                    <div class="inner-box">
                                        <div class="wrapper-box">
                                            <div class="image"><img width="370" height="330"
                                                                    src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-2.jpg"
                                                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                                    alt=""
                                                                    srcset="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-2.jpg 370w, http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-2-300x268.jpg 300w"
                                                                    sizes="(max-width: 370px) 100vw, 370px"/></div>
                                            <div class="lower-content">
                                                <h4><a href="">Andrea Wilson</a></h4>
                                                <div class="designation">Consultant</div>
                                                <div class="email"><a href="">wandrea@example.com</a></div>

                                                <ul class="social-icon-one">


                                                    <li><a href="#"><span class="fab fa fa-facebook"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-google-plus"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-linkedin"></span></a></li>


                                                </ul>

                                            </div>
                                            <div class="overlay-content">
                                                <div class="lower-content">
                                                    <h4><a href="">Andrea Wilson</a></h4>
                                                    <div class="designation">Consultant</div>
                                                    <div class="text">Nor again is there anyone loves or pursues or
                                                        desires to obtain pain some great pleasure.
                                                    </div>
                                                    <div class="email"><a href="">wandrea@example.com</a></div>

                                                    <ul class="social-icon-one">


                                                        <li><a href="#"><span class="fab fa fa-facebook"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                        <li><a href="#"><span class="fab fa fa-google-plus"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-linkedin"></span></a>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="team-block-one col-lg-4">
                                    <div class="inner-box">
                                        <div class="wrapper-box">
                                            <div class="image"><img width="370" height="330"
                                                                    src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-3.jpg"
                                                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                                    alt=""
                                                                    srcset="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-3.jpg 370w, http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/team-3-300x268.jpg 300w"
                                                                    sizes="(max-width: 370px) 100vw, 370px"/></div>
                                            <div class="lower-content">
                                                <h4><a href="">Dowency Melisa</a></h4>
                                                <div class="designation">Finance Head</div>
                                                <div class="email"><a href="">mdowency@example.com</a></div>

                                                <ul class="social-icon-one">


                                                    <li><a href="#"><span class="fab fa fa-facebook"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-google-plus"></span></a></li>


                                                    <li><a href="#"><span class="fab fa fa-linkedin"></span></a></li>


                                                </ul>

                                            </div>
                                            <div class="overlay-content">
                                                <div class="lower-content">
                                                    <h4><a href="">Dowency Melisa</a></h4>
                                                    <div class="designation">Finance Head</div>
                                                    <div class="text">Nor again is there anyone loves or pursues or
                                                        desires to obtain pain some great pleasure.
                                                    </div>
                                                    <div class="email"><a href="">mdowency@example.com</a></div>

                                                    <ul class="social-icon-one">


                                                        <li><a href="#"><span class="fab fa fa-facebook"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-twitter"></span></a></li>


                                                        <li><a href="#"><span class="fab fa fa-google-plus"></span></a>
                                                        </li>


                                                        <li><a href="#"><span class="fab fa fa-linkedin"></span></a>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
<section data-kc-fullwidth="content" class="kc-elm kc-css-67644 kc_row">
    <div class="kc-row-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-167042 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class="client-section-two grey-bg">
                        <div class="container">

                            <div class="sec-title ml-15">
                                <a href="#" class="theme-btn">KHÁCH HÀNG</a>
                                <div class="title-section">Khách hàng & đối tác - Hdesign</div>
                            </div>
                            <div class="four-item-carousel owl-carousel owl-theme owl-nav-style-two owl-dots-none">


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/11.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/12.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/13.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/14.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/11.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/12.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/13.png"
                                            alt="Image"></a></div>


                                <div class="image"><a href="#"><img
                                            src="http://seje.tonatheme.com/zuberia/wp-content/uploads/2019/02/14.png"
                                            alt="Image"></a></div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
