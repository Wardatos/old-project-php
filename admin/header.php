<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRANG QUẢN LÝ THÔNG TIN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://localhost/manh/admin/home.php">ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">HÀNG HÓA</div>
                            <a class="nav-link" href="productadd.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                THÊM MỚI
                            </a>
                            <a class="nav-link" href="productedit.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                                CHỈNH SỬA 
                            </a>
                            <a class="nav-link" href="productlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                                DANH SÁCH SẢN PHẨM
                            </a>
                            <div class="sb-sidenav-menu-heading">DANH MỤC</div>
                            <a class="nav-link" href="addcat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                THÊM MỚI DANH MỤC
                            </a>
                            <a class="nav-link" href="catlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                DANH SÁCH DANH MỤC
                            </a>
                            <div class="sb-sidenav-menu-heading">THƯƠNG HIỆU</div>
                            <a class="nav-link" href="brandadd.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                THÊM MỚI THƯƠNG HIỆU
                            </a>
                            <a class="nav-link" href="brandlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                DANH SÁCH THƯƠNG HIỆU
                            </a>
                            <div class="sb-sidenav-menu-heading">NGƯỜI DÙNG</div>
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                TÀI KHOẢN
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>