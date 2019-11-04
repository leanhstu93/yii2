<?php

use frontend\models\Banner;
use frontend\models\SinglePage;
?>
<!-- Main footer -->
<footer class="main-footer">
    <div class="container">

        <!--Widgets wrapper-->
        <div class="widgets-wrapper">
            <div class="row clearfix">
                <!--Footer Column-->
                <div class="footer-column links-widget col-lg-4">
                    <h4 class="widget-title">Liên Kết</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <?php
                                $data = SinglePage::getDataByCustomSetting('footer_list_col_link_1');
                                foreach ($data as $item) {
                                ?>
                                <li>
                                    <a href="<?= $item->getUrl() ?>"><?= $item->name ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <ul>
                                <?php
                                $data = SinglePage::getDataByCustomSetting('footer_list_col_link_2');
                                foreach ($data as $item) {
                                    ?>
                                    <li>
                                        <a href="<?= $item->getUrl() ?>"><?= $item->name ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div>
                <!--Footer Column-->
                <div class="footer-column gallery-widget col-lg-4">
                    <h4 class="widget-title">Hình ảnh dự án</h4>
                    <div class="inner-box">
                        <div class="gallery-wrapper">
                            <?php
                            $data  = Banner::getDataByCustomSetting('list_customer');
                            foreach ($data->images as $image) {
                            ?>
                            <div class="image">
                                <img src="<?= $image->image ?>" alt="<?= $image->name ?>" />
                                <div class="overlay-link"><a href="<?= $image->link ?>"><span class="fa fa-link"></span></a></div>
                            </div>
                            <?php } ?>
                        </div><!-- /.gallery-wrapper -->
                    </div><!-- /.inner-box -->
                </div>
                <!--Footer Column-->
                <div class="footer-column contact-widget col-lg-4">
                    <div class="title">Hỗ Trợ 24/7</div>
                    <h3>0909 651 650</h3>
                    <ul>
                        <li>528 Huỳnh Tấn Phát, P. Bình Thuận, Q.7 <br />Hồ Chí Minh</li>
                        <li>thietkecuaban.com@gmail.com</li>
                        <li>Thứ 2 - Chủ Nhật: 7:30 am to 21pm, <span class="theme-color"> Hàng Ngày</span></li>
                    </ul>
                    <div class="link-btn"><a href="#" class="theme-btn"><span class="icon-arrow"></span>Gửi Liên Hệ</a></div>
                </div>
                <!-- End column -->
            </div>
        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="container">
            <div class="container-wrapper">
                <?php
                $banner = Banner::getDataByCustomSetting('one_banner_logo_footer');
                ?>
                <div class="logo"><a href="/"><img src="/<?=  $banner->images->image ?>" width="50px" alt=""></a></div>
                <div class="copyright-text">
                    Copyright © 2012-2019 @ <a href="#">thietkecuaban.com</a>
                </div>
                <ul>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Quy Trình Làm Việc</a></li>
                    <li><a href="#">Hỏi Đáp</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>