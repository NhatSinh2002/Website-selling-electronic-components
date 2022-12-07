<?php
    session_start();
    include("include/session.php");
    include("include/top.php");
    include("../Model/ModelAll.php");
    include("../config/databse.php");
	  include("../config/site.php");
    include("../Model/Pagination.php");
    include("../Controller/Employee/getall-employee.php");
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
    'link_full'     => 'list-employee.php?page={page}',
    'link_first'    => 'list-employee.php',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');

// var_dump($limit);


// Lấy danh sách thành viên
$employeeList = getAllEmployee($limit, $start);

// var_dump($employeeList);

?>

<?php
$Model = new ModelAll;

// var_dump($_SESSION);
##=======LẤY DỮ LIỆU=======##
$columnName = $tableName = null;
$columnName = "*";
$tableName['MAIN'] = "taikhoan";
$tableName['1'] ='nguoidung';
$whereValue['nguoidung.id']=	$_SESSION['SMC_login_id'];
// var_dump($whereValue['id']);
$whereCondition ="!=";
$joinCondition = array ("1"=>array ('taikhoan.id', 'nguoidung.id_taikhoan'));
// $employeeList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue, $whereCondition);
// var_dump($employeeList);

##=======LẤY DỮ LIỆU=======##

  // Kiểm tra nếu là ajax request thì trả kết quả
  // if(isset($_GET['page'])) {
  //   // var_dump("chưa vào");
  //   echo (json_encode(array(
  //       'member' => $employeeList,
  //       'paging' => $pagination->html()
  //   )));
  // }
  



