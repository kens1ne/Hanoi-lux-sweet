<?php
    require_once '../global.php';
    require_once '../dao/pdo.php';
    if(empty($_GET['action'])) {
        $VIEW_NAME = 'trang-chu.php';
    }elseif($_GET['action']){
        switch ($_GET['action']) {
            case 'detail':
                $VIEW_NAME = 'chi-tiet.php';
            break;            
        }
    }

    include_once './layout.php';

?>