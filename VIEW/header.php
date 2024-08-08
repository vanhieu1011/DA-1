<?php
    if (isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
        $html_account='
        
        <li><a href="admin/">'.$ten.'</a></li>
        <li><a href="index.php?pg=myaccount">Thông Tin Tài Khoản</a></li>
        <li><a href="index.php?pg=logout">Đăng Xuất</a></li>
        
        ' ;
       
       
    }else{
        $html_account='
        <li><a href="index.php?pg=dangnhap"><img src="LAYOUT/img/people/user.jpg" alt="" width="30px"></a></li>';
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EPIC FOOT</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./LAYOUT/style.css">
        <link rel="stylesheet" href="./LAYOUT/formmuahang/form.css">
        
    </head>

    <body>

        <section id="header">
            <a href="index.php"><img src="LAYOUT/img/logo1-removebg-preview.png" alt="" width="80px"></a>
            <div>
            <div class="timkiem" >
                            <form action="index.php?pg=sanpham" method="post" style="background-color: #ffff; border-radius: 40px;";>
                                <input type="text" name="kyw" placeholder="Bạn muốn tìm gì" style="width: 450px; height: 45px; padding: 16px; border-radius: 40px; border: 1px solid transparent;">
                                <button  type="submit" name="timkiem" value="Tìm Kiếm" style="width: 90px; height: 45px; background-color: #ffff; color: #000; white-space: nowrap; border-radius: 40px; border: 1px solid transparent;"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                <ul id="navbar">

                    <li><a class="active" href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?pg=sanpham">Cửa hàng</a></li>
                    <li><a href="index.php?pg=gioithieu">Giới thiệu</a></li>
                     <li><a href="#">Liên hệ</a></li>
                    <!--<li><a href="index.php?pg=dangnhap">Đăng nhập</a></li> -->

                    <div id="mobile">
                        <a href="index.php?pg=viewcart"><i class="fa-solid fa-bag-shopping"></i></a>
                        <i id="bar" class="fas fa-outdent"></i> <!-- icon cho menu cho mobile -->
                    </div>
                    
                    <div class="alo">
                    <li id="lg-bag" ><a href="index.php?pg=viewcart" ><i class="fa-solid fa-bag-shopping" style="font-size: 30px;";></i></a></li>
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>                         
                        <li><?=$html_account;?></li>
                    </div>
                    
                
                </ul>
            </div>
            
        </section>
        