// var_dump(();

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

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
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
                    <li class="menu-item active open">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="">Nhân lực</div>
                        </a>
                        <ul class="menu-sub ">
                            <li class="menu-item active">
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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân lực /</span> Nhân viên</h4>

            <hr class="my-5" />

            <!-- Bootstrap Table with Header - Footer -->
            <div class="card">
              <div class="card-header header table-user">
                <h5 class=" card-header">Thông tin nhân viên</h5>
                <a href="add_employee.php"><button class="btn btn-primary add-btn user" type="button">THÊM</button></a>
              </div>
              <div class="table-responsive text-nowrap">
                <table id="content-table" class="table user">
                  <thead>
                    <tr>
                      <th class="id-header user">Mã</th>
                      <th class="name user">Họ tên</th>
                      <th class="img user">Ảnh</th>
                      <th class="birthday user">Ngày sinh</th>
                      <th class="email user">Email</th>
                      <th class="phone user">Số điện thoại</th>
                      <th class="address user">Địa chỉ</th>
                      <th class="action user">Thao tác</th>

                    </tr>
                  </thead>
                  <tbody id="list">

                    <?php 

                        foreach($employeeList AS $eachRow)
                        {
                          if(empty($eachRow['anh']))
                          {
                            $adminImage = "";
                          }
                          else
                          {
                            $adminImage = $GLOBALS['USER_DIRECTORY'].$eachRow['anh'];
                          }
                          
                          echo '
                          <tr>
                            <td class="id-header user">
                            '.$eachRow['id'].'
                            </td>
                            <td class="name user">
                              '.$eachRow['hoten'].'
                            </td>
                            <td class="img user">
                              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li>
                                  <img src="'.$GLOBALS['USER_DIRECTORY_SHOW'].$eachRow['anh'].'" alt="Anh-dai-dien.jpg" class="photo-user">
                                </li>
                              </ul>
                            </td>
                            <td class="birthday user">
                              <span>'.$eachRow['ngaysinh'].'</span>
                            </td>
                            <td class="email user">
                              '.$eachRow['email'].'
                            </td>
                            <td class="phone user">
                            '.$eachRow['sdt'].
                            '</td>
                            <td class="address user">
                              '.$eachRow['diachi'].'
                            </td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                      class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                                  <a type="submit" class="dropdown-item" href="edit_employee.php?id='.$eachRow['id'].'"><i class="bx bx-edit-alt me-1"></i>
                                    Sửa</a>
                                  <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id='.$eachRow['id_taikhoan'].' href=""><i class="bx bx-trash me-1" ></i> Xóa</p>
                                </div>
                              </div>
                            </td>
                          </tr>

                          
                          ';
                          
                      }

                      
                    ?>



                            <td class="id-header user"> 
                              1
                            </td>
                            <td class="name user">
                             Nguyễn Hoàng Trung
                            </td>
                            <td class="img user">
                              
                                  <img src="../../public/uploads/users/User_Employee_20221205152204_banner-person.png" alt="Anh dai dien" class="photo-user">
                              
                            </td>
                            <td class="birthday user">
                              <span>13/02/2022</span>
                            </td>
                            <td class="email user">
                              nguyenhoangtrunghs@gmail.com
                            </td>
                            <td class="phone user">
                              091911275178
                            </td>
                            <td class="address user">
                              'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                            </td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i
                                      class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>

                                  <a class="dropdown-item" href="edit_employee.php?id='.$eachRow['id'].'"><i class="bx bx-edit-alt me-1"></i>
                                    Sửa</a>
                                  <p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id="bt" href=""><i class="bx bx-trash me-1" ></i> Xóa</p>
                                </div>
                              </div>
                            </td>
                          </tr>
                  </tbody>
                  <tfoot class="table-border-bottom-0">
                    <tr>
                      <th class="id-header user">Mã</th>
                      <th class="name user">Họ tên</th>
                      <th class="img user">Ảnh</th>
                      <th class="birthday user">Ngày sinh</th>
                      <th class="email user">Email</th>
                      <th class="phone user">Số điện thoại</th>
                      <th class="address user">Địa chỉ</th>
                      <th class="action user">Thao tác</th>
                    </tr>
                          
                  </tfoot>

                  <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLongTitle">Thông tin chi tiết</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xl">
                              <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                  <h5 class="mb-0">Thông tin <span>nhân viên</span></h5>
                                  <small class="text-muted float-end">Thêm thông tin</small>
                                </div>
                                <div class="card-body">
                                  <form>
                                    <div class="row">
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label" for="basic-default-fullname">Họ
                                          tên</label>
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                          placeholder="Nhập họ và tên" disabled />
                                      </div>
                                      <div class="mb-3 col-xl-6">
                                        <label class="form-label">Ngày sinh</label>
                                        <input class="form-control" type="date" value="Chọn ngày si" disabled>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-check col-xl-4">
                                        <label class="form-label mb-3" for="basic-default-phone">Giới
                                          tính</label>
                                        <div class="row px-4">
                                          <div class="col-6">
                                            <input name=" GioiTinh" class="form-check-input" type="radio" value=""
                                              checked>
                                            <label class="form-check-label" for="defaultRadio2"> Nam
                                            </label>
                                          </div>

                                          <div class="col-6">
                                            <input name="GioiTinh" class="form-check-input" type="radio" value="">
                                            <label class="form-check-label" for="defaultRadio1">
                                              Nữ </label>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-email">Email</label>
                                          <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" class="form-control"
                                              placeholder="nguyenhoangtrunghs" aria-label=""
                                              aria-describedby="basic-default-email2" disabled />
                                            <!-- <span class="input-group-text" id="basic-default-email2">@gmail.com</span> -->
                                          </div>
                                          <!-- <div class="form-text">You can use letters, numbers & periods</div> -->
                                        </div>
                                      </div>
                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-phone">Số điện
                                            thoại</label>
                                          <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                            placeholder="0123456789" disabled />
                                        </div>
                                      </div>


                                    </div>

                                    <div class="row">
                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Tỉnh/Thành
                                            phố</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn tỉnh/thành phố</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Quận/Huyện</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn quận/huyên</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>


                                      <div class="col-xl-4">
                                        <div class="mb-3">
                                          <label for="defaultSelect" class="form-label">Phường/Xã</label>
                                          <select id="defaultSelect" class="form-select" disabled>
                                            <option>Chọn phường/xã</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Địa chỉ</label>
                                      <textarea id="basic-default-message" class="form-control" placeholder="Địa chỉ"
                                        disabled></textarea>
                                    </div>

                                    <div class="mb-5">
                                      <label for="formFile" class="form-label">Ảnh</label>
                                      <div class="fileupload fileupload-new border-5" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
                                          <img src="../assets/img/avatars/1.png" alt="">
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
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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

<?php
    include("include/tail.php");
?>

<!-- <script type="text/javascript">
	$('.btn-delete').click(function(){
		var id = $(this).attr('id');
		
		$('#modalDelete').attr('href','list-employee.php?did='+id);
	})
</script>	 -->

