<?php
    function loadAll_thongke(){
        $sql = "select loai.ten_loai, loai.id_loai, count(*) so_luong, min(hh.don_gia) gia_min, max(hh.don_gia) gia_max, avg(hh.don_gia) gia_avg from hang_hoa hh join loai loai on loai.id_loai=hh.id_loai group by loai.id_loai, loai.ten_loai";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }
?>