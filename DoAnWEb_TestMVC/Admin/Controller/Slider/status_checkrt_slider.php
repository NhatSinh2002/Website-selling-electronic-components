<?php

    include('../../Model/ModelAll.php');
    include("../../config/databse.php");
	include("../../config/site.php");


    // $controller = new Controller;
    $Model = new ModelAll;

    if(isset($_POST['id']) && isset($_POST['status'])){
        $tableName = $columnName = null;
        $tableName = 'slider';
        $columnName['tinhtrang'] =$_POST['status'];
        $whereValue['id'] = $_POST['id'];

        $statusSliderUpdate = $Model->updateData($tableName,  $columnName, $whereValue);
        // var_dump($statusProductUpdate);
        if($statusSliderUpdate==1){
            $Model->connection->commit();
            echo 1;
        }
        else{
            echo -1;
        }
    }



?>