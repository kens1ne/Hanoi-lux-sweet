<?php
    session_start();
    require_once '../global.php';
    require_once '../dao/pdo.php';
    require_once '../dao/user.php';
    if(empty($_GET['action'])) {
        require_once '../dao/room_dao.php';
        $rooms = rooms_list();
        $VIEW_NAME = 'home.php';
    }elseif(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'detail':
                require_once '../dao/room_dao.php';
                $id_room = $_GET['id'];
                $info = room_info($id_room);
                $room_image = room_image($id_room);
                $services = explode(",", $info['service_list']);
                $VIEW_NAME = 'detail.php';
            break;  
            case 'search':
                if(empty($_GET['start_date']) || empty($_GET['end_date']) || date("Y-m-d") > $_GET['start_date']){
                    header("location: index.php");
                }else{
                    require_once '../dao/room_dao.php';
                    $start_date = $_GET['start_date'];
                    $end_date = $_GET['end_date'];
                    if(isset($_GET['location'])) {
                        $location = $_GET['location'];
                        $rooms = room_search($start_date, $end_date, $location);
                    }else{
                        $rooms = room_search($start_date, $end_date);
                    }
                    $VIEW_NAME = 'search.php';
                }
            break;
            case 'profile':
                if(isset($_SESSION['user'])) {
                require_once '../dao/room_dao.php';
                $booking = booking_history($_SESSION['user']['id']);
                $VIEW_NAME = 'profile.php';
            }else{
                header('location: index.php?action=login');
            }
            break;
            case 'booking':
                if(isset($_SESSION['user'])) {
                    require_once '../dao/room_dao.php';
                    $id_room = $_GET['id_room'];
                    $start_date = strtotime($_GET['start_date']);
                    $end_date = strtotime($_GET['end_date']);
                    if(room_check($id_room, $_GET['start_date'], $_GET['end_date']) == true){
                        $msg = "Phòng không khả dụng trong ngày này";
                        header('location: index.php?action=detail&id='.$id_room.'&start_date='.$_GET['start_date'].'&end_date='.$_GET['end_date'].'&msg='.$msg); 
                    }else{
                        $service = service_room($id_room);
                        $info = room_info($id_room);
                        $day_booking = ($end_date - $start_date) / 86400;
                        $room_image = room_image($id_room);
                        $VIEW_NAME = 'booking.php';
                    }
                }else{
                    header('location: index.php?action=login');
                }
            break;
            case 'comfirm':
                if(isset($_SESSION['user'])) {
                    require_once '../dao/room_dao.php';
                    if(isset($_POST['comfirm_booking'])){
                        $id_room = $_POST['room_id'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $total = $_POST['total'];
                        $bank_type = $_POST['bank'];
                        $insert_booking = room_booking($name, $phone, $total);
                        insert_booking_detail($insert_booking, $id_room, $_SESSION['user']['id'], $start_date, $end_date);
                        if($bank_type == "tructiep"){
                            header('location: index.php?action=success');
                        }elseif($bank_type == "banking"){
                            header('location: index.php?action=banking&price='.$total.'&content='.$_SESSION['user']['username'].'_'.$phone);
                        }
                    }

                }else{
                    header('location: index.php?action=login');
                }
            break;
            case 'success':
                $VIEW_NAME = 'success.php';
                break;
            case 'order':
                require_once '../dao/room_dao.php';
                $order = booking_detail($_GET['id'], $_SESSION['user']['id']);
                $VIEW_NAME = 'detail-order.php';
                break;
            
            case 'banking': 
                $VIEW_NAME = 'banking.php';
                break;
            case 'register':
                if(isset($_POST['register']) && ($_POST['register'])) {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    insert_user($name, $username, $phone, $email, $password);
                    $thongbao = "đăng ký thành công!";
                }
                $VIEW_NAME = './user/register.php';
                break;
            case 'login': 
                if(isset($_POST['login'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $check_user=check_user($user, $pass);
                    if(is_array($check_user)) {
                        $_SESSION['user']=$check_user;
                        $thongbao = "Đăng đăng nhập thành công!";
                        header('location: index.php');
                    } else {
                        $thongbao= "Tài khoản không tồn tại!";
                    }
                }
                $VIEW_NAME = './user/login.php';
                break;
            case 'out':
                session_unset();
                header('location: index.php');
                break;
        }
    }

    include_once './layout.php';

?>