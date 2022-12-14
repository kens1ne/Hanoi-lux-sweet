<?php
function load_user(){
    // $sql = "select category.name, category.id, count(*) so_luong, min(rooms.price) price_min, max(rooms.price) price_max, avg(rooms.price) price_avg from rooms rooms join category category on category.id=rooms.id_cate group by category.id, category.name";
    $sql = "select user.id, count(*) as tong from user";
    $listuser = pdo_query($sql);
    return $listuser;
}

function load_room() {
    $sql = "select rooms.id, count(*) as room from rooms";
    $listrooms = pdo_query($sql);
    return $listrooms;
}

function load_sum() {
    $sql = "select sum(total_price) as sum from booking";
    $listsum = pdo_query($sql);
    return $listsum;
}
?>