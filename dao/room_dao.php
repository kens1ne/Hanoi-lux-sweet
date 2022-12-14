<?php
function rooms_list(){
    $sqlCheckRoom = "SELECT id_room FROM booking_detail WHERE end_date > '".date("Y-m-d")."'";
    $checkRoom = pdo_query($sqlCheckRoom);
    $roomHas = [0];
    foreach($checkRoom as $value){
        array_push($roomHas, $value['id_room']);
    }
    $query = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room WHERE rooms.id NOT IN (".join(",",$roomHas).") AND rooms.status = 1 GROUP BY storage_room.id_room";
    return pdo_query($query);
}

function room_search($start, $end, $location = null){
    $sqlCheckRoom = "SELECT id_room FROM booking_detail WHERE start_date <= '$start' AND end_date >= '$end' OR start_date >= '$start' AND end_date <= '$end'";
    $checkRoom = pdo_query($sqlCheckRoom);
    $roomHas = [0];
    foreach($checkRoom as $value){
        array_push($roomHas, $value['id_room']);
    }
    if(empty($location)){
        $room = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room WHERE rooms.id NOT IN (".join(",",$roomHas).") GROUP BY storage_room.id_room";
    }else{
        $room = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room WHERE rooms.id NOT IN (".join(",",$roomHas).") AND rooms.address LIKE '%$location%' GROUP BY storage_room.id_room";    
    }
    return pdo_query($room);
}

function room_info($id) {
    $room = "SELECT rooms.*, GROUP_CONCAT(service_list.name) AS service_list , SUM(service_list.price) AS service_price
    FROM rooms INNER JOIN service ON rooms.id = service.id_room JOIN service_list ON service.id_service = service_list.id WHERE rooms.id = $id GROUP BY service.id_room";
    return pdo_query_one($room);
}

function room_image($id){
    $query = "SELECT * FROM `storage_room` WHERE `id_room` = $id";
    return pdo_query($query);
}

function room_booking($name, $phone, $price){
    $sql = "INSERT INTO `booking`(`name_booking`, `phone`, `total_price`) 
    VALUES ('$name', '$phone', '$price')";
    return pdo_execute($sql);
}
function insert_booking_detail($id_booking, $id_room, $id_user, $start_date, $end_date){
    $sql = "INSERT INTO `booking_detail`(`id_booking`, `id_room`, `id_user`, `start_date`, `end_date`, `status`) 
    VALUES ('$id_booking', '$id_room', '$id_user', '$start_date', '$end_date', 0)";
    return pdo_execute($sql);
}
function insert_rooms($name, $price, $description,$address, $quantity_people, $status, $id_cate)
{
    $sql = "insert into rooms(name, price, description,address, quantity_people, status, id_cate) 
    value('$name', '$price', '$description','$address', '$quantity_people', '$status', '$id_cate')";
    pdo_execute($sql);
}
// hàm xóa 
function delete_rooms($id)
{
    $sql = "delete from rooms where id=" . $id;
    pdo_execute($sql);
}
// hàm loadall
function loadAll_rooms($id= 0)
{        
    $sql = "select * from rooms where 1";
    if ($id > 0) {
        $sql .= " and id='" . $id. "'";
    }
    $listrooms = pdo_query($sql);
    return $listrooms;
}
// hàm load một sản phẩm trong danh sách phòng trong database
function loadOne_rooms($id)
{
    $sql = "select * from rooms where id=" . $id;
    $room = pdo_query_one($sql);
    return $room;
}
// hàm update một sản phẩm trong danh sách hàng hóa trong database
function  update_rooms($id,$name, $price, $description,$address, $quantity_people, $status, $id_cate)
{    
    $sql = "update rooms set name='" . $name . "', price='" . $price . "', description='" . $description . "', address='" . $address . "', quantity_people='" . $quantity_people . "', status='" . $status . "', id_cate='" . $id_cate . "' where id=" . $id;

    pdo_execute($sql);
}
function booking_history($id){
    $query = "SELECT * from booking_detail INNER JOIN booking ON booking.id = booking_detail.id_booking INNER JOIN rooms ON booking_detail.id_room = rooms.id WHERE booking_detail.id_user = $id";
    return pdo_query($query);
}
?>