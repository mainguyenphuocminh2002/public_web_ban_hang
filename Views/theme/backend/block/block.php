<?php
namespace Views\theme\backend\block;
class block
{
    public function __construct()
    {
    }
    //          HEAD
    public static function head()
    {
        ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>ADMIN MOLICHA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/public/admin/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/admin/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/public/admin/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/public/admin/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/public/admin/plugins/select2/css/select2.min.css">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="/public/admin/css/bootstrap-datetimepicker.min.css">

    <!-- quill CSS -->
    <link rel="stylesheet" href="/public/admin/plugins/quill/css/quill.snow.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="/public/admin/plugins/datatables/datatables.min.css">
    <!-- sweetalert2 CSS -->
    <link rel="stylesheet" href="/public/admin/plugins/sweetalert2/sweetalert2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/public/admin/css/style.css">

    <!--[if lt IE 9]>
			<script src="/public/admin/js/html5shiv.min.js"></script>
			<script src="/public/admin/js/respond.min.js"></script>
		<![endif]-->
    <!-- jQuery -->
    <script src="/public/admin/js/jquery-3.5.1.min.js"></script>
    <script src="/public/admin/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/public/admin/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script src="/public/admin/mine-config.js"></script>
</head>
<?php
}
    // END HEAD

    // JS

    static function js(){
        ?>
<!-- Bootstrap Core JS -->

<script>
<?php #echo "let ADMIN_URL = '" . ADMIN_URL . "';"; ?>
</script>
<script src="/public/admin/js/popper.min.js"></script>
<script src="/public/admin/js/bootstrap.min.js"></script>

<!-- Feather Icon JS -->
<script src="/public/admin/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="/public/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Select2 JS -->
<script src="/public/admin/plugins/select2/js/select2.min.js"></script>

<!-- Datepicker Core JS -->
<script src="/public/admin/plugins/moment/moment.min.js"></script>
<script src="/public/admin/js/bootstrap-datetimepicker.min.js"></script>

<!-- quill JS -->
<script src="/public/admin/plugins/quill/js/quill.js"></script>

<!-- Form Validation JS -->
<script src="/public/admin/js/form-validation.js"></script>

<!-- Datatables JS -->

<!-- sweetalert2 JS -->
<script src="/public/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- voucher_codes JS -->
<script src="/public/admin/js/voucher_codes.js"></script>

<!-- Custom JS -->
<script src="/public/admin/js/script.js"></script>

<?php
    }

    // END JS 


    // HEADER

    public static function header()
    {
        ?>
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="/backend" class="logo">
            <img src="/public/admin/img/logo.png" alt="Logo" />
        </a>
        <a href="<?='#'?>/dashboard" class="logo logo-small">
            <img src="/public/admin/img/logo-small.png" alt="Logo" width="30" height="30" />
        </a>
    </div>
    <!-- /Logo -->

    <!-- Sidebar Toggle -->
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Sidebar Toggle -->

    <!-- Search -->
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here" />
            <button class="btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <!-- /Search -->

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Menu -->
    <ul class="nav user-menu">
        <!-- Flag -->

        <!-- /Flag -->

        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bell">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="badge badge-pill">5</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt=""
                                            src="/public/admin/img/profiles/avatar-02.jpg" />
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            <span class="noti-title">Brian Johnson</span> paid the
                                            invoice <span class="noti-title">#DF65485</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">4 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt=""
                                            src="/public/admin/img/profiles/avatar-03.jpg" />
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            <span class="noti-title">Marie Canales</span> has accepted
                                            your estimate
                                            <span class="noti-title">#GTR458789</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">6 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary-light"><i
                                                class="far fa-user"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            <span class="noti-title">New user registered</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">8 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt=""
                                            src="/public/admin/img/profiles/avatar-04.jpg" />
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            <span class="noti-title">Barbara Moore</span>
                                            declined the invoice
                                            <span class="noti-title">#RDW026896</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">12 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle bg-info-light"><i
                                                class="far fa-comment"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <p class="noti-details">
                                            <span class="noti-title">You have received a new message</span>
                                        </p>
                                        <p class="noti-time">
                                            <span class="notification-time">2 days ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img src="assets/img/profiles/avatar-01.jpg" alt="" />
                    <span class="status online"></span>
                </span>
                <span><?=$_SESSION[QuanLy]->username;?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-1">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Profile</a>
                <a class="dropdown-item" href="settings.html"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-1">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                    Settings</a>
                <a class="dropdown-item" href="/CheckLogin/logout"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out mr-1">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Logout</a>
            </div>
        </li>
        <!-- /User Menu -->
    </ul>
    <!-- /Header Menu -->
</div>

<?php
}
    // END HEADER

