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
                    include "../dao/admin/category_dao.php";
                    $roomList = room_list();
                    $categoryList = category_list();
                    $VIEW_NAME = 'view/rooms.php';
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
                        $extension=array("jpeg","jpg","png","gif","webp");
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
            case 'room_info':
                if(isset($_SESSION['admin']) && $_GET['id']){
                    include "../dao/admin/room_dao.php";
                    $info = room_info($_GET['id']);
                    echo json_encode($info);
                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
                }
            break;
            case 'room_update':
                if(isset($_SESSION['admin']) && isset($_POST['room_id']) && isset($_POST['update_room'])){
                    include "../dao/admin/room_dao.php";
                    $id = $_POST['room_id'];
                    //xóa folder ảnh và dữ liệu ảnh trên dbd
                    if(file_exists("../public/upload/$id")){
                        delete_directory("../public/upload/$id");
                        remove_image($id);
                    }
                    // lấy thông tin update
                    $name = $_POST['room_name'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity_people'];
                    $address = $_POST['address'];
                    $description = $_POST['description'];
                    $category = $_POST['category'];
                    $status = $_POST['status'];
                    $update_room = update_room($id, $name, $price, $description, $address, $quantity, $category, $status);

                    $error=array();
                    mkdir("../public/upload/$id");
                    $extension=array("jpeg","jpg","png","gif","webp");
                    foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) {
                        $file_name=$_FILES["images"]["name"][$key];
                        $file_tmp=$_FILES["images"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

                        if(in_array($ext,$extension)) {
                            move_uploaded_file($file_tmp, "../public/upload/$id/".$file_name);
                            insert_image($id, "../public/upload/$id/$file_name");
                        }
                        else {
                            array_push($error,"$file_name, ");
                        }
                    }
                    echo json_encode(array('status' => true, 'msg' => 'Cập nhật thành công phòng: '.$name));

                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
                }
            break;
            case 'delete_room':
                if(isset($_SESSION['admin']) && $_POST['id_room']){
                    include "../dao/admin/room_dao.php";
                    $id = $_POST['id_room'];
                    delete_room($id);
                    echo json_encode(array('status' => true, 'msg' => 'Xóa phòng thành công !'));

                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
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
            case 'booking_detail':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/booking_dao.php";
                    $info = booking_info($_GET['id']);
                    $images = explode(',', $info['images']);
                    $VIEW_NAME = 'view/booking_detail.php';
                    include_once 'layout/index.php';
                }else{
                    header('Location: index.php');
                } 
            break;
            // danh sách danh mục
            case 'categories':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/category_dao.php";
                    if(isset($_POST['add_category'])){
                        $name = $_POST['category_name'];
                        $description = $_POST['description'];
                        insert_cate($name, $description);
                        echo json_encode(array('msg' => 'Thêm danh mục thành công !'));
                    }elseif(isset($_POST['delete_category'])){
                        $id = $_POST['id'];
                        delete_cate($id);
                        echo json_encode(array('status' => true, 'msg' => 'Xóa danh mục thành công !'));
                    }elseif(isset($_POST['edit_category'])){
                        $id = $_POST['id'];
                        $name = $_POST['category_name'];
                        $description = $_POST['description'];
                        update_cate($id, $name, $description);
                        echo json_encode(array('msg' => 'Sửa danh mục thành công !'));
                    }else{
                        $categoryList = category_list();
                        $VIEW_NAME = 'view/categories.php';
                        include_once 'layout/index.php';
                    }
                }else{
                    header('Location: index.php');
                }
            break;
            // danh sách dịch vụ
            case 'services':
                if(isset($_SESSION['admin'])){
                    include "../dao/admin/service_dao.php";
                    if(isset($_POST['add_service'])){
                        $name = $_POST['service_name'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        insert_service($name, $description, $price);
                        echo json_encode(array('msg' => 'Thêm danh mục thành công !'));
                    }elseif(isset($_POST['delete_service'])){
                        $id = $_POST['id'];
                        delete_service($id);
                        delete_service_room($id);
                        echo json_encode(array('status' => true, 'msg' => 'Xóa dịch vụ thành công !'));
                    }elseif(isset($_POST['edit_service'])){
                        $id = $_POST['id'];
                        $name = $_POST['service_name'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        update_service($id, $name, $description, $price);
                        echo json_encode(array('msg' => 'Sửa dịch vụ thành công !'));
                    }else{
                        $serviceList = service_list();
                        $VIEW_NAME = 'view/services.php';
                        include_once 'layout/index.php';
                    }
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
            case 'update_user':
                if(isset($_SESSION['admin']) && isset($_POST['id']) && isset($_POST['status'])){
                    include "../dao/admin/admin_dao.php";
                    update_user($_POST['id'], $_POST['status']);
                    echo json_encode(array('status' => true, 'msg' => 'Cập nhật thành công !'));
                }else{
                    echo json_encode(array('status' => false, 'msg' => 'Đã có lỗi xảy ra !'));
                }
            break; 
            // thống kê hệ thống
            case 'analytics':
                    include "../dao/admin/statistical.php";
                    $listuser = load_user();
                    $listrooms = load_room();
                    $listsum = load_sum();
                    $VIEW_NAME = 'view/analytics.php';
                    include_once 'layout/index.php';
            break;
        }
    }

?>