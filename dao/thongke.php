<?php
function loadAll_thongke(){
    $sql = "select category.name, category.id, count(*) so_luong, min(rooms.price) price_min, max(rooms.price) price_max, avg(rooms.price) price_avg from rooms rooms join category category on category.id=rooms.id_cate group by category.id, category.name";
    $listthongke = pdo_query($sql);
    return $listthongke;
}
?>