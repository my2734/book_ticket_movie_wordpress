<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive travel website design tutorial</title>

    <!-- font awesome cdn link  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"> -->

    <!-- custom js file link  -->
    <!-- <script src="js/script.js" defer></script> -->

    <?php wp_head() ?>

    <style>
        #primary_menu  {
            display: inline-flex !important;
            list-style: none !important;
        }
        .text{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
                    line-clamp: 2; 
            -webkit-box-orient: vertical;
        }

        .image-singer img{
            width: 100% !important;
            height: 100% !important;
        }

        .custom_span{
            font-size: 16px !important;
            text-transform: none;
        }

        .custom-chair{
            /* height: 30px;
            width: 30px; */
            /* background: red; */
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
            padding: 10px;
            margin-right: 0px;
            margin-bottom: 10px;
            color: white;
        }

        .custom-chair-vip{
            background-color: #00FF7F;	
        }

        .custom-chair-normal{
            background-color: #800000;	
        }

        .custom-chair-disable{
            background-color: #800000;	
        }
    </style>

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> <i class="fas fa-paper-plane"></i>travel </a>

    <nav class="navbar">
        <!-- <a data-aos="zoom-in-left" data-aos-delay="300" href="#home">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="#about">about</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="#destination">destination</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#services">services</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="#gallery">gallery</a>
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="#blogs">blogs</a> -->

        <?php wp_nav_menu(  //hàm get menu
            array( 
                'theme_location' => 'primary_menu', //là id menu mà bạn muốn lấy, ở trường hợp này mình lấy id mà mình vừa khởi tạo ở trên
                'container' => 'true', // là thẻ div bao bọc bên ngoài menu có hay không 
                'menu_id' => 'primary_menu', // id của thẻ ul khi hiển thị menu
                'menu_class' => 'menu_class' //là class của thẻ ul khi hiển thị menu
            ) 
        ); ?>
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="#book-form" class="btn">book now</a>

</header>