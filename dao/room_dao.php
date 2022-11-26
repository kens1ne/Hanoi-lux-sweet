<?php
function rooms_list(){
    $query = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room GROUP BY storage_room.id_room";
    return pdo_query($query);
}

function room_search($start, $end, $quantity, $location = null){
    $sqlCheckRoom = "SELECT id_room FROM booking_detail WHERE start_date <= '$start' AND end_date >= '$end' OR start_date >= '$start' AND end_date <= '$end'";
    $checkRoom = pdo_query($sqlCheckRoom);
    $roomHas = [0];
    foreach($checkRoom as $value){
        array_push($roomHas, $value['id_room']);
    }
    if(empty($location)){
        $room = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room WHERE rooms.id NOT IN (".join(",",$roomHas).") AND rooms.quantity_people >= $quantity GROUP BY storage_room.id_room";
    }else{
        $room = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room WHERE rooms.id NOT IN (".join(",",$roomHas).") AND rooms.quantity_people >= $quantity AND rooms.address LIKE '%$location%' GROUP BY storage_room.id_room";    
    }
    return pdo_query($room);
}


?>