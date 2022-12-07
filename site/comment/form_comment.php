<?php
    session_start();
    $idpro=$_REQUEST['idpro'];
    require_once('../../dao/pdo.php');
    require_once('../../dao/comment.php');
    
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user']['id'];
    }
    $dsbl=loadall_comment($idpro)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="comment">
        <h1>Bình luận</h1>
        <div class="sub-cmt">
            <ul>
                <table class="border-none">
                    <?php
                        foreach ($dsbl as $bl) {
                            extract($bl);
                            echo '<tr></tr><td>'.$noidung.'</td>';
                            echo '<td>'.$username.'</td>';
                            echo '<td>'.$ngaybinhluan.'</td></tr>';
                        }

                    ?>
                </table>
            </ul>
        </div>
        <?php
            if(isset($_SESSION['user'])) {
            ?>
                <div class="form-comment">
                    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="idpro" value="<?= $idpro?>">
                        <input type="text" name="noidung">
                        <input type="submit" name="send" value="Gửi bình luận">
                    </form>
                </div>
            <?php
            } else {
            ?>
                <div class="boxfooter binhluanfrom">
                    <p style="color: red;">Đăng nhập để thực hiện chức năng bình luận</p>
                </div>
            <?php } ?>
        <?php
        
        if(isset($_POST['send']) && ($_POST['send'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser=$_SESSION['user']['id'];
            $ngaybinhluan =date('h:i:sa d/m/Y');
            insert_comment($noidung, $iduser, $idpro, $ngaybinhluan);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }

        ?>
    </div>
</body>
</html>

