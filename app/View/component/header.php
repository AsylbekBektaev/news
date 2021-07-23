<header>
<nav class="navbar navbar-expand-lg navbar-inverse  bg-inverse">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=index">Логотип</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mr-1 ml-1">
          <a class="nav-link" aria-current="page" href="index.php?page=index">Главная</a>
        </li>
        <li class="nav-item dropdown mr-1 ml-1">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Категории
          </a>
          <ul class="dropdown-menu category_items" aria-labelledby="navbarDropdown">
          <?php
                                if(!empty($_REQUEST["array"]["categories"]) && isset($_REQUEST["array"]["categories"])){
                                    // var_dump($_SESSION["array"]["categories"]);
                                    foreach($_REQUEST["array"]["categories"] as $val){
                                    ?>
        <a href="index.php?page=category&category=<?php echo $val["id"];?>"><li><?php echo $val["name"];?></li></a>
                                    <?php
                                    }
                                }
                                ?>
          </ul>
        </li>
        <li class="nav-item mr-1 ml-1">
          <a class="nav-link " aria-current="page" href="index.php?page=author">О нас</a>
        </li>
        <li class="nav-item mr-1 ml-1">
          <a class="nav-link " aria-current="page" href="index.php?page=contact">Контакты</a>
        </li>
      </ul>
      
    </nav>
  </div>
</nav>
</header>

