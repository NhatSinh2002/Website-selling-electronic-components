<?php
    include("include/top.php");
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
          <li class="menu-item">
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
          <li class="menu-item  active open">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="">Website</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item active">
                <a href="list-category.php" class="menu-link">
                  <div data-i18n="">Danh mục</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="list-slider" class="menu-link">
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
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="">Bán hàng</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
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

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
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
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Website / </span> <a class="fw-light"
                href="list-category.php" style="color: #b1b1b1">Danh mục
                / </a>Thêm danh mục</h4>

            <hr class="my-5" />
            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin <span>Danh mục</span></h5>
                    <small class="text-muted float-end">Thêm thông tin</small>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                            placeholder="Nhập tên danh mục" />
                        </div>
                        <div class="mb-3 col-xl-6">
                          <label class="form-label" for="basic-default-slug">Slug</label>
                          <input type="text" class="form-control" id="basic-default-slug"
                            placeholder="Nhập slug tên miền" />
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Mô tả</label>
                        <textarea id="basic-default-message" class="form-control" placeholder="Nhập mô tả cho danh mục"></textarea>
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label ">Ảnh</label> <span class="upload-notify"></span>
                        <div class="input-group">
                          <button class="btn-remove-img btn btn-outline-primary" type="button" >Xóa</button>
                          <input name= "avatar-employee" class="form-control add-infor user" type="file" id="formFile-review-image-label" 
                            onchange="readURL(this);" set-to="div3" required accept=".jfif,.jpg,.jpeg,.png,.gif"  multiple>
                      </div>

                      <div class="mb-5">
                        <label for="formFile" class="form-label">Xem trước</label>
                        <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 300px; height: 160px;">
                            <img src="../assets/img/avatars/1.png" alt="">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- / Content -->

<?php
    include("include/tail.php");
?>