<?php
use frontend\models\SinglePage;

$data = SinglePage::getDataByCustomSetting('one_middle_home');
$data_tree = SinglePage::getDataByCustomSetting('tree_middle_home');
?>
<!-- About section -->
<section class="about-section-three sp-tw grey-bg">
    <div class="container">
        <div class="sec-title centered">
            <a href="#" class="theme-btn"><?= $this->params['company']['name'] ?></a>
            <h1>Thiết kế chuyên nghiệp</h1>
        </div>
        <div class="row mb-50">
            <div class="col-lg-6">
                <div class="about-text-block ">
                    <div class="top-content">
                        <div class="inner-box">
                            <div class="icon"><span class="icon-chess"></span></div>
                            <div class="content-text">
                                <h4>Sáng tạo - Marketing </h4>
                                <h2><?= $data->name?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><?= $data->desc?></h4>
                        <div class="text">
                            <?= $data->content?>
                        </div>
                        <div class="author-info border-none">
                            <div class="inner-box">
                                <div class="image"><img src="images/resource/sign.png" alt=""></div>
                                <div class="author-content">
                                    <div class="name">Carl Aliaser</div>
                                    <div class="designation">Founder Partner</div>
                                </div>
                            </div>
                        </div>
                        <div class="year-of-service">Serve Since 1964</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-patent"></span></div>
                        <h4>Hdesign sự lựa chọn của bạn</h4>
                        <div class="text">We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms.</div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-passion"></span></div>
                        <h4>Hdesign uy tín & chuyên nghiệp</h4>
                        <div class="text">The same as saying through shrinking from toil and pain. perfectly simple and easy to distinguish.</div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-brain"></span></div>
                        <h4>Hdsign chất lượng & cam kết</h4>
                        <div class="text">Through shrinking from toil and pain. These cases are perfectly simple and easy to in untrammelled.</div>
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
    <div class="clearfix"></div>
</section>
