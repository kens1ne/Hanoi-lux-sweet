<?php
// hàm loadall
function loadAll_booking($id= 0)
{        
    $sql = "select * from booking where 1";
    if ($id > 0) {
        $sql .= " and id='" . $id. "'";
    }
    $listbooking = pdo_query($sql);
    return $listbooking;
}
function delete_booking($id)
{
    $sql = "delete from booking where id=" . $id;
    pdo_execute($sql);
}
?>