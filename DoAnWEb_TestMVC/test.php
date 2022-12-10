<?php

    include('../../Model/ModelAll.php');
    include('../../Controller/Controller.php');
    include('../../Controller/EmployeeController.php');
    include("../../config/databse.php");
	include("../../config/site.php");

    $employeeCtroller = new EmployeeController;
    $controller = new Controller;
    $Model = new ModelAll;

    //encode
    $info_array = json_decode($_POST['other_data'], true);

    define ('SITE_ROOT', realpath(dirname(__FILE__)));

    foreach($info_array as $key=> $value) { 
        if($value ==" "){
            echo  0;
            exit();
        } 
    }

    $controller->connection->beginTransaction();

    //Lưu dữ liệu
    $tableName = $columnName = null;
    $tableName = 'taikhoan';
    $columnName['email'] = $info_array['email'];
    // $columnName['matkhau'] = sha1($employeeCtroller->randomPassword());
    $columnName['trangthai'] = $info_array['trangthai']; 
    $columnName['vaitro'] = $info_array['vaitro'];
    $whereValue['id'] = $info_array['id'];

    // var_dump($whereValue['id']);

    
    //Insert dữ  liệu vào bảng taikhoan sau đó lấy id mới nhất rồi tạo người dùng, 
    //nếu có lỗi xảy ra thì rollback
    //1  thành công
    $employeeUpdate = $Model->updateData($tableName, $columnName, $whereValue);
    // var_dump($employeeUpdate);
    if($employeeUpdate == 1  ){
        $tableName = $columnName = $whereValue =null;
        $tableName = 'nguoidung';
        $columnName['anh'] = "User_Employee_".date("YmdHis") ."_".$_FILES['file_arr']['name'];
        // $columnName['tenhienthi'] = $info_array['email'];
        $columnName['hoten'] = $info_array['hoten'];
        $columnName['gioitinh'] = $info_array['gioitinh'];
        $columnName['ngaysinh'] = $info_array['ngaysinh'];
        $columnName['sdt'] = $info_array['sdt'];
        $columnName['diachi'] = $info_array['diachi']; 
        $columnName['tinh_thanhpho'] = $info_array['tinh_thanhpho']; 
        $columnName['quan_huyen'] = $info_array['quan_huyen']; 
        $columnName['phuong_xa'] = $info_array['phuong_xa'];
        $whereValue['id_taikhoan'] = $info_array['id'];


        $updateEmployeeUser = $Model->updateData($tableName, $columnName, $whereValue );
        // var_dump( $updateEmployeeUser);
        if($updateEmployeeUser==1 && isset($_FILES['file_arr']['name']))
            {
                move_uploaded_file($_FILES['file_arr']['tmp_name'], $GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                var_dump($_FILES['file_arr']['tmp_name']);
                var_dump($GLOBALS['USER_DIRECTORY']. $columnName['anh']);
                var_dump($_FILES['file_arr']['error']);
                echo 1;
            }
        else{
            $controller->connection->rollBack();
            echo -1;
        }
    }
    else if($employeeUpdate==0){
            echo 2;
    }
    else
    {
        $controller->connection->rollBack();

        echo -1;
    }
    
?>