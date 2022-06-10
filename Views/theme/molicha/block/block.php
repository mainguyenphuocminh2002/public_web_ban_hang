<?php

namespace Views\theme\molicha\block;

use Application;
use Model\Common;
use Module\GiaoDien\Controller\slider;
use Module\GiaoDien\Controller\widget;
use Module\GiaoDien\Model\Branch\BranchService;
use Module\GiaoDien\Model\Menu\menu;
use Module\GiaoDien\Model\Pages\pagesService;
use Module\GiaoDien\Model\Slider\sliderservice;
use Module\GiaoDien\Model\Widget\widgetService;
use Module\SanPham\Model\categoryDetail;
use Module\SanPham\Model\productCategoryDetail;
use Module\SanPham\Model\sanpham;

class block
{
    public function __construct()
    {
        # code...
    }

    public static function head()
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="public/molicha/css/bootstrap.min.css">
            <link rel="stylesheet" href="public/molicha/css/animate.css">
            <link rel="stylesheet" href="public/molicha/css/owl.carousel.min.css">
            <link rel="stylesheet" href="public/molicha/css/owl.theme.default.min.css">

            <link rel="stylesheet" href="public/molicha/css/aos.css">

            <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

            <link rel="stylesheet" href="public/molicha/css/bootstrap-datepicker.css">
            <link rel="stylesheet" href="public/molicha/css/jquery.timepicker.css">


            <link rel="stylesheet" href="public/molicha/css/flaticon.css">
            <link rel="stylesheet" href="public/molicha/css/icomoon.css">
            <link rel="stylesheet" href="public/molicha/css/molicha.css">
            <title>Home</title>
        </head>

