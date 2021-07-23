<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_REQUEST["array"]["article"][0]["title"]?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/version/tech.css">
    <meta property="og:url" content="http:/localhost/news/index.php?page=single&news=<?php echo $_REQUEST["array"]["article"][0]["id"];?>"/>
    <meta property="og:title" content="<?php echo $_REQUEST["array"]["article"][0]["title"]?>"/>
    <meta property="og:image" content="<?php echo $_REQUEST["array"]["article"][0]["imgsrc"]?>"/>
    <meta property="og:description" content="<?php echo $_REQUEST["array"]["article"][0]["text1"]?>"/>
    <meta property="og:type" content="article">
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

        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php?page=index">Главная</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="index.php?page=category&category=<?php echo $_REQUEST["array"]["article"][0]["category"];?>" id="category"><?php echo $_REQUEST["array"]["article"][0]["name"];?></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="index.php?page=single&news=<?php echo $_REQUEST["array"]["article"][0]["id"];?>">
                                        <?php echo $_REQUEST["array"]["article"][0]["title"];?>
                                    </a>
                                    </li>
                                </ol>
                                <!-- <span class="color-orange"><a href="#" id="category"><?php echo $_REQUEST["array"]["article"][0]["name"];?></a></span> -->

                                <h3><?php echo $_REQUEST["array"]["article"][0]["title"];?></h3>

                                <div class="blog-meta big-meta">
                                    <small></small>
                                    <?php echo $_REQUEST["array"]["article"][0]["author"];?>
                                    <small></small>
                                    <i class="fa fa-eye"></i> <?php echo $_REQUEST["array"]["article"][0]["view"];?>
                                    <small></small>
                                    <i class="far fa-comment"></i> <?php  echo count($_REQUEST["array"]["comments"]);?>
                                </div>

                            

                            <div class="ya-share2" data-curtain data-color-scheme="whiteblack" data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,moimir,skype,linkedin"></div>
                            </div>

                            <div class="single-post-media" style="width:fit-content;height:fit-content;margin:0 auto;border:solid 1px black;">
                               <?php
                                if(file_exists($_REQUEST["array"]["article"][0]["imgsrc"])){
                                ?> 
                                <img style="width:100%;height:100%;object-fit:none;"
                                src="<?php echo $_REQUEST["array"]["article"][0]["imgsrc"];?>"
                                alt="<?php echo $_REQUEST["array"]["article"][0]["alt"];?>"
                                class="img-fluid">
                                <?php }else{?>
                                    <img style="width:100%;height:100%;object-fit:none;"
                                src="images/no.jpg"
                                alt="<?php echo $_REQUEST["array"]["article"][0]["alt"];?>"
                                class="img-fluid">
                                <?php }?>
                            </div>

                            <div class="blog-content">  
                                <div class="pp">
                                    <p><?php echo $_REQUEST["array"]["article"][0]["text1"];?></p>
                                    <p><?php echo $_REQUEST["array"]["article"][0]["linetext"];?></p>
                                    <p><?php echo $_REQUEST["array"]["article"][0]["text2"];?></p>
                                    <input id="news_id" type="hidden" value="<?php echo $_REQUEST["array"]["article"][0]["id"];?>">
                                </div>
                            </div>

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">

                                    <?php 
                                    if(!empty($_REQUEST["array"]["prev_article"])){
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="index.php?page=single&news=<?php echo $_REQUEST["array"]["prev_article"][0]["id"];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="<?php 
                                                            if(file_exists($_REQUEST["array"]["prev_article"][0]["imgsrc"])){
                                                                echo $_REQUEST["array"]["prev_article"][0]["imgsrc"];
                                                            }else{
                                                                echo "images/no.jpg";
                                                            }
                                                        ?>" alt="<?php echo $_REQUEST["array"]["prev_article"][0]["alt"];?>" class="img-fluid float-right">
                                                        <h1 class="mb-1"><?php echo $_REQUEST["array"]["prev_article"][0]["title"];?></h1>
                                                        <span>Предыдущая статья</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                    <div style="width:50%;"></div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if(!empty($_REQUEST["array"]["next_article"])){
                                    ?>
                                      <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="index.php?page=single&news=<?php echo $_REQUEST["array"]["next_article"][0]["id"];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="<?php 
                                                        if(file_exists($_REQUEST["array"]["next_article"][0]["imgsrc"])){
                                                            echo $_REQUEST["array"]["next_article"][0]["imgsrc"];
                                                        }else{
                                                            echo "images/no.jpg";
                                                        }
                                                        ?>" alt="<?php echo $_REQUEST["array"]["next_article"][0]["alt"];?>" class="img-fluid float-left">
                                                        <h1 class="mb-1"><?php echo $_REQUEST["array"]["next_article"][0]["title"];?></h1>
                                                        <span>Следующая статья</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div><!-- end row -->
                            </div>


                            

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h1 class="small-title">Вам также может понравиться</h1>
                                <div class="row">
                                    <?php 
                                    if(isset( $_REQUEST["array"]["random_also_2"]) && !empty($_REQUEST["array"]["random_also_2"])){
                                    foreach( $_REQUEST["array"]["random_also_2"] as $key=>$val){
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="index.php?page=single&news=<?php echo $val["id"];?>" title="<?php echo $val["title"];?>">
                                                    <img src="<?php 
                                                    if(file_exists( $val["imgsrc"])){
                                                        echo $val["imgsrc"];
                                                    }else{
                                                        echo "images/no.jpg";
                                                    }
                                                    ?>" alt="<?php echo $val["alt"];?>" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="blog-meta">
                                                <h1>
                                                <a id="Also_item" 
                                                href="index.php?page=single&news=<?php echo $val["id"];?>" 
                                                title="<?php echo $val["title"];?>">
                                                <?php echo $val["title"];?></a></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h1 class="small-title"><?php  echo count($_REQUEST["array"]["comments"])."   Коментариев";?></h1>
                                <div class="row over_comment">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                        <?php
                                        if(isset($_REQUEST["array"]["comments"]) && !empty($_REQUEST["array"]["comments"])){
                                            $mas=$_REQUEST["array"]["comments"];
                                            for($i=0;$i<count($mas);$i++){
                                                ?>
                                                <div class="media">
                                                <div class="media-body">
                                                    <h1 class="media-heading user_name"><?php echo $mas[$i]["name"] . " ";?> - <?php echo  " ".$mas[$i]["date"];?></h1>
                                                    <p><?php echo $mas[$i]["text"];?></p>
                                                </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h1 class="small-title">Оставить коментарии</h1>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper">
                                            <input autocomplete="off" type="text" id="user_name" class="form-control" placeholder="Имя" required>
                                            <input autocomplete="off" type="email" id="user_email" class="form-control" placeholder="Эл-почта" required>
                                            <textarea autocomplete="off" id="comment" class="form-control" placeholder="Коментарии" required></textarea>
                                            <button id="addCom" type="button" class="btn btn-primary">Оставить коментарии</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                            REKLAMA
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

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
                                            <h1><a href="index.php?page=single&news=<?php echo $val["id"];?>" title="<?php echo $val["title"];?>"><?php echo $val["title"];?></a></h1>
                                        </div>
                                    </div>
                                    <hr class="invis">
                                        <?php } } ?>
                                    
                                </div><!-- end videos -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Рандомные Коментарии</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php 
                                    if(isset( $_REQUEST["array"]["comments_last_5"]) && !empty( $_REQUEST["array"]["comments_last_5"])){
                                        foreach( $_REQUEST["array"]["comments_last_5"] as $key=>$val){ ?>
                                            <a href="index.php?page=single&news=<?php echo $val["newsid"];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <h1 class="mb-1"><?php echo $val["name"];?> - <?php echo $val["date"];?></h1>
                                                <p><?php echo $val["text"];?></p>
                                            </div>
                                        </a>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>

                            <div class="widget">
                            REKLAMA
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
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
<script defer src="https://yastatic.net/share2/share.js"></script>
<script defer type="text/javascript">
function addComment(id){
    var user_name=document.getElementById("user_name").value
    ,user_email=document.getElementById("user_email").value,
    news_id=document.querySelector("#news_id").value,comment=document.getElementById("comment").value;
    if(user_name,user_email,news_id,comment){
        var requestOptions = {
        method: 'GET',
        redirect: 'follow'
        },data="?news_id="+ news_id +"&user_name="+ user_name +"&user_email="+ user_email +"&text="+ comment +"&comment=addComment";
        fetch("index.php"+data, requestOptions)
        .then(result => result.text())
        .then((result) =>{})
        .catch(error => console.log('error', error));
        document.getElementById("user_name").value="";
        document.getElementById("user_email").value="";
        document.querySelector("#news_id").value="";
        document.getElementById("comment").value="";
        setTimeout(()=>{
        window.location.reload();
        },250);
    }
}
var requestOptions = {
method: 'GET',
redirect: 'follow'
},id=document.querySelector("#news_id"),data="?id="+ id.value +"&view=addView",cli=document.getElementById("addCom");
fetch("index.php"+data, requestOptions)
.then(response => response.text())
// .then(result => console.log(result))
.catch(error => console.log('error', error));
cli.addEventListener("click",addComment);
</script>
</body>
</html>