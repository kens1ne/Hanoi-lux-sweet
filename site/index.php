<?php
    require_once '../global.php';
    require_once '../dao/pdo.php';
    
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
                $VIEW_NAME = 'detail.php';
            break;
            case 'search':
                if(empty($_GET['start_date']) || empty($_GET['end_date']) || empty($_GET['quantity'])){
                    header("location: index.php");
                }else{
                    require_once '../dao/room_dao.php';
                    $start_date = $_GET['start_date'];
                    $end_date = $_GET['end_date'];
                    $quantity = $_GET['quantity'];
                    if(isset($_GET['location'])) {
                        $location = $_GET['location'];
                        $rooms = room_search($start_date, $end_date, $quantity, $location);
                    }else{
                        $rooms = room_search($start_date, $end_date, $quantity);
                    }
                    $VIEW_NAME = 'search.php';
                }
            break;             
        }
    }

    include_once './layout.php';

?>