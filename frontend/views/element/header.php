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
                                <li class="current dropdown"><a href="#">Home</a>
                                    <ul>
                                        <li><a href="index.html">Home Page 01</a></li>
                                        <li><a href="index-2.html">Home Page 02</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">About</a>
                                    <ul>
                                        <li><a href="about.html">About Company</a></li>
                                        <li><a href="clients.html">Our Clients</a></li>
                                        <li><a href="faq.html">FAQ’s</a></li>
                                        <li><a href="pricing.html">Pricing & Plans</a></li>
                                        <li><a href="testimonial.html">Testimonials</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="single-service.html">Advanced Anaytics</a></li>
                                        <li><a href="single-service-2.html">Chase Management</a></li>
                                        <li><a href="single-service-3.html">Corporate Finance</a></li>
                                        <li><a href="single-service-4.html">Customer Marketing</a></li>
                                        <li><a href="single-service-5.html">Information Technology</a></li>
                                        <li><a href="single-service-6.html">Pricate Equity</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Projects</a>
                                    <ul>
                                        <li><a href="project.html">Modern - 2 Columns</a></li>
                                        <li><a href="project-2.html">Modern - 3 Columns</a></li>
                                        <li><a href="project-3.html">Classic - 3 Columns</a></li>
                                        <li><a href="project-4.html">Classic - 4 Columns</a></li>
                                        <li><a href="project-fullwidth.html">Projects Fullwidth</a></li>
                                        <li><a href="project-masonry.html">Projects Masonry</a></li>
                                        <li><a href="project-details.html">Single Project</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog-grid-1.html">Blog Grid View 01</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid View 02</a></li>
                                        <li><a href="blog-large.html">Blog Large Image</a></li>
                                        <li><a href="blog-details.html">Blog Single Post</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="single-shop.html">Single Product</a></li>
                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="account.html">My Account</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>


        </div>
    </div>
    <!--End Sticky Header-->
</header>