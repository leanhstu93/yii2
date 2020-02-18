<?php
use frontend\models\Banner;
?>
<section class="main-slider">
    <div class="main-slider-carousel owl-carousel owl-theme">
        <?php
        $slide = Banner::getDataByCustomSetting('slide');
        foreach ($slide->images as $slide) {
            $slide->setTranslate();
        ?>
        <div class="slide" style="background-image:url(<?= $slide->image ?>)">
            <div class="container">
                <div class="content text-center">
                    <h4><?= $slide->desc ?></h4>
                    <div class="title-slide"><?= $slide->name ?></div>
                    <div class="text">
                    </div>
                    <div class="link-box">
                        <a href="<?= $slide->link ?>" class="theme-btn btn-style-three">Xem tiếp </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>