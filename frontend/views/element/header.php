<?php
use yii\bootstrap\Modal;
?>
<header class="main-header">

    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="outer-box clearfix">
                <!--Top Left-->
                <div class="top-left float-sm-left">
                    <ul class="topbar-info">
                        <li><a href="#"><i class="icon-pin"></i><?=  $this->params['company']->address ?></a></li>
                        <li><a target="_top" href="mailto:abc@example.com?subject = Feedback&body = Messag"><i class="icon-mail"></i><?=  $this->params['company']->email ?></a></li>
                    </ul>
                    <div class="social-links clearfix">
                        <a href="<?=  $this->params['company']->facebook ?>"><span class="fab fa-facebook-f"></span></a>
                        <a href="<?=  $this->params['company']->twitter ?>"><span class="fab fa-twitter"></span></a>
                        <a href="<?=  $this->params['company']->youtube ?>"><span class="fab fa-youtube"></span></a>
                    </div>
                </div>

                <!--Top Right-->
                <div class="top-right float-sm-right">
                    <div class="language-info">
                        <i class="icon-global"></i>
                        <ul>
                            <?php
                             $listLanguage = Yii::$app->params['listLanguage'];
                            $session = Yii::$app->session;
                            $language = $session->get('language');
                             foreach ($listLanguage as $key => $value) {
                                 $active = '';
                                 if($language == $key) {
                                     $active = 'active';
                                 }
                             ?>
                                <li><a class="<?= $active ?>" href="/site/change-language/<?= $key ?>"><?= $value['name'] ?></a></li>
                            <?php } ?>

                            <li>
                                <a href="/cart" class="wrapper-cart-mini">
                                   <?= Yii::$app->view->params['lang']->cart ?>  <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        <?php
                                        $cart = \Yii::$app->cart;
                                        if ( $cart->getTotalCount() > 0) {
                                        ?>
                                            <span class="count">
                                            <?= $cart->getTotalCount() ?>
                                            </span>
                                        <?php } ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="phone-info"><i class="icon-support"></i><a href="#">HOTLINE: </a> 0909 651 650</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Header upper -->
    <div class="header-upper">
        <div class="container clearfix">

            <div class="float-left logo-outer">
                <div class="logo"><a href="/"><img width="150px" src="/<?=  $this->params['company']->logo ?>" alt="" title=""></a></div>
            </div>

            <div class="float-right upper-right clearfix">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <?php echo $this->render("//element/menu"); ?>
                        </div>
                    </nav>

                    <!-- Main Menu End-->
                    <div class="menu-right-content">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <?php
                                            $modelProduct = new \frontend\models\Product();
                                            $urlAllProduct = $modelProduct->getUrlAll();
                                            ?>
                                            <form method="get" action="<?= $urlAllProduct ?>">
                                                <div class="form-group">
                                                    <input type="search" name="keyword" value="" placeholder="Từ khóa...." required="">
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="link-btn"><a href="#" class="theme-btn btn-style-two js__btn-advisory">Nhận Tư Vấn Miễn Phí</a></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    <a href="/" class="img-responsive"><img width="150px" src="/<?=  $this->params['company']->logo ?>" alt="" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-collapse collapse clearfix">
                            <?php echo $this->render("//element/menu"); ?>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>


        </div>
    </div>
    <!--End Sticky Header-->
</header>