    // SIDEBAR

    public static function sidebar()
    {
        ?>
<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 820px">
        <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 820px">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li class="<?php #if ($data["Page"] == "dashboard") echo "active"; ?>">
                        <a href="<?=URL;?>backend"><i class="fas fa-home"></i><span>Trang Chủ</span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "dashboard") echo "active"; ?>">
                        <a href="<?=URL;?>Profile"><i class="fa fa-user" aria-hidden="true"></i>
                            <span>Thông Tin Cá Nhân</span></a>
                    </li>
                    <li class="menu-title"><span>Thành viên</span></li>
                    <li class="<?php #if ($data["Page"] == "dashboard") echo "active"; ?>">
                        <a href="<?=URL;?>QuanLyQuyen"><i class="fa fa-user" aria-hidden="true"></i>
                            <span>Quản Lý Quyền</span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "dashboard") echo "active"; ?>">
                        <a href="<?=URL;?>QuanLyQuyenChiTiet"><i class="fa fa-user" aria-hidden="true"></i>
                            <span>Quản Lý Quyền Chi Tiết</span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "user") echo "active"; ?>">
                        <a href="<?=URL;?>QuanLyUser"><i class="fas fa-users"></i><span>Danh sách Thành
                                viên</span></a>
                    </li>
                    <li class="menu-title"><span>Sản phẩm</span></li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>SanPham/index"><i class="fas fa-boxes"></i><span>Danh Sách Sản Phẩm
                                </span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>Cart/donhang"><i class="fas fa-boxes"></i><span>Quản Lý Đơn Hàng
                                </span></a>
                    </li>
                    <li class="menu-title"><span>Giao Diện</span></li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>GiaoDien/slider"><i class="fas fa-boxes"></i><span>Chỉnh Sửa Trình Chiếu
                                </span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>GiaoDien/menu"><i class="fas fa-boxes"></i><span>Chỉnh Sửa Menu
                                </span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>GiaoDien/branch"><i class="fas fa-boxes"></i><span>Chỉnh Sửa Cơ Sở
                                </span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>GiaoDien/pages"><i class="fas fa-boxes"></i><span>Chỉnh Sửa Trang
                                </span></a>
                    </li>
                    <li class="<?php #if ($data["Page"] == "product") echo "active"; ?>">
                        <a href="<?=URL;?>GiaoDien/widget"><i class="fas fa-boxes"></i><span>Chỉnh Sửa Widget
                                </span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="slimScrollBar" style="
        background: rgb(204, 204, 204);
        width: 7px;
        position: absolute;
        top: 0px;
        opacity: 0.4;
        display: block;
        border-radius: 7px;
        z-index: 99;
        right: 1px;
        height: 733.373px;
      "></div>
        <div class="slimScrollRail" style="
        width: 7px;
        height: 100%;
        position: absolute;
        top: 0px;
        display: none;
        border-radius: 7px;
        background: rgb(51, 51, 51);
        opacity: 0.2;
        z-index: 90;
        right: 1px;
      "></div>
    </div>
</div>

<?php
}
    // END SIDEBAR


}
?>