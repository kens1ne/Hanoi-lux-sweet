<?php
include "header.php";
include "../dao/pdo.php";
include "../dao/category.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //Thêm danh mục - Category
        case 'addcate':
            // kiểm tra người dùng ấn thêm mới không
            if (isset($_POST['them_moi'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                insert_cate($name, $description);
                $thongbao ="Thêm thành công";
            }
            include "category/add.php";
            break;
        // Show category
        case 'listcate':
            
            $listcate = loadall();
            include "category/list.php";
            break;
        //Xóa category
        case 'xoacate':
            if (isset($_GET['id'])) {
                delete_cate($_GET['id']);
                $thongbao ="Xóa thành công";
            }
            $listcate = loadall();
            include "category/list.php";
            break;   
        // Sửa cate
        case 'suacate':
            if (isset($_GET['id'])) {
                $dm=loadone($_GET['id']);
            }
            include "category/update.php";
            break;  
        //Update cate    
        case 'updatecate':
            if (isset($_POST['capnhat'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $description = $_POST['description'];
                update_cate($id,$name, $description);
                $thongbao ="Cập nhật thành công";
            }
            $listcate = loadall();
            include "category/list.php";
            break;
        //--- Phần Quản lí phòng------//
        // case 'addroom':
        //     if (isset($_POST['themmoi'])) {
        //         $id_cate = $_POST['id_cate'];
        //         $name = $_POST['name'];
        //         $price = $_POST['price'];
        //         $description = $_POST['description'];
        //         $quantity_people = $_POST['quantity_people'];
        //         $status = $_POST['status'];
        //         insert_rooms($name, $price, $description, $quantity_people, $status, $id_cate);
        //     }
        //     $listcate = loadall();
        //     include "rooms/add.php";
        //     break;
        // //list rooms
        // case 'listroom':
        //     $listrooms = loadAll_rooms();
        //     include "rooms/list.php";
        //     break;
        // // xóa hàng hóa
        // case 'xoaroom':
            if (isset($_GET['id']) && ($_GET['id'] >= 0)) {
                delete_rooms($_GET['id']); // hàm xóa hàng hóa
            }
            $listrooms = loadAll_rooms("",0);
            include "rooms/list.php";
            break;
        default:
            include "layout.php";
            break;
    }
} else {
    include "layout.php";
} 
    include "footer.php";

?>