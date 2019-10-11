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
                                        <h1><?= $banner->images->name ?></h1>
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
                                            <form action="/admin/form/create" method="post"
                                                  class="wpcf7-form">
                                                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                                                <div class="contact-form style-three">
                                                    <div class="row clearfix">
                                                        <div class="col-md-12 column">
                                                            <div class="form-group">
                                                                <span class="fas fa-user"></span>
                                                                <input type="text"
                                                                       name="Form[name]"
                                                                       class="form-control"
                                                                       value=""
                                                                       placeholder="Họ và tên"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 column">
                                                            <div class="form-group"><span
                                                                        class="fas fa-envelope"></span><input
                                                                        type="email" name="Form[email]"
                                                                        class="form-control required email" value=""
                                                                        placeholder="Email" required></div>
                                                        </div>
                                                        <div class="col-md-12 column">
                                                            <div class="form-group"><span
                                                                        class="fas fa-phone"></span>
                                                                <input  type="text" name="Form[phone]"
                                                                        class="form-control" value=""
                                                                        placeholder="Điện thoại" required></div>
                                                        </div>
                                                        <div class="col-md-12 column">
                                                            <div class="form-group"><span class="fas fa-comment"></span><textarea
                                                                        name="Form[content]"
                                                                        class="form-control textarea required"
                                                                        placeholder="Lời nhắn"></textarea></div>
                                                        </div>
                                                    </div>
                                                    <div class="contact-section-btn">
                                                        <div class="form-group style-two text-center"><input
                                                                    id="form_botcheck" name="form_botcheck"
                                                                    class="form-control" type="hidden" value="">
                                                            <button class="theme-btn btn-style-one w-100" type="submit"
                                                                    data-loading-text="Please wait...">Gửi chúng tôi
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                            </form>
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