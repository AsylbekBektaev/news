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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <h2><i class="fa fa-star bg-orange"></i> 
                        <?php 
                        if(!empty($_SESSION["array"]["category_name"]) && isset($_SESSION["array"]["category_name"])){
                            echo $_SESSION["array"]["category_name"][0]["name"];
                        }
                        ?> 
                        </h2>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?page=index">Главная</a></li>
                            <li class="breadcrumb-item">
                            <?php 
                        if(!empty($_SESSION["array"]["category_name"]) && isset($_SESSION["array"]["category_name"])){
                        ?>
                            <small class="firstsmall">
                            <a href="#" id="category" title="<?php echo $_SESSION["array"]["category_name"][0]["name"];?>">
                            <?php echo $_SESSION["array"]["category_name"][0]["name"];?></a>
                            </small>
                        <?php
                        }
                        ?> </li>
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
                            <div class="blog-list clearfix">
                            <?php
                            if(isset($_REQUEST["array"]["news_item_all"]) && !empty($_REQUEST["array"]["news_item_all"])){
                            $ar=$_REQUEST["array"]["news_item_all"]["result"];
                            for($i=0;$i<count($ar);$i++){ ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="index.php?page=single&news=<?php echo $ar[$i]["id"];?>" title="<?php echo $ar[$i]["title"];?>">
                                                <img src="<?php 
                                                if(file_exists($ar[$i]["imgsrc"])){
                                                    echo $ar[$i]["imgsrc"];
                                                }else{
                                                    echo "images/no.jpg";
                                                }
                                                ?>" alt="<?php echo $ar[$i]["alt"];?>" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="blog-meta big-meta col-md-8">
                                        <div class="title_block">
                                        <h1><a href="index.php?page=single&news=<?php echo $ar[$i]["id"];?>" title="<?php echo $ar[$i]["title"];?>"><?php echo $ar[$i]["title"];?></a></h1>
                                        </div>
                                        <p><?php echo $ar[$i]["text1"];?></p>
                                        <small class="firstsmall">
                                        <a href="index.php?page=category&category=<?php echo $ar[$i]["category"];?>" class="bg-orange" title="<?php echo $ar[$i]["title"];?>">
                                        <?php echo $ar[$i]["name"];?></a>
                                        </small>
                                        <small></small>
                                        <a title="" href="index.php?page=single&news=<?php echo $ar[$i]["id"];?>"><?php echo $ar[$i]["author"];?></a>
                                        <small></small>
                                        <a href="index.php?page=single&news=<?php echo $ar[$i]["id"];?>" title="<?php echo $ar[$i]["title"];?>"><i class="fa fa-eye"></i> <?php echo $ar[$i]["view"];?></a>
                                        <small></small>
                                        <a  href="index.php?page=single&news=<?php echo $ar[$i]["id"];?>" title="<?php echo $ar[$i]["title"];?>">
                                        <i class="far fa-comment"></i> <?php
                                        if(isset($_REQUEST["array"]["comments_count_all"])){
                                        $counts_comments=$_REQUEST["array"]["comments_count_all"];
                                        $flag=true;
                                        for($y=0;$y<count($counts_comments);$y++){
                                        if((int)$ar[$i]["id"] === (int)$counts_comments[$y]["newsid"]){
                                            echo $counts_comments[$y]["count_comments"];
                                            $flag=false;
                                        }
                                        }
                                        if($flag){
                                            echo "0";
                                        }
                                        }
                                    ?>
                                        </a>
                                    </div>
                                </div>
                                <hr class="invis">
                                <?php
                                }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    
                                    <?php
                                    for ($i=0;$i<(int)$_REQUEST["array"]["news_item_all"]["total_page"];$i++){
                                        ?>
                                        <li class="page-item">
                                        <a class="page-link"
                                            <?php
                                                if((isset($_REQUEST["pageno"]) && !empty($_REQUEST["pageno"])) && (int)$_REQUEST["pageno"] === $i+1){
                                                    ?>
                                                    style="color:white !important; background: rgba(0, 0, 0, 0) linear-gradient(to right, #0091e5 0px, #00b7e5 0%) repeat scroll 0 0 !important;"
                                                    <?php
                                                }else if($i+1 == 1 && ( empty($_REQUEST["pageno"]) && !isset($_REQUEST["pageno"]))){
                                                    ?>
                                                style="color:white !important; background: rgba(0, 0, 0, 0) linear-gradient(to right, #0091e5 0px, #00b7e5 0%) repeat scroll 0 0 !important;"
                                                    <?php
                                                }
                                            ?>
                                            href="index.php?pag=<?php echo $i+1;?>&page=category&category=<?php 
                                        if(!empty($_REQUEST["array"]["news_item_all"]["result"][0]) &&
                                        isset($_REQUEST["array"]["news_item_all"]["result"][0])){
                                        echo $_REQUEST["array"]["news_item_all"]["result"][0]["category"];
                                        }?>"><?php echo $i+1;?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                            <h1 class="search_text">Поиск по категории: <?php  if(!empty($_SESSION["array"]["category_name"]) && isset($_SESSION["array"]["category_name"])){
                            echo $_SESSION["array"]["category_name"][0]["name"];
                            }?></h1>
                            <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Название статьи" aria-label="Search">
                            <button  id="serching_button" type="submit">Поиск</button>
                            </form>
                            </div>
                         
                            
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
                    </div>
                </div>
            </div>
        </section>

        <?php 
        require_once "component/footer.php";
        ?>

        <div class="dmtop">Scroll to Top</div>
        
    </div>
<!-- JavaScript Bundle with Popper -->
<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script async src="https://kit.fontawesome.com/6c6d057747.js" crossorigin="anonymous"></script>
</body>
</html>