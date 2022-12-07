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
            // đăng nhập
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
            // danh sách phòng
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
            case 'add_room':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/service_dao.php";
                    include "../dao/admin/category_dao.php";
                    include "../dao/admin/room_dao.php";
                    if(isset($_POST['add_room'])){
                        $room_name = $_POST['room_name'];
                        $price = $_POST['price'];
                        $quantity = $_POST['quantity_people'];
                        $address = $_POST['address'];
                        $description = $_POST['description'];
                        $category = $_POST['category'];
                        $insert_room = insert_room($room_name, $price, $description, $address, $quantity, $category);
                        for($i = 0; $i < count($_POST['service']); $i++){
                            insert_service_room($_POST['service'][$i], $insert_room);
                        }
                        $error=array();
                        $extension=array("jpeg","jpg","png","gif");
                        mkdir("../public/upload/$insert_room", 0700);
                        foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) {
                            $file_name=$_FILES["images"]["name"][$key];
                            $file_tmp=$_FILES["images"]["tmp_name"][$key];
                            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                            if(in_array($ext,$extension)) {
                                move_uploaded_file($file_tmp, "../public/upload/$insert_room/".$file_name);
                                insert_image($insert_room, "../public/upload/$insert_room/$file_name");
                            }
                            else {
                                array_push($error,"$file_name, ");
                            }
                        }
                        echo json_encode(array('status' => true, 'msg' => 'Thêm thành công phòng '.$room_name));
                    }else{
                        $categoryList = category_list();
                        $serviceList = service_list();
                        $VIEW_NAME = 'view/room_add.php';
                        include_once 'layout/index.php';
                    }
                }else{
                    header('Location: index.php');
                }
            break;
            // duyệt đơn + danh sách đơn
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
                    include_once 'view/modal/approval_detail.php';
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
            // danh sách danh mục
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
            // danh sách dịch vụ
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
            // danh sách người dùng
            case 'users':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/admin_dao.php";
                    $userList = user_list();
                    $VIEW_NAME = 'view/users.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
            // thống kê hệ thống
            case 'analytics':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/admin_dao.php";
                    $userList = user_list();
                    $VIEW_NAME = 'view/users.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                }
            break;
        }
    }

?>