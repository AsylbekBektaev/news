<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tech Blog - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/version/tech.css">
    <!-- [if lt IE 9]
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    [endif] -->

</head>
<body>

    <div id="wrapper">
        <?php 
        require_once "component/header.php";
        ?>

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-star bg-orange"></i> О нас</h2>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?page=index">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">О нас</a></li>
                        </ol>
                    </div>                   
                </div>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                           <h1>О нас</h1>
                           <p>текст о нас</p>
                        </div>

                        <hr class="invis">
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                            <div class="widget">
                            REKLAMA
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="widget">
                                <h2 class="widget-title">Популярные статьи</h2>
                                <div class="trend-videos">
                                <?php 
                                    if(isset( $_REQUEST["array"]["random_news_popular"]) && !empty( $_REQUEST["array"]["random_news_popular"])){
                                    foreach($_REQUEST["array"]["random_news_popular"] as $key=>$val){
                                        ?>
                                        <div class="blog-box">
                                        <div class="post-media">
                                            <a href="index.php?page=single&news=<?php echo $val["id"];?>" title="<?php echo $val["title"];?>">
                                                <img src="<?php
                                                if(file_exists($val["imgsrc"])){
                                                echo $val["imgsrc"];
                                                }else{
                                                echo "images/no.jpg";
                                                }
                                                ?>" alt="<?php echo $val["alt"];?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-meta">
                                            <h1><a id="Also_item" href="index.php?page=single&news=<?php echo $val["id"];?>" title="<?php echo $val["title"];?>"><?php echo $val["title"];?></a></h1>
                                        </div>
                                    </div>
                                    <hr class="invis">
                                        <?php
                                    }
                                    }
                                    ?>
                                    
                                </div>
                            </div>


                            <div class="widget">
                                <h2 class="widget-title">Рандомные Коментарии</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php 
                                    if(isset( $_REQUEST["array"]["comments_last_5"]) && !empty( $_REQUEST["array"]["comments_last_5"])){
                                        foreach( $_REQUEST["array"]["comments_last_5"] as $key=>$val){
                                        ?>
                                            <a href="index.php?page=single&news=<?php echo $val["newsid"];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <h1 class="mb-1"><?php echo $val["name"];?>  <small> - <?php echo $val["date"];?></small></h1>
                                                <p><?php echo $val["text"];?></p>
                                            </div>
                                        </a>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php 
        require_once "component/footer.php";
        ?>

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script async src="js/bootstrap.min.js" ></script>
    <script async src="https://kit.fontawesome.com/6c6d057747.js" crossorigin="anonymous"></script>
</body>
</html>