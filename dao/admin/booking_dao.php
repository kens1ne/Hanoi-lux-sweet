<?php
// hàm loadall
function booking_list(){
    $query = "SELECT booking_detail.id, booking.name_booking, booking.phone, booking.email, booking.total_price, booking.date, booking_detail.start_date, booking_detail.end_date, booking_detail.status, rooms.name AS room_name , user.username, category.name AS category FROM booking_detail 
    INNER JOIN booking ON booking_detail.id_booking=booking.id 
    INNER JOIN rooms ON booking_detail.id_room=rooms.id
    INNER JOIN user ON booking_detail.id_user=user.id
    INNER JOIN category ON rooms.id_cate=category.id";
    return pdo_query($query);
}
function booking_info($id_detail){
    $query = "SELECT booking_detail.id, booking.name_booking, booking.phone, booking.email, booking.total_price, booking.date, rooms.name, booking_detail.start_date, booking_detail.end_date, booking_detail.status, GROUP_CONCAT(storage_room.image) AS image 
    FROM booking_detail 
    INNER JOIN booking ON booking_detail.id_booking=booking.id 
    INNER JOIN rooms ON booking_detail.id_room=rooms.id
    INNER JOIN storage_room ON storage_room.id_room = booking_detail.id_room
    WHERE booking_detail.id=$id_detail
    GROUP BY storage_room.id_room
    ";
    return pdo_query_one($query);
}

function booking_approval($id_detail, $type){
    $sql = "UPDATE `booking_detail` SET `status`='$type' WHERE `id`='$id_detail'";
    pdo_execute($sql);
}
function delete_booking($id)
{
    $sql = "delete from booking where id=" . $id;
    pdo_execute($sql);
}
?>