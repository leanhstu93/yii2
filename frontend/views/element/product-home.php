<?php
use frontend\models\Product;
?>

<!--Portfolio Section-->
<section class="portfolio-section-two sp-one">
    <div class="container">
        <!-- Big Title -->
        <div class="welcome-title">
            <h3>thietkecuaban.com có hơn <span>200 mẫu thiết kế</span> <br> phù hợp với doanh nghiệp của bạn <br>với mẫu có sẵn</h3>
        </div>
        <div class="row">
            <?php
            $data = Product::find()->where(['active' => 1,'option' => Product::OPTION_HOME])->limit( 8)->all();

            foreach ($data as $item) {
                /**
                 * @var new Product() $item
                 */
            ?>
            <!-- case block two -->
            <div class="case-block-two col-lg-3 col-md-6">
                <div class="inner-box">
                    <div class="image">
                        <img src="<?= $item->image ?>" alt="">
                        <a href="<?= $item->getUrl() ?>" class="overlay-link"><img src="images/icons/link.png" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <div class="category">Business Services</div>
                        <h4><a href="project-details.html">Business Leadership <br>in RSA</a></h4>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- End -->
        </div>

    </div>
</section>
<!--End Portfolio section-->
