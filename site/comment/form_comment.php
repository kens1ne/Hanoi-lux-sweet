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
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>
<style>
    input::placeholder {
        color: #ccc;
    }
    .nav-comment h3 {
        font-size:17px;
        font-weight: 600;
        color: #385898;
    }
    .nav-comment p {
        font-size:14px;
        color: #000;
        margin: 0;
    }
    .nav-comment span {
        font-size:12px;
        color: #000;
    }
    .nav-comment span a {
        font-size:14px;
        color: #000;
        text-decoration: none;
    }
    .all-comment {
        background: #fff;
        display: inline-block;
        border: solid 1px #ccc;
        width: 67%;
    }
    .all-comment input {
        border: none;
        outline: none;
    }
    .all-comment .msg {
        width: 80%;
    } 
    .all-comment .send {
        /* display: block; */
        margin-left: 85%;
        background-color: #4267b2;
        color: #fff;
        font-weight: 600;
        font-family: sans-serif;
        font-size: 13px;
        padding: 5px;
        border-radius: 4px;
    }
    .all-msg {
        border-top: solid 1px #ccc;
        background: #f5f6f7;
        padding: 10px;
    }
    .nav-comment #input1 {
        border: none;
        background-color: #fdfaf0;
        width: 26px;
        font-size: 16px;
        pointer-events: none;
    }
    #likebtn {
        border: none;
        background-color: #fdfaf0;
        font-size: 15px;
        padding: 0;
    }
    #likebtn:active {
        color: #004eff;
        transform: scale(1.2);
    }
</style>
<body>
    <div class="comment">
        <h1>Bình luận</h1>
        <div class="sub-cmt">
            <div class="nav-comment">
                    <?php
                        foreach ($dsbl as $bl) {
                            extract($bl);
                            echo '<h3>'.$username.'</h3>';
                            echo '<p>'.$noidung.'</p>';
                            echo '<span><button class="like" id="likebtn"><i class="heart fa fa-thumbs-up"></i></button><input type="number" id="input1" value="0" name=""></span> '.$ngaybinhluan.'</input></tr>';
                        }

                    ?>
            </div>
        </div>
        <?php
            if(isset($_SESSION['user'])) {
            ?>
                <div class="form-comment">
                    <form class="all-comment" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="idpro" value="<?= $idpro?>">
                        <div style="padding: 20px 10px;">
                            <input class="msg" type="text" name="noidung" placeholder="Viết bình luận..."> <br>
                        </div>
                        <div class="all-msg" >
                            <input class="send" type="submit" name="send" value="Gửi bình luận">
                        </div>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <div class="boxfooter binhluanfrom">
                    <p style="color: #385898;">Đăng nhập để bình luận</p>
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
    <script>
        let likebtn = document.querySelector('#likebtn');
        let input1 = document.querySelector('#input1');

        likebtn.addEventListener('click', ()=>{
            input1.value = parseInt(input1.value) + 1;
        })
    </script>

    <!-- <script>
        $(document).ready(function() {
            $("content").click(function() {
                $("content").toggleClass("heart-active")
            });
        });
    </script> -->
</body>
</html>

