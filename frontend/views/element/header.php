<header class="main-header">

    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="outer-box clearfix">
                <!--Top Left-->
                <div class="top-left float-sm-left">
                    <ul class="topbar-info">
                        <li><a href="#"><i class="icon-pin"></i><?=  $this->params['company']->address ?></a></li>
                        <li><a href="#"><i class="icon-mail"></i><?=  $this->params['company']->email ?></a></li>
                    </ul>
                    <div class="social-links clearfix">
                        <a href="<?=  $this->params['company']->facebook ?>"><span class="fab fa-facebook-f"></span></a>
                        <a href="<?=  $this->params['company']->twitter ?>"><span class="fab fa-twitter"></span></a>
                        <a href="<?=  $this->params['company']->youtube ?>"><span class="icon fa-youtube"></span></a>
                    </div>
                </div>

                <!--Top Right-->
                <div class="top-right float-sm-right">
                    <div class="language-info">
                        <i class="icon-global"></i>
                        <ul>
                            <li>VN</li>
                            <li>EN</li>
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
                <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
            </div>

            <div class="float-right upper-right clearfix">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <?php echo $this->render("//element/menu"); ?>
                    <!-- Main Menu End-->
                    <div class="menu-right-content">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search...." required="">
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="link-btn"><a href="#" class="theme-btn btn-style-two">Nhận Tư Vấn Miễn Phí</a></div>
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
                    <a href="index.html" class="img-responsive"><img src="images/logo.png" alt="" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <?php
                                foreach ($this->params['menu'] as $item) {
                                    ?>
                                    <li class=" current dropdown">
                                        <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
                                        <?php
                                        if (!empty($item['sub_menu'])) { ?>
                                            <ul>
                                                <?php foreach ($item['sub_menu'] as $item1) { ?>
                                                    <li>
                                                        <a href="<?= $item1['link'] ?>"><?= $item1['name'] ?></a>
                                                        <?php
                                                        if (!empty($item1['sub_menu'])) { ?>
                                                            <ul>
                                                                <?php foreach ($item1['sub_menu'] as $item2) { ?>
                                                                    <li>
                                                                        <a href="<?= $item2['link'] ?>"><?= $item2['name'] ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>


        </div>
    </div>
    <!--End Sticky Header-->
</header>