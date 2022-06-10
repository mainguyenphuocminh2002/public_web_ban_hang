<?php

namespace Views\theme\molicha\block;

use Model\Common;
use Module\Cart\Model\giohang;
use Module\SanPham\Model\sanpham;
use Module\GiaoDien\Model\Menu\menu;
use Module\GiaoDien\Model\Pages\pagesService;
use Module\GiaoDien\Model\Slider\sliderservice;
use Module\GiaoDien\Model\Branch\BranchService;

class block1
{
	public function __construct()
	{
		# code...
	}

	public static function head()
	{
		# code...
?>

		<head>
			<title>Home</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!--===============================================================================================-->
			<link rel="icon" type="image/png" href="/public/molicha/images/icons/favicon.png" />
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/bootstrap/css/bootstrap.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/fonts/linearicons-v1.0.0/icon-font.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/animate/animate.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/css-hamburgers/hamburgers.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/animsition/css/animsition.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/select2/select2.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/daterangepicker/daterangepicker.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/slick/slick.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/lightbox2/css/lightbox.min.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/perfect-scrollbar/perfect-scrollbar.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/revolution/css/layers.css">
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/revolution/css/navigation.css">
			<link rel="stylesheet" type="text/css" href="/public/molicha/vendor/revolution/css/settings.css">
			<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="/public/molicha/css/util.css">
			<link rel="stylesheet" type="text/css" href="/public/molicha/css/main.css">
			<link rel="stylesheet" href="/public/molicha/css/molicha.css">
			<script src="/public/molicha/vendor/jquery/jquery-3.2.1.min.js"></script>

			<!--===============================================================================================-->
		</head>
	<?php
	}
	public static function js()
	{
	?>
		<!--===============================================================================================-->
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/bootstrap/js/popper.js"></script>
		<script src="/public/molicha/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.video.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script>
		<script src="/public/molicha/vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
		<script src="/public/molicha/js/revo-custom.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/daterangepicker/moment.min.js"></script>
		<script src="/public/molicha/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/slick/slick.min.js"></script>
		<script src="/public/molicha/js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/parallax100/parallax100.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/lightbox2/js/lightbox.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/isotope/isotope.pkgd.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/sweetalert/sweetalert.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<!--===============================================================================================-->
		<script src="/public/molicha/js/main.js"></script>
		<script src="/public/molicha/js/mine-config.js"></script>
		<script src="/public/molicha/cart.js"></script>
		<script src="/public/molicha/mine-config.js"></script>
	<?php
	}



