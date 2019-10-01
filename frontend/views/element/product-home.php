<?php
use frontend\models\Product;
use frontend\models\ProductCategory;

?>

<!--Case Section-->
<section class="case-section">
    <div class="container">
        <div class="row m-0 justify-content-md-between align-items-center">
            <div class="sec-title">
                <a href="#" class="theme-btn">Góc Chia Sẽ</a>
                <h1>Chia sẽ kiến thức miễn phí</h1>
            </div>
            <div class="link-btn ml-15 mb-30"><a href="#" class="theme-btn btn-style-eleven">More From Projects</a></div>
        </div>

        <div class="outer-container">

            <!--Case Tabs-->
            <div class="cases-tab">

                <div class="tab-btns-box">
                    <!--Tabs Header-->
                    <div class="tabs-header">
                        <ul class="cases-tab-btns clearfix">
                            <li class="p-tab-btn active-btn" data-tab="#p-tab-all"> Tất cả  </li>
                            <?php
                            $productCategory = ProductCategory::find()->where(['active' => 1 ])->all();

                            foreach ($productCategory as $item) {
                            ?>
                            <li class="p-tab-btn" data-tab="#p-tab-<?= $item->id ?>"><?= $item->name ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!--Tabs Content-->
                <div class="p-tabs-content">
                    <!--Portfolio Tab / Active Tab-->
                    <div class="p-tab active-tab" id="p-tab-all">
                        <div class="cases-carousel owl-theme owl-carousel">
                            <?php
                            $data = Product::find()->where(['active' => 1,'option' => Product::OPTION_HOME])->all();
                            foreach ($data as $item) {
                            ?>
                            <!--Case Block-->
                            <div class="case-block">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="<?= $item->image ?>" alt="" />
                                        <a class="img-opener" href="<?= $item->getUrl() ?>" data-fancybox="gallery"></a>
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="category-title"><?= $item->name ?></div>
                                                <h2><a href="<?= $item->getUrl() ?>"><?= $item->desc ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                    <?php
                    foreach ($productCategory as $item) {
                    ?>
                    <!--Portfolio Tab-->
                    <div class="p-tab" id="p-tab-2">
                        <div class="cases-carousel owl-theme owl-carousel">
                            <?php
                            $products = Product::find()->where(['active' => 1,'option' => Product::OPTION_HOME])->all();
                            foreach ($products as $product) {
                            ?>
                            <!--Case Block-->
                            <div class="case-block">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="<?= $product->image ?>" alt="<?= $product->name ?>" />
                                        <a class="img-opener" href="<?= $product->getUrl() ?>" data-fancybox="gallery"></a>
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="category-title"><?= $product->name ?></div>
                                                <h2><a href="<?= $product->getUrl() ?>"><?= $product->desc ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</section>
<!--End Case section-->
