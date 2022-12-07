<?php
    session_start();
    require_once '../global.php';
    require_once '../dao/pdo.php';
    if(empty($_GET['action'])) {
        if(empty($_SESSION['admin'])){
            require('view/login.php');
        }else{
            $VIEW_NAME = 'view/home.php';
            include_once 'layout/index.php';
        }
    }elseif(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'login':
                if(isset($_POST['username']) && isset($_POST['password'])){
                    require_once '../dao/admin/admin_dao.php';
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $checkAdmin = check_admin($username, $password);
                    if(is_array($checkAdmin)) {
                        $_SESSION['admin'] = $checkAdmin;
                        echo json_encode(array('status' => true, 'msg' => 'Đăng nhập thành công !'));
                    } else {
                        echo json_encode(array('status' => false, 'msg' => 'Thông tin đăng nhập không chính xác !'));
                    }
                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
                }   
            break;
            case 'rooms':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/room_dao.php";
                    $roomList = room_list();
                    $VIEW_NAME = 'view/room.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
            case 'booking':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/booking_dao.php";
                    $bookingList = booking_list();
                    $VIEW_NAME = 'view/booking.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
            case 'approval':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/booking_dao.php";
                    $info = booking_info($_GET['id']);
                    $image = explode(",", $info['image']);
                    include_once 'view/approval_detail.php';
                }else{
                    header('Location: index.php');
                }   
            break;
            case 'approval_comfirm':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/booking_dao.php";
                    $id_booking_detail = $_POST['id_detail'];
                    $type_approval_detail = $_POST['type'];
                    booking_approval($id_booking_detail, $type_approval_detail);
                    echo json_encode(array('msg' => 'Cập nhật thành công !'));
                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
                } 
            break;
            case 'categories':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/category_dao.php";
                    $categoryList = category_list();
                    $VIEW_NAME = 'view/categories.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
            case 'services':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/service_dao.php";
                    $serviceList = service_list();
                    $VIEW_NAME = 'view/services.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
        }
    }

?>