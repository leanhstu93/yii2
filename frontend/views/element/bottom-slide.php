<?php

use frontend\models\NewsCategory;

$listCate = NewsCategory::find()->where(['active' => 1, 'option' => NewsCategory::OPTION_HOME])->limit(6)->all();
if(!empty($listCate)) {
?>
<section class="services-section sp-six grey-bg" style="background-image:url(images/background/shape-1.jpg)">
    <div class="container">
        <div class="row">
            <?php
            /**
             * @var NewsCategory $newsCate
             */
            foreach ($listCate as $newsCate) {
            ?>
            <div class="col-lg-4">
                <div class="service-block">
                    <div class="inner-box">
                        <div class="top-content">
                            <h4><a href="single-service.html"><?= $newsCate->name ?></a></h4>
                            <div class="image">
                                <img src="<?= $newsCate->image ?>" alt="">
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="text"><?= $newsCate->desc ?></div>
                            <div class="link-btn">
                                <a href="<?= $newsCate->getUrl() ?>"><span class="icon-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>