    <?php
    }
    public static function js()
    {
        # code...
    ?>
        <script src="public/molicha/js/jquery.min.js"></script>
        <script src="public/molicha/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="public/molicha/js/bootstrap.min.js"></script>
        <script src="public/molicha/js/jquery.waypoints.min.js"></script>
        <script src="public/molicha/js/jquery.stellar.min.js"></script>
        <script src="public/molicha/js/owl.carousel.min.js"></script>
        <script src="public/molicha/js/jquery.magnific-popup.min.js"></script>
        <script src="public/molicha/js/aos.js"></script>
        <script src="public/molicha/js/jquery.animateNumber.min.js"></script>
        <script src="public/molicha/js/bootstrap-datepicker.js"></script>
        <script src="public/molicha/js/jquery.timepicker.min.js"></script>
        <script src="public/molicha/js/scrollax.min.js"></script>
        <script src="public/molicha/mine-config.js"></script>
    <?php
    }
    public static function nav()
    {
        # code...
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a href="<?php echo URL ?>" class="navbar-brand">Molicha</a>
                <div class="collpase navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <div class="d-flex align-items-center">
                            <?php
                            $menu = new menu();
                            $item = $menu->GetItemsByGroupsParent('MainMenu', '');
                            foreach ($item as $val) {
                            ?>

                                <li class="nav-item <?php echo ($val->stt == 0) ? 'active' : '' ?> nav-link"><a href="<?=URL . $val->link; ?>" class="nav-link"><?= $val->name; ?></a></li>
                            <?php
                            }
                            if (isset($_SESSION[QuanLy]) && !empty($_SESSION[QuanLy])) {
                            } else {

                            ?>
                                <li class="nav-item <?php echo ($val->stt == 0) ? 'active' : '' ?> nav-link"><a href="<?php echo URL ?>/login" class="nav-link">Đăng Nhập</a></li>
                            <?php
                            }
                            if (isset($_SESSION[QuanLy])) {
                            ?>
                                <li class="nav-item <?php echo ($val->stt == 0) ? 'active' : '' ?> nav-link">
                                    <a href="#" class="dropdown-toggle nav-item nav-link" style="padding-left:.5rem;padding-right: .5rem;" data-toggle="dropdown">
                                        <span class="user-img">
                                            <img style="width: 40px;height: 40px; border-radius: 50%;" src="<?php echo isset($_SESSION[QuanLy]->image) ? $_SESSION[QuanLy]->image : URL . 'public/molicha/images/avatar-profile.png'; ?>" alt="" />
                                            <span class="status online"></span>
                                        </span>

                                    </a>
                                    <div class="dropdown-menu " style="top: 90%;right: 10%;left: unset;">
                                        <a class="dropdown-item" href="<?php echo URL ?>Profile/UserProfile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-1">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            Profile</a>
                                        <a class="dropdown-item" href="<?= URL ?>CheckLogin/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out mr-1">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            Logout</a>
                                    </div>
                        </div>

                        </li>

                    <?php
                            }
                    ?>
                    </ul>
                </div>
            </div>

        </nav>
        <?php
    }
    // Slider
    
    public static function slider()
    {
        if (self::IsHome() == false) {
            return;
        }
        $Item = sliderservice::GetByGroup('HomeSlide');
        if($Item){

        ?>
        <?php 
        foreach ($Item as $val) {
            $sliderData = new sliderservice($val);
            if($sliderData->is_public !== 0){
        
        ?>
            <section class="home-slider owl-carousel js-fullheight">
                <div class="slider-item js-fullheight" style="background-image: url(<?= $sliderData->image ?>)">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

                            <div class="col-md-12 col-sm-12 text-center ftco-animate">
                                <?= Common::HTMLdecode($sliderData->content); ?>
                            </div>

                        </div>
                    </div>
                </div>
              
            </section>
            <!-- slider  section end  -->
            
            <?php
        }
        }
        }
    }
    public static function widget()
    {
        # code...
        ?>
        <!-- featured section starts  -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="featured">
                            <div class="row">
                                <?php
                                $widget = new widgetService();
                                $item = $widget->GetItemsByGroups('MainMenu');
                                foreach ($item as $val) {
                                    $_item = new widgetService($val);
                                ?>
                                    <a href="<?php echo URL . 'danhmuc/' . $_item->link . '.html' ?>" class="col-md-3">
                                        <div class="featured-menus ftco-animate">
                                            <div class="menu-img img" style="background-image: url(<?php echo $_item->image ?>);"></div>
                                            <div class="text text-center">
                                                <h3><?= $_item->name; ?></h3>
                                                <p>
                                                    <?php
                                                    echo Common::HTMLdecode($_item->des);
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- featured section ends  -->
    <?php
    }
    public static function aboutUs()
    {
        $pages = new pagesService();
        $item = $pages->GetByAlias('short-aboutUs');
    ?>
        <section class="ftco-wrap-about" id="about">
            <div class="intro">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="intro_content">
                                <div class="intro_title">
                                    <h2><?= $item->title; ?></h2>
                                </div>
                                <div class="intro_text">
                                    <p><?= Common::HTMLdecode($item->content); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 intro_col">
                                    <div class="intro_image "><img class='img-fluid' style="width: 100%;height: 100%;" src="<?php echo $item->images ?>" alt="intro"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    public static function menu()
    {
        # code...
    ?>
        <section class="ftco-section" id="menu">
            <div class="container-fluid px-4">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <span class="subheading">Best Seller</span>
                        <h2 class="mb-4">Menu</h2>
                    </div>
                </div>

                <div class="row">
                        <?php

                                $sp = new sanpham();
                                $data = $sp->GetBestSeller();
                                foreach($data as $val){
                                $sp = new sanpham($val);
                        ?>
                    <div class="col-md-6 col-lg-4 menu-wrap">
                                    <div class="menus d-flex ftco-animate">
                                        <div class="menu-img img" style="background-image: url(<?php echo $sp->image; ?>);"></div>
                                        <div class="text">
                                            <div class="d-flex">
                                                <div class="one-half">
                                                    <h3><?php echo $sp->name ?></h3>
                                                </div>
                                                <div class="one-forth">
                                                    <?php 
                                                    ?>
                                                    <span class="price"><?php echo $sp->price ."VND" ?></span>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                    </div> 
                        <?php
    }
                        ?>
                </div>
            </div>
        </section>
        <!-- menu section ends -->
    <?php
    }
    public static function review()
    {
        # code...
    ?>
        <!-- testimonial section starts -->
        <section class="ftco-section testimony-section img" id="testimonial" style="background-image: url(<?php echo URL; ?>public/molicha/images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <span class="subheading">Testimonials</span>
                        <h2 class="mb-3">Review</h2>
                    </div>
                </div>
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-quote-left"></span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa illo corrupti
                                            ratione voluptatibus recusandae dolore.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);"></div>
                                            <div class="pl-3">
                                                <p class="name">Nilay Hirpara</p>
                                                <span class="position">Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-quote-left"></span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa illo corrupti
                                            ratione voluptatibus recusandae dolore.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);"></div>
                                            <div class="pl-3">
                                                <p class="name">Nilay Hirpara</p>
                                                <span class="position">Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-quote-left"></span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa illo corrupti
                                            ratione voluptatibus recusandae dolore.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);"></div>
                                            <div class="pl-3">
                                                <p class="name">Nilay Hirpara</p>
                                                <span class="position">Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-quote-left"></span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa illo corrupti
                                            ratione voluptatibus recusandae dolore.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);"></div>
                                            <div class="pl-3">
                                                <p class="name">Nilay Hirpara</p>
                                                <span class="position">Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-quote-left"></span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa illo corrupti
                                            ratione voluptatibus recusandae dolore.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);"></div>
                                            <div class="pl-3">
                                                <p class="name">Nilay Hirpara</p>
                                                <span class="position">Owner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- testimonial section ends -->
    <?php

    }
    public static function chiNhanh()
    {
        # code...
    ?>
        <section class="ftco-section" id="chef">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-12 text-center heading-section ftco-animate">
                        <span class="subheading">Branch</span>
                        <h2 class="mb-4">In Bien Hoa City</h2>
                    </div>
                </div>
                <div class="row">
                        <?php
                        $branch = new BranchService();
                        $item = $branch->GetItemsByGroups('MainMenu');
                        foreach ($item as $val) {
                        ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="staff">
                                <div class="img" style="background-image: url(<?php echo $val->image ?>);"></div>
                                <div class="text pt-4">
                                    <h3><?= $val->name; ?></h3>
                                    <span class="position mb-2"><?= $val->address ?></span>
                                </div>
                            </div>
                    </div>
                <?php
                        }
                ?>
                </div>
            </div>
        </section>
        <!-- staff section --- chef ends -->

    <?php
    }
    public static function dangKy()
    {
        # code...
    ?>
        <section class="ftco-section img" id="order" style="background-image: url(<?php echo URL; ?>public/molicha/images/molicha.jpg);" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                        <div class="heading-section ftco-animate mb-5 text-center">
                            <span class="subheading">Order</span>
                            <h2 class="mb-4">Member</h2>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" placeholder="yourmail@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" placeholder="ABCXYZ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="text" class="form-control" placeholder="+84......">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Your birthday</label>
                                        <input type="text" class="form-control" id="book_date" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Creation time</label>
                                        <input type="text" class="form-control" id="book_time" placeholder="Time">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Card type</label>
                                        <div class="select-wrap one-third">
                                            <div class="icon"><span class="ios-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Custom</option>
                                                <option value="">Molicha normal</option>
                                                <option value="">Molicha silver</option>
                                                <option value="">Molicha gold</option>
                                                <option value="">Molicha platinum</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <div class="select-wrap one-third">
                                            <div class="icon"><span class="ios-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Custom</option>
                                                <option value="">Man</option>
                                                <option value="">Woman</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group text-center">
                                        <input type="submit" value="Register Here" class="btn btn-primary py-3 px-5">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    public static function footer()
    {
        # code...
    ?>
        <section class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Beleniss</h2>
                            <p>We serve and take all type of cake orders. You can personalised cake of your own choice. We
                                have the best chef in the city working for us and happying serving to you.
                                <br><br><br>
                                Belenisscake@gmail.com
                                <br>
                                8888888888
                            </p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Open Hours</h2>
                            <ul class="list-unstyled open-hours">
                                <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
                                <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
                                <li class="d-flex"><span>Sunday</span><span> 9:00 - 02:00</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Instagram</h2>
                            <div class="thumb d-sm-flex">
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);"></a>
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);"></a>
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);"></a>
                            </div>
                            <div class="thumb d-sm-flex">
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);"></a>
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);"></a>
                                <a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Newsletter</h2>
                            <p>To get cake catalogue every month by subscribing below.</p>
                            <form action="#" class="subscribe-form">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2 text-center" placeholder="johndoe@gmail.com">
                                    <input type="submit" value="Subscribe" class="form-control submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
?>