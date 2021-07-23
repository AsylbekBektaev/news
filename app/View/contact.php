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
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Контакты </h2>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?page=index">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Контакты</a></li>
                        </ol>
                    </div>                   
                </div>
            </div>
        </div>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h1>О нас</h1>
                                    <p>текст о нас</p>
                   
                                    <h1>Что вы у нас найдете?</h1>
                                    <p>найдете текст</p>
             
                                    <h4>Контакты</h4>
                                    <p>email@email.com</p>
                                </div>
                                <div class="col-lg-7">
                                    <form class="form-wrapper">
                                        <h1>Напишите нам</h1>
                                        <input type="text" class="form-control" placeholder="Ф.И.О"  autocomplete="off" required >
                                        <input type="text" class="form-control" placeholder="Эл-почта" autocomplete="off" required >
                                        <input type="text" class="form-control" placeholder="Контактный номер" autocomplete="off" required >
                                        <input type="text" class="form-control" placeholder="Должность" autocomplete="off" required >
                                        <textarea class="form-control" placeholder="Сообщение" autocomplete="off" required ></textarea>
                                        <button type="submit" class="btn btn-primary">Отправить <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
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
    <script async src="js/bootstrap.min.js" ></script>
    <script async src="https://kit.fontawesome.com/6c6d057747.js" crossorigin="anonymous"></script>
</body>
</html>