<script>
  // $('a').on('click', function(e) {
  //   e.preventDefault()
  // })

  // function onClick(){
  //   this.addClass
  // }

  // $('#content-table').on('click',' a', function ()
  // {
  //     var url = $(this).attr('href');
  //   alert(url);
  //     $.ajax({
  //         url : "url",
  //         type : 'get',
  //         dataType : 'json',
  //         success : function (result)
  //         {
  //         alert(result);

  //                 var html = " ";
  //                 $.each(result['member'], function (key, item){
  //                   html += '<td class="id-header user">' 
  //                           +member['id']+'</td>'; 
  //                   html += '<td class="name user">'
  //                           +member['hoten']+ '</td>'; 
  //                   html += '<td class="img user">'
  //                     +'<img src="'+$GLOBALS['USER_DIRECTORY_SHOW']+member['anh']+'" alt="Anh-dai-dien.jpg" class="photo-user">'
  //                   +'</td>'; 
  //                   html += ' <td class="birthday user">'
  //                         +'<span>'+$eachRow['ngaysinh']+'</span>'
  //                         +'</td>';
  //                   html += '<td class="email user">'
  //                             +item['sdt']+
  //                             '</td>'; 
  //                   html += '<td class="email user">'
  //                           +item['diachi']+
  //                           '</td>'; 
  //                   html += '<td class="email user">'
  //                   +'<div class="dropdown">'
  //                   +'<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">'
  //                     +'<i class="bx bx-dots-vertical-rounded"></i>'
  //                   +'</button>'
  //                   +'<div class="dropdown-menu">'
  //                     +'<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLong"><i' +
  //                         +'class="bx bx-info-circle"></i> Xem thông tin chi tiết</a>'

  //                     +'<a type="submit" class="dropdown-item" href="edit_employee.php?id='+member['id']+'"><i class="bx bx-edit-alt me-1"></i>'
  //                       +'Sửa</a>'
  //                     +'<p class="btn-delete dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" id='+member['id_taikhoan']+' href=""><i class="bx bx-trash me-1" ></i> Xóa</p>'
  //                   +'</div>'
  //                 +'</div>'+
  //                   '</td>'; 
  //                 });
                  
                  
  //                 $('#list').html(html);
                  
  //                 $('#paging').html(result['paging']);
                  
  //                 window.history.pushState({path:url},'',url);
  //         }
  //     });
  //     return false;
  // });
</script>

<script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
    console.log(del_id);
    var $ele = $(this);
    Swal.fire({
    title: 'Bạn có muốn xóa nhân viên này?',
    text: "Toàn bộ thông tin sẽ biến mất",
    icon: 'Cảnh báo',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Xóa',
    cancelButtonText: 'Hủy'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/admin/Controller/Employee/delete-employee.php",
          type:"POST",
          data:{del_id: del_id},
          
          success: function(response){
            if(response !=0){
                  console.log(response);
                  Swal.fire(
                  'Đã xóa!',
                  'Nhân viên có ID '+del_id+' đã bị xóa',
                  'sucess')
                  $ele.parent().parent().parent().parent().slideToggle('slow'); 
              } else{
                  Swal.fire(
                  'Thất bại',
                  'Đã xảy ra lỗi! Vui lòng thử lại',
                  'error'
                )
          }
          }
          
            

      });
        
      }
    })
});
</script>


<!-- <script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
        var $ele = $(this);

        alert(del_id);

        swal({
    title: "Add Note",
    input: "textarea",
    showCancelButton: true,
    confirmButtonColor: "#1FAB45",
    confirmButtonText: "Save",
    cancelButtonText: "Cancel",
    buttonsStyling: true
      }).then(function () {       
          $.ajax({
              type:"POST",
              data:{del_id: del_id},
              cache: false,
              success: function(response) {
                  swal(
                  "Sccess!",
                  "Your note has been saved!",
                  "success"
                  )
              },
              failure: function (response) {
                  swal(
                  "Internal Error",
                  "Oops, your note was not saved.", 
                  "error"
                  )
              }
          });
      }, 
      function (dismiss) {
        if (dismiss === "cancel") {
          swal(
            "Cancelled",
              "Canceled Note",
            "error"
          )
        }
      })
    });
</script> -->

<!-- <script type="text/javascript">
$(".btn-delete").click(function(e){
    var del_id = $(this).attr('id');
        var $ele = $(this);

        $.ajax({
            type:"POST",
            data:{del_id: del_id},
            success: function(data){
              $ele.parent().parent().parent().parent().hide('slow');
            }
            
          });
        });
</script>  -->