	public static function header()
	{
		# code...
	?>
		<header>
			<!-- Header desktop -->
			<div class="container-menu-desktop">
				<div class="wrap-menu-desktop">
					<nav class="limiter-menu-desktop">
						<div class="left-header">
							<!-- Logo desktop -->
							<div class="logo">
								<a href="<?php echo URL ?>"><img src="<?php echo URL ?>public/molicha/images/icons/logo-01.png" alt="IMG-LOGO"></a>
							</div>
						</div>

						<div class="center-header">
							<!-- Menu desktop -->
							<div class="menu-desktop">
								<ul class="main-menu">
									<?php
									$menu = new menu();
									$dataMenu = $menu->GetItemsByGroupsParent('MainMenu', '');
									foreach ($dataMenu as $menuItem) {
									?>
										<li style="color: #000;" class="nav-item <?php echo ($menuItem->stt == 0) ? 'active' : '' ?> nav-link"><a href="<?= URL .  $menuItem->link; ?>" class="nav-link"><?= $menuItem->name; ?></a></li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>

						<div class="right-header">
							<!-- Icon header -->
							<div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">

								<div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
									<div class="icon-header-item flex-c-m trans-04 icon-header-noti" data-notify="2">
										<img src="<?php echo URL ?>public/molicha/images/icons/icon-cart-2.png" alt="CART">
									</div>
									<div id="BoxCart" class="cart-header menu-click-child trans-04">
										<?php
										$prices = 0;
										$giohang = new giohang();
										$dataGioHang = $giohang->GetByUserId($_SESSION[QuanLy]->id);
										foreach ($dataGioHang as $val) {
											$giohang = new giohang($val);
										?>
											<div data-cartid="<?php echo $giohang->id ?>" class="bo-b-1 bocl15">
												<div class="size-h-2 js-pscroll m-r--15 p-r-15">
													<!-- cart header item -->
													<div class="flex-w flex-str m-b-25">
														<div class="size-w-15 flex-w flex-t">
															<?php
															$sp = new sanpham($val->product_id);
															if ($sp->is_show !== 0) {
																$prices += $val->number * $sp->price;
															?>
																<a href="<?php echo URL ?>sanphamchitiet/<?php echo $sp->name ?>.html" class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
																	<div class="img-responsive">
																		<img style="width: 100%;height: 100%;" src="<?php echo $sp->image ?>" alt="<?php echo $sp->name ?>">
																	</div>
																</a>

																<div class="size-w-17 flex-col-l">
																	<a href="<?php echo URL ?>sanphamchitiet/<?php echo $sp->name ?>.html" class="txt-s-108 cl3 hov-cl10 trans-04">
																		<?php echo $sp->name ?>
																	</a>

																	<span class="txt-s-101 cl9">
																		<?php echo Common::PriceToVnd($sp->price) ?>
																	</span>

																	<span class="txt-s-109 cl12">
																		X<?php
																			$giohang = new giohang($val);
																			echo $giohang->number;
																			?>
																	</span>
																</div>
														</div>

														<!-- cart header item -->

													</div>
												</div>
										<?php
															}
														}
										?>

										<div class="flex-w flex-sb-m p-b-31">
											<span class="txt-m-103 cl3 p-r-20">
												Tổng Tiền:
											</span>

											<span class="txt-m-111 cl10">
												<?php
												echo Common::PriceToVnd($prices);
												?>
											</span>
										</div>
										<a href="<?php echo URL ?>Cart/Cart/post" class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
											Thanh Toán
										</a>
										<a href="<?php echo URL ?>Cart/cart" style="margin-top: 10px;" class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
											Giỏ Hàng
										</a>
											</div>
									</div>
								</div>
								<?php

								if (isset($_SESSION[QuanLy])) {
								?>
									<li class="nav-item nav-link">
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

									</li>
								<?php
								}
								?>
							</div>

					</nav>

				</div>
			</div>

			<div>

			</div>



			<!-- Icon header -->

























			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->
				<div class="logo-mobile">
					<a href="index.html"><img src="public/molicha/#" alt="IMG-LOGO"></a>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
					<div class="h-full flex-m">
						<div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
							<img src="public/molicha/images/icons/icon-search.png" alt="SEARCH">
						</div>
					</div>

					<div class="wrap-cart-header h-full flex-m m-l-5 menu-click">
						<div class="icon-header-item flex-c-m trans-04 icon-header-noti" data-notify="2">
							<img src="public/molicha/images/icons/icon-cart-2.png" alt="CART">
						</div>

						<div class="cart-header menu-click-child trans-04">
							<div class="bo-b-1 bocl15">


								<!-- cart header item -->
								<div class="flex-w flex-str m-b-25">
									<div class="size-w-15 flex-w flex-t">
										<a href="product-single.html" class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
											<img src="public/molicha/images/item-cart-01.jpg" alt="PRODUCT">
										</a>

										<div class="size-w-17 flex-col-l">
											<a href="product-single.html" class="txt-s-108 cl3 hov-cl10 trans-04">
												Cheery
											</a>

											<span class="txt-s-101 cl9">
												18$
											</span>

											<span class="txt-s-109 cl12">
												x2
											</span>
										</div>
									</div>

									<div class="size-w-14 flex-b">
										<button class="lh-10">
											<img src="public/molicha/images/icons/icon-close.png" alt="CLOSE">
										</button>
									</div>
								</div>

								<!-- cart header item -->
								<div class="flex-w flex-str m-b-25">
									<div class="size-w-15 flex-w flex-t">
										<a href="product-single.html" class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
											<img src="public/molicha/images/item-cart-02.jpg" alt="PRODUCT">
										</a>

										<div class="size-w-17 flex-col-l">
											<a href="product-single.html" class="txt-s-108 cl3 hov-cl10 trans-04">
												Asparagus
											</a>

											<span class="txt-s-101 cl9">
												12$
											</span>

											<span class="txt-s-109 cl12">
												x1
											</span>
										</div>
									</div>

									<div class="size-w-14 flex-b">
										<button class="lh-10">
											<img src="public/molicha/images/icons/icon-close.png" alt="CLOSE">
										</button>
									</div>
								</div>
							</div>

							<div class="flex-w flex-sb-m p-t-22 p-b-12">
								<span class="txt-m-103 cl3 p-r-20">
									Subtotal
								</span>

								<span class="txt-m-111 cl6">
									48$
								</span>
							</div>

							<div class="flex-w flex-sb-m p-b-31">
								<span class="txt-m-103 cl3 p-r-20">
									Total
								</span>

								<span class="txt-m-111 cl10">
									48$
								</span>
							</div>

							<a href="checkout.html" class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
								check out
							</a>
						</div>
					</div>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>


			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="main-menu-m">
					<li>
						<a href="index.html">Home</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
						<li><a href="home-04.html">Homepage 4</a></li>
						<li><a href="home-05.html">Homepage 5</a></li>
						<li><a href="home-06.html">Homepage 6</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="#">PRODUCT</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="about-01.html">About 1</a></li>
						<li><a href="about-02.html">About 2</a></li>
						<li><a href="coming-soon.html">Coming Soon</a></li>
						<li><a href="error.html">404 Error</a></li>
						<li><a href="checkout.html">CheckOut</a></li>
						<li><a href="account.html">My Account</a></li>
						<li><a href="account-lost-pass.html">My Account Lost Pass</a></li>
						<li><a href="account-register.html">My Account Register</a></li>
						<li><a href="wishlist.html">Wishlist</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="shop-sidebar-grid.html">NEWS</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="shop-sidebar-grid.html">Shop Sidebar Grid</a></li>
						<li><a href="shop-sidebar-list.html">Shop Sidebar List</a></li>
						<li><a href="shop-product-grid.html">Shop Product Grid</a></li>
						<li><a href="shop-product-list.html">Shop Product List</a></li>
						<li><a href="product-single.html">Product Single</a></li>
						<li><a href="shop-cart.html">Shop Cart</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="blog-list.html">ABOUT</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="blog-list.html">Blog List</a></li>
						<li><a href="blog-grid-01.html">Blog Grid 1</a></li>
						<li><a href="blog-grid-02.html">Blog Grid 2</a></li>
						<li><a href="blog-single.html">Blog Single</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="gallery-01.html">RECRUITMENT</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="gallery-01.html">Gallery 1</a></li>
						<li><a href="gallery-02.html">Gallery 2</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="contact-01.html">Contact</a>
						<!-- <ul class="sub-menu-m">
						<li><a href="contact-01.html">Contact 1</a></li>
						<li><a href="contact-02.html">Contact 2</a></li>
					</ul> -->

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>
				</ul>
			</div>

			<!-- Modal Search -->
			<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<span class="lnr lnr-cross"></span>
				</button>

				<div class="container-search-header">
					<form class="wrap-search-header flex-w">
						<button class="flex-c-m trans-04">
							<span class="lnr lnr-magnifier"></span>
						</button>
						<input class="plh1" type="text" name="search" placeholder="Search...">
					</form>
				</div>
			</div>
		</header>
		<?php
	}

	public static function IsHome()
	{
		return (\Application::$_Action = 'index' && \Application::$_Controller = 'index');
	}
	public static function slider()
	{
		if (self::IsHome() == false) {
			return;
		}
		$Item = sliderservice::GetByGroup('HomeSlide');
		if ($Item) {
			# code...
		?>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators" style="top: 15%;">
					<?php
					for ($j = 0; $j < count($Item); $j++) {
						if ($j === 0) {
					?>
							<li data-target="#carouselExampleIndicators" data-slide-to=<?php echo $j ?> class="active"></li>
						<?php
						} else {
						?>

							<li data-target="#carouselExampleIndicators" data-slide-to=<?php echo $j ?>></li>
					<?php
						}
					}

					?>
				</ol>
				<div class="carousel-inner">
					<?php
					$i = 0;
					foreach ($Item as $value) {
						$sliderItem = new sliderservice($value);
						if ($i === 0) {

					?>
							<div class="carousel-item active" style="background-color: #aaa;;">
								<img class="d-block w-100" src="<?php echo $sliderItem->image ?>" alt="First slide">
								<div class="carousel-caption d-none d-md-block" style="top: 30%;left:50%">
									<h1 style="font-size: 50px;color:black;font-weight: bold;letter-spacing: 3px;">Trà Sữa Ngon, <br /> Rang Đậm Vị</h1>
									<p style="font-size: 28px;color:black">Từ Những Năm 1997, Đầu Thế Kỉ Trước <br />Với Truyền Thống Và Công Thức Đặc Biệt</p>
									<a href="san-pham.html" class="btn btn-success btn-lg mt-2">
										Shop now !!!
									</a>

								</div>
							</div>
						<?php
							$i++;
						} else {
						?>
							<div class="carousel-item">
								<img class="d-block w-100" src="<?php echo $sliderItem->image ?>" alt="First slide">
								<div class="carousel-caption d-none d-md-block" style="top: 30%;left:50%">
									<h1 style="font-size: 50px;color:black;font-weight: bold;letter-spacing: 3px;">Trà Sữa Ngon, <br /> Rang Đậm Vị</h1>
									<p style="font-size: 28px;color:black">Từ Những Năm 1997, Đầu Thế Kỉ Trước <br />Với Truyền Thống Và Công Thức Đặc Biệt</p>
									<a href="san-pham.html" class="btn btn-success btn-lg mt-2">
										Shop now !!!
									</a>
								</div>
							</div>
					<?php

						}
					}
					?>
					<!-- <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div> -->
					<a class="carousel-control-prev" style="color: red;" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			<?php
		}
	}
	public static function product()
	{
		# code...
			?>
			<div class="sec-product bg0 p-t-145 p-b-25">
				<div class="container">
					<div class="size-a-1 flex-col-c-m p-b-48">
						<div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
							Molicha

							<div class="how-pos1">
								<img src="public/molicha/images/icons/symbol-02.png" alt="IMG">
							</div>
						</div>

						<h3 class="txt-center txt-l-101 cl3 respon1">
							bestseller
						</h3>
					</div>


					<div class="row isotope-grid">
						<!-- - -->
						<?php

                                $sp = new sanpham();
                                $data = $sp->GetBestSeller();
                                foreach($data as $val){
                                $sp = new sanpham($val);
                        ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-75 isotope-item fruit-juic-fill other-fill">
							<!-- Block1 -->
							<div class="block1">
								<div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
									<img style="height:270px;width:270px;" src="<?= $sp->image ?>" alt="IMG">

									<div class="block1-content flex-col-c-m p-b-46">
										<a href="product-single.html" class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
											<?= $sp->name ?>
										</a>

										<span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
											<?= Common::PriceToVnd($sp->price) ?>
										</span>

										<div class="block1-wrap-icon flex-c-m flex-w trans-05">
											<a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
												<img src="public/molicha/images/icons/icon-view.png" alt="ICON">
											</a>

											<a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
												<img src="public/molicha/images/icons/icon-cart.png" alt="ICON">
											</a>

											<a href="wishlist.html" class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
												<img class="icon-addwish-b1" src="public/molicha/images/icons/icon-heart.png" alt="ICON">
												<img class="icon-addedwish-b1" src="public/molicha/images/icons/icon-heart2.png" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php 
								}
						?>
						<!-- - -->
					</div>
				</div>
			</div>
		<?php
	}

	public static function flavor()
	{
		# code...
		$pages = new pagesService();
        $item = $pages->GetByAlias('new-drink');
		?>
			<section class="sec-flavors bg-img1 p-t-145 p-b-45" style="background-image: url(images/bg-02.jpg);">
				<div class="container">
					<div class="size-a-1 flex-col-c-m p-b-48">
						<div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
							Molicha

							<div class="how-pos1">
								<img src="public/molicha/images/icons/symbol-02.png" alt="IMG">
							</div>
						</div>

						<h3 class="txt-center txt-l-101 cl3 respon1">
							New Drink
						</h3>
					</div>

					<div class="flex-c-m wrap-pic-w p-t-10 p-b-38">
						<img src="<?= $item->image ?>" alt="IMG">
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-8 col-lg-4 p-b-50">
							<div class="p-r-30 p-rl-0-xl">
								<div class="flex-w flex-str p-b-20">
									<div class="flex-l-m size-w-18 m-r-28">
										<img src="public/molicha/images/icons/symbol-12.png" alt="IMG">
									</div>

									<div class="size-w-19">
										<div class="how-bor1 p-b-6 m-b-13">
											<span class="txt-l-107 cl10">
												01
											</span>

											<span class="txt-m-112 cl10">
												/ 100%
											</span>
										</div>

										<span class="txt-m-301 cl3">
											100% Organic
										</span>
									</div>
								</div>

								<p class="txt-s-101 cl6">
									There are many variations of passages of Lorem Ipsum available, but the majority have
									suffered alteration in some form.
								</p>
							</div>
						</div>

						<div class="col-sm-8 col-lg-4 p-b-50">
							<div class="p-rl-15 p-rl-0-xl">
								<div class="flex-w flex-str p-b-20">
									<div class="flex-l-m size-w-18 m-r-28">
										<img src="public/molicha/images/icons/symbol-13.png" alt="IMG">
									</div>

									<div class="size-w-19">
										<div class="how-bor1 p-b-6 m-b-13">
											<span class="txt-l-107 cl10">
												02
											</span>

											<span class="txt-m-112 cl10">
												/ 100%
											</span>
										</div>

										<span class="txt-m-301 cl3">
											Family Healthy
										</span>
									</div>
								</div>

								<p class="txt-s-101 cl6">
									It is a long established fact that a reader will be distracted by the readable content of a
									page when looking at its layout.
								</p>
							</div>
						</div>

						<div class="col-sm-8 col-lg-4 p-b-50">
							<div class="p-l-30 p-rl-0-xl">
								<div class="flex-w flex-str p-b-20">
									<div class="flex-l-m size-w-18 m-r-28">
										<img src="public/molicha/images/icons/symbol-14.png" alt="IMG">
									</div>

									<div class="size-w-19">
										<div class="how-bor1 p-b-6 m-b-13">
											<span class="txt-l-107 cl10">
												03
											</span>

											<span class="txt-m-112 cl10">
												/ 100%
											</span>
										</div>

										<span class="txt-m-301 cl3">
											Always Fresh
										</span>
									</div>
								</div>

								<p class="txt-s-101 cl6">
									Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece
									of classical Latin literature.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}

	public static function whyChoose()
	{
		# code...
		$pages = new pagesService();
        $item = $pages->GetByAlias('short-aboutUs');
		?>
			<section class="sec-whychose bg0 p-t-120">
				<div class="container">
					<div class="row">
						<div class="col-md-7 order-md-2">
							<div class="p-l-50 p-t-60 p-l-0-lg">
								<div class="size-a-1 flex-col-l-m p-b-65">
									<div class="txt-m-201 cl10 how-pos1-parent m-b-14">
										Molicha

										<div class="how-pos1">
											
										</div>
									</div>

									<h3 class="txt-l-101 cl3 respon1">
										Why choose us
									</h3>
								</div>

								<div>
									<div class="flex-w p-b-50">
										<div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
											<img src="public/molicha/images/icons/symbol-15.png" alt="SYMBOL">
										</div>

										<div class="size-w-23">
											<span class="txt-m-101 cl3">
												Family Healthy
											</span>

											<p class="txt-s-101 cl6 p-t-12">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
												Ipsum has been.
											</p>
										</div>
									</div>

									<div class="flex-w p-b-50">
										<div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
											<img src="public/molicha/images/icons/symbol-15.png" alt="SYMBOL">
										</div>

										<div class="size-w-23">
											<span class="txt-m-101 cl3">
												Always Fresh
											</span>

											<p class="txt-s-101 cl6 p-t-12">
												It is a long established fact that a reader will be distracted by the readable
												content of a page when looking at its layout
											</p>
										</div>
									</div>

									<div class="flex-w p-b-50">
										<div class="size-w-22 wrap-pic-max-s flex-t-l p-t-5">
											<img src="public/molicha/images/icons/symbol-15.png" alt="SYMBOL">
										</div>

										<div class="size-w-23">
											<span class="txt-m-101 cl3">
												100% Organic
											</span>

											<p class="txt-s-101 cl6 p-t-12">
												The point of using Lorem Ipsum is that it has a more-or-less normal distribution
												of letters, as opposed to using 'Content here, content here',
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5 order-md-1">
							<div class="flex-b h-full">
								<div class="wrap-pic-max-w"><img style="min-height: 689px;min-width: 420px;" src="<?= $item->image ?>" alt="IMG"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}


	public static function blog()
	{
		# code...
		?>
			<section class="sec-blog bg12 p-t-145 p-b-45">
				<div class="container">
					<div class="size-a-1 flex-col-c-m p-b-70">
						<div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
							Molicha

							<div class="how-pos1">
								<img src="public/molicha/images/icons/symbol-02.png" alt="IMG">
							</div>
						</div>

						<h3 class="txt-center txt-l-101 cl3 respon1">
							Molicha Blog
						</h3>
					</div>

					<div class="row justify-content-center">
					<?php
                        $branch = new BranchService();
                        $item = $branch->GetItemsByGroups('MainMenu');
                        foreach ($item as $val) {
                        ?>
						<div class="col-sm-8 col-lg-4 p-b-50">
							<div>
								<a href="blog-single.html" class="wrap-pic-w hov4 how-pos5-parent">
									<img src="<?= $val->image ?>" alt="BLOG">

									<!-- <div class="flex-col-c-m size-a-9 bg10 how-pos5">
										<span class="txt-l-110 cl0">
											18
										</span>

										<span class="txt-s-110 cl0">
											June
										</span>
									</div> -->
								</a>

								<div class="p-t-16">
									<a href="blog-single.html" class="txt-m-109 cl3 hov-cl10 trans-04">
										Molicha <?= $val->name ?>
									</a>

									<div class="flex-w flex-m p-t-15">
										<span class="flex-w flex-m m-r-35">
											<img class="ver-middle m-r-12" src="public/molicha/images/icons/icon-user.png" alt="SYMBOL">
											<span class="txt-s-101 cl6">
												<?= $val->address ?>
											</span>
										</span>

									</div>
								</div>
							</div>
						</div>
						<?php 
						}
						?>
					</div>
				</div>
			</section>
		<?php
	}

	public static function footer()
	{
		# code...
		?>
			<footer class="bg2">
				<div class="container">
					<div class="wrap-footer flex-w p-t-60 p-b-62">
						<div class="footer-col1">
							<div class="footer-col-title">
								<a href="#">
									<img src="#" alt="LOGO">
								</a>
							</div>

							<p class="txt-s-101 cl0 size-w-10 p-b-16">
								There are many variations of passages of Lorem Ipsum available, but the majority have suffered
								alteration
							</p>

							<ul>
								<li class="txt-s-101 cl0 flex-t p-b-10">
									<span class="size-w-11">
										<img src="public/molicha/images/icons/icon-mail-02.png" alt="ICON-MAIL">
									</span>

									<span class="size-w-12 p-t-1">
										molicha@gmail.com
									</span>
								</li>

								<li class="txt-s-101 cl0 flex-t p-b-10">
									<span class="size-w-11">
										<img src="public/molicha/images/icons/icon-pin-02.png" alt="ICON-MAIL">
									</span>

									<span class="size-w-12 p-t-1">
										123 Vo Thi 6 Bien Hoa
									</span>
								</li>

								<li class="txt-s-101 cl0 flex-t p-b-10">
									<span class="size-w-11">
										<img src="public/molicha/images/icons/icon-phone-02.png" alt="ICON-MAIL">
									</span>

									<span class="size-w-12 p-t-1">
										(123) 000 000
									</span>
								</li>
							</ul>
						</div>

						<div class="footer-col2">
							<div class="footer-col-title flex-m">
								<span class="txt-m-109 cl0">
									Category
								</span>
							</div>

							<ul>
								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Coffe
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Latte
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Macchiato
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Smoothe
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Cake
									</a>
								</li>
							</ul>
						</div>

						<div class="footer-col3">
							<div class="footer-col-title flex-m">
								<span class="txt-m-109 cl0">
									Other
								</span>
							</div>

							<ul>
								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										New Cupon
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										Discount
									</a>
								</li>

								<li class="p-b-16">
									<a href="#" class="txt-s-101 cl0 hov-cl10 trans-04 p-tb-5">
										New Drink
									</a>
								</li>
								</li>
							</ul>
						</div>

						<div class="footer-col4">
							<div class="footer-col-title flex-m">
								<span class="txt-m-109 cl0">
									Contact
								</span>
							</div>

							<p class="txt-s-101 cl0 p-b-33">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
								labore et dolore.
							</p>

							<form class="flex-w">
								<input class="size-a-11 bg0 plh1 txt-s-111 cl3 p-rl-15" type="text" name="email" placeholder="Your email address">
								<button class="flex-c-m size-a-10 bg10 hov-btn2 trans-04">
									<img src="public/molicha/images/icons/icon-send.png" alt="SENT">
								</button>
							</form>
						</div>
					</div>

					<div class="flex-w flex-sb-m bo-t-1 bocl16 p-tb-14">
						<div class="flex-w flex-m">
							<a href="#" class="m-r-29 m-tb-10">
								<img src="public/molicha/images/icons/icon-pay-01.png" alt="ICON-PAY">
							</a>

							<a href="#" class="m-r-29 m-tb-10">
								<img src="public/molicha/images/icons/icon-pay-02.png" alt="ICON-PAY">
							</a>

							<a href="#" class="m-r-29 m-tb-10">
								<img src="public/molicha/images/icons/icon-pay-03.png" alt="ICON-PAY">
							</a>

							<a href="#" class="m-r-29 m-tb-10">
								<img src="public/molicha/images/icons/icon-pay-04.png" alt="ICON-PAY">
							</a>

							<a href="#">
								<img src="public/molicha/images/icons/icon-pay-05.png" alt="ICON-PAY">
							</a>
						</div>
					</div>
				</div>
			</footer>
		<?php
	}

	public static function backBtn()
	{
		# code...
		?>
			<div class="btn-back-to-top bg0-hov" id="myBtn">
				<span class="symbol-btn-back-to-top">
					<span class="lnr lnr-chevron-up"></span>
				</span>
			</div>
	<?php
	}
}
