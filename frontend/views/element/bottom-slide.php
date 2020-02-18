<?php

use frontend\models\NewsCategory;
use frontend\models\ProductCategory;

$categories = ProductCategory::find()->where(['parent_id' => 0])->all();
if(!empty($categories)) {
?>
<section class="services-section sp-six grey-bg" style="background-image:url(images/background/shape-1.jpg)">
    <div class="container">
        <div class="row">
            <?php
            /**
             * @var NewsCategory $newsCate
             */
            foreach ($categories as $item) {
                $item->setTranslate();
            ?>
            <div class="col-lg-4">
                <div class="service-block">
                    <div class="inner-box">
                        <div class="top-content">
                            <h4><a href="<?= $item->getUrl() ?>"><?= $item->name ?></a></h4>
                            <div class="image">
                                <img src="<?= $item->image ?>" alt="">
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="text"><?= $item->desc ?></div>
                            <div class="link-btn">
                                <a href="<?= $item->getUrl() ?>"><span class="icon-arrow"></span></a>
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