<?php

use frontend\models\Banner;

$banner = Banner::getDataByCustomSetting('one_before_footer');

?>
<section id="6" class="kc-elm kc-css-998219 kc_row">
    <div class="kc-row-container  kc-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-824159 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" contact-form-section sp-two">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="contact-title">
                                        <h1>Hdesign <br><?= $banner->images->name ?></h1>
                                    </div>
                                    <div class="text">
                                        <?= $banner->images->desc ?>
                                    </div>
                                    <div class="author-box-two mb-30">
                                        <div class="author-image">
                                            <img src="<?= $banner->images->image ?>"
                                                    alt="Image"></div>
                                        <div class="author-info">
                                            <?= $banner->images->content ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-area">
                                        <div role="form" class="wpcf7" id="wpcf7-f568-p844-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response"></div>
                                           <?php echo $this->render("//element/form-contact"); ?>
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