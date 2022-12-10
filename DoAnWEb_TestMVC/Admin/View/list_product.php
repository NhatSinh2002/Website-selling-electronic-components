<?php
    session_start();
    include("include/session.php");
    include("include/top.php");
    include("../Model/ModelAll.php");
    include("../config/databse.php");
	  include("../config/site.php");
    include("../Model/Pagination.php");
    include("../Controller/product/getall-product.php");
?>

<!-- get role -->
<?php

$pagination = new Pagination;


  if($_SESSION['SMC_login_admin_type']==1){
    $_SESSION['SMC_login_admin_role']="Admin";
  }
  else {
    $_SESSION['SMC_login_admin_role']="Quản lý";
  }


  $config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
    'total_record'  => count_all_member(), 
    'limit'         => 5,
    'link_full'     => 'list_product.php?page={page}',
    'link_first'    => 'list_product.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');

// var_dump($limit);


// Lấy danh sách thành viên
$productList = getAll($limit, $start);

// var_dump($productList);

?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->
          <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="index.php" class="app-brand-link">
                <span class="app-brand-logo demo">
                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2">LOGO</span>
              </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="index.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>

                  <!-- Account -->
                  <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">TÀI KHOẢN</span>
                  </li>
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-dock-top"></i>
                      <div data-i18n="Account Settings">Cài đặt tài khoản</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="pages-account-settings-account.php" class="menu-link">
                          <div data-i18n="Account">Tài khoản</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="pages-account-settings-notifications.php" class="menu-link">
                          <div data-i18n="Notifications">Đổi mật khẩu</div>
                        </a>
                      </li>

                      <li class="menu-item">
                        <a href="auth-login-basic.php" class="menu-link" target="_blank">
                          <div data-i18n="Basic">Đăng nhập</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="auth-register-basic.php" class="menu-link" target="_blank">
                          <div data-i18n="Basic">Đăng xuất</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!-- Manament -->
                  <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản lý</span></li>
                  <!-- Cards -->
                  <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Nhân lực</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="list-employee.php" class="menu-link">
                          <div data-i18n="">Nhân viên</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="list_customer.php" class="menu-link">
                          <div data-i18n="Alerts">Khách hàng</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!-- website -->
                  <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Website</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="list-category.php" class="menu-link">
                          <div data-i18n="">Danh mục</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="list-slider.php" class="menu-link">
                          <div data-i18n="Alerts">Slider</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!-- Feedback -->
                  <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Phản hồi</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="list-rate.php" class="menu-link">
                          <div data-i18n="">Đánh giá</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="list-question.php" class="menu-link">
                          <div data-i18n="Alerts">Thắc mắc</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!-- Buying -->
                  <li class="menu-item active open">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Bán hàng</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item active">
                        <a href="list_product.php" class="menu-link">
                          <div data-i18n="">Sản phẩm</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="list_discount.php" class="menu-link">
                          <div data-i18n="Alerts">Mã giảm giá</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="list_warehouse.php" class="menu-link">
                          <div data-i18n="Alerts">Kho hàng</div>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <!-- Order -->
                  <li class="menu-item">
                    <a href="list-order.php" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Đơn hàng</div>
                    </a>
                  </li>

                  <!-- Brand -->
                  <li class="menu-item">
                    <a href="list_supplier.php" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-box"></i>
                      <div data-i18n="">Thương hiệu</div>
                    </a>
                  </li>


                  <!-- Forms & Tables -->
                  <li class="menu-header small text-uppercase"><span class="menu-header-text">Thống kê</span></li>

          </aside>
          <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Tìm kiếm..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">Nguyễn Hoàng Trung</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Thông tin cá nhân</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Cài đặt</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Đăng xuất</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Nhân viên</h4>

                        <hr class="my-5" />

                        <!-- alert warning -->
                        <div class="alert alert-danger alert-dismissible" role="alert" hidden>
                              This is a danger dismissible alert — check it out!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                          <div class="alert alert-info alert-dismissible" role="alert" hidden >
                              This is an info dismissible alert — check it out!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        <!-- Bootstrap Table with Header - Footer -->
                        <div class="card">
                            <div class="card-header header table-user">
                                <h5 class=" card-header">Danh sách sản phẩm</h5>
                                <a href="add_product.php"><button class="btn btn-primary add-btn user"
                                        type="button">THÊM</button></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table user">
                                    <thead>
                                      <tr>
                                        <th class="id-header product">ID</th>
                                        <th class="category product">Danh mục</th>
                                        <th class="companny product">Hãng</th>
                                        <th class="name product">Tên sản phẩm</th>
                                        <th class="img product text-center">Ảnh</th>
                                        <th class="cost product">Giá gốc</th>
                                        <th class="percent-reduce product">Phần trăm giảm</th>
                                        <th class="status product">Tình trạng</th>
                                        <th class="action product">Thao tác</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        $int=0;
                                        foreach($productList AS $eachRow)
                                        {
                                          if($eachRow['tinhtrang']==1)
                                          {
                                            $productStatus = "checked='true'";
                                          }
                                          else
                                          {
                                            $productStatus = "";
                                          }
                                          
                                          echo
                                          '
                                          <tr>
                                            <td id="'.$eachRow['id'].'" class="id-header product">
                                              '.$eachRow['id'].'
                                            </td>
                                            <td class="category product">
                                            '.$eachRow['ten'].'
                                            </td>
                                            <td class="companny product">
                                            '.$eachRow['tenncc'].'
                                            </td>
                                            <td class="name product">
                                            '.$eachRow['tensp'].'
                                            </td>
                                            <td class="img product">
                                              <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW']."thumbail/".$eachRow['anh'].'" class ="product-img">
                                            </td>
                                            <td class="cost product">
                                            '.$eachRow['giagoc'].'
                                            </td>
                                            <td class="percent-reduce product">
                                            '.$eachRow['phantram'].'
                                            </td>
                                            <td class="status product">
                                              <label class="status-product-check toggle-switchy pl-2" for="status-product-check_'.$int.'" data-size="sm" data-text="false"
                                                data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                                                aria-controls="filterbar" id="filter-btn" onchange="changStatus(this)">
                                                <input '.$productStatus.'"  type="checkbox" class="" id="status-product-check_'.$int.'">
                                                <span class="toggle">
                                                  <span class="switch"></span>
                                                </span>
                                              </label>
                                            </td>
                                            <td class="action product">
                                            <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu action--none">
                                                        <a class="dropdown-item" href="edit_product.php?id='.$eachRow['id'].'"><i
                                                                    class="bx bx-trash me-1"></i> sửa</a>
                                                            
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="bx bx-trash me-1"></i> Xóa</a>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                          ';
                                          
                                          $int++;
                                        }

                                        


                                      ?>
                                      <tr>
                                        <td class="id-header product">
                                          100
                                        </td>
                                        <td class="category product">
                                          Danh mục
                                        </td>
                                        <td class="companny product">
                                          Hãng
                                        </td>
                                        <td class="name product">
                                          Tên sản phẩm aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                        </td>
                                        <td class="img product">
                                          <img src="../../public/uploads/users/User_admin_anh-dai-dien.jpg" alt="" class="photo-product">
                                        </td>
                                        <td class="cost product">
                                          Giá gốc
                                        </td>
                                        <td class="percent-reduce product">
                                          Phần trăm giảm
                                        </td>
                                        <td class="status product">
                                          <label class="toggle-switchy pl-2" for="status-product-check" data-size="sm" data-text="false"
                                            data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="true"
                                            aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                                            <input checked="" type="checkbox" id="status-product-check">
                                            <span class="toggle">
                                              <span class="switch"></span>
                                            </span>
                                          </label>
                                        </td>
                                        <td class="action product">
                                        <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu action--none">
                                                    <a class="dropdown-item" href="edit_product.php"><i
                                                                class="bx bx-trash me-1"></i> sửa</a>
                                                        
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Xóa</a>
                                                    </div>
                                                </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                    <tfoot class="table-border-bottom-0">
                                      <tr>
                                        <th class="id-header product">ID</th>
                                        <th class="category product">Danh mục</th>
                                        <th class="companny product">Hãng</th>
                                        <th class="name product">Tên sản phẩm</th>
                                        <th class="img product">Ảnh</th>
                                        <th class="cost product">Giá gốc</th>
                                        <th class="percent-reduce product">Phần trăm giảm</th>
                                        <th class="status product">Tình trạng</th>
                                        <th class="action product">Thao tác</th>
                                      </tr>
                                    </tfoot>
                                        <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">
                                                                <div class="card mb-4">
                                                                    <div
                                                                        class="card-header d-flex justify-content-between align-items-center">
                                                                        <h5 class="mb-0">Thông tin <span>sản phẩm</span>
                                                                        </h5>
                                                                        <small class="text-muted float-end">Thêm thông
                                                                            tin</small>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-nameproduct">Tên sản phẩm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-nameproduct"
                                                                                        placeholder="Nhập tên sản phẩm" disabled>
                                                                                </div>
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-12">
                                                                                    <label class="form-label" for="basic-default-fullname">Slug</label>
                                                                                    <input type="text" class="form-control" id="basic-default-slug"
                                                                                        placeholder="Nhập slug" disabled>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Danh mục</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
                                                                                            <option>Chọn danh mục</option>
                                                                                            <option value="1">CPU</option>
                                                                                            <option value="2">RAM</option>
                                                                                            <option value="3">SSD</option>
                                                                                            <option value="4">HDD</option>
                                                                                            <option value="5">VGA</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Thương hiệu</label>
                                                                                        <select id="defaultSelect" class="form-select" disabled>
                                                                                            <option>Chọn thương hiệu</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                
                                                                                
                                                                                
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Giá gốc</label>
                                                                                    <input type="text" class="form-control" id="basic-default-cost"
                                                                                        placeholder="Nhập giá gốc" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Phần trăm giảm</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập phần trăm giảm" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Bảo hành</label>
                                                                                    <input type="text" class="form-control" id="basic-default-cost"
                                                                                        placeholder="Nhập số tháng bảo hành" disabled>
                                                                                </div>
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label class="form-label">Tình trạng</label>
                                                                                    <input type="text" class="form-control" id="basic-default-percent"
                                                                                        placeholder="Nhập tình trạng còn hàng" disabled>
                                                                                </div>
                                                                                
                                                                            </div>
                                
                                
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sản
                                                                                            xuất</label>
                                                                                        <input class="form-control" type="date" value="" disabled>
                                                                                    </div>
                                                                                </div>
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày tạo</label>
                                                                                        <!-- <input type="text" class="form-control" id="date-time-create" value=""> -->
                                                                                        <p class="mt-1" id="date-time-create"></p>
                                                                                    </div>
                                                                                </div>
                                
                                
                                                                                <div class="col-xl-4">
                                                                                    <div class="mb-3">
                                                                                        <label for="defaultSelect" class="form-label">Ngày sửa</label>
                                                                                        <input class="form-control" type="date" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 1</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 2</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                
                                                                            <div class="row">
                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 3</label>
                                                                                </div>

                                                                                <div class="mb-3 col-xl-6">
                                                                                    <label for="formFile" class="form-label ">Ảnh 4</label>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="mb-5 col-xl-6">
                                                                                    <div class="fileupload fileupload-new border-5"
                                                                                        data-provides="fileupload">
                                                                                        <div class="fileupload-new thumbnail"
                                                                                            style="width: 160px; height: 160px;">
                                                                                            <img src="../assets/img/product/570x470_cpu-intel-core-i9-12900.png" width="200px" alt="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Đóng
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                </table>
                                <div class="paging d-flex justify-content-end px-5 py-4">
                                  <?php echo $pagination->html(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Bootstrap Table with Header - Footer -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

<?php
include("include/tail.php");
?>


<!-- realtime thay đổi trạng thái -->
<script>
  function  changStatus(e){
    var id_product = $(e).parent().parent().find('td').attr('id');
    var status = document.getElementById($(e).find('input').attr('id')).checked ? 1: 0;

    $.ajax({
    url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Product/status_check_rt.php",
    data: {id_product: id_product, status: status},
    type: 'POST',
    dataType: "text",
    success: function(data){ 
      if(data==1){
        $('.alert.alert-info.alert-dismissible').text("Sửa thông tin thành công");
        $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
        $('.alert.alert-info.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
          }, 2000);
      //   setTimeout(function(){

      //     $('.alert.alert-danger.alert-dismissible').prop('hidden', true);
      //   }, 1000)
      }
      else{
        $('.alert.alert-danger.alert-dismissible').text("Đã có lỗi xảy ra !! vui lòng thử lại sau");
        $('.alert.alert-info.alert-dismissible').prop('hidden', true);
        $('.alert.alert-danger.alert-dismissible').prop('hidden', false);
        $("html, body").animate({scrollTop: 0}, 1000);

        setTimeout(function(){
          $('.alert.alert-info.alert-dismissible').prop('hidden', true);
        }, 2000);
      }
    }
        
        
  });
};
</script>