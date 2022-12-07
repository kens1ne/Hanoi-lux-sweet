<?php
    function insert_comment($noidung, $iduser, $idpro, $ngaybinhluan)
    {
        $sql = "insert into comment(noidung, iduser, idpro, ngaybinhluan) value('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_comment($idpro) {
        // $sql = "select * from comment where idpro='".$idpro."' order by id desc";

        $sql="SELECT comment.*,user.username FROM comment INNER JOIN user ON comment.iduser = user.id WHERE idpro=$idpro order by id desc";

        // $sql="SELECT binh_luan.*,khach_hang.ho_ten FROM binh_luan INNER JOIN khach_hang ON binh_luan.ma_kh = khach_hang.id WHERE id_hh=$id_hh order by id desc";
        $listcomment = pdo_query($sql);
        return $listcomment;
    }



?>