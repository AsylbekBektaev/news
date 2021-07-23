<?php
session_start();
if(!empty($_SESSION["admin"]))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <title>Document</title>
    <style>
    td,th{
      border: 1px solid black;
      text-align:center;
      font-size:18px;
    }
    .buttons_ddd{
      display:flex;
      flex-direction: column;
      color:black;
      font-size:20px;
      /* flex-direction:column; */
    }
        /* .item_nav{
            display: flex;
            list-style: none;
        }
        .item_nav li{
            width:auto;height:auto;
            background-color:white;
            color:black;
            border-bottom:solid 5px black;
            font-size:22px;
            text-align:center;
            margin:10px 5px;
        }
        .item_nav li:hover{
            width:auto;height:auto;
            background-color:green;
            color:black;
            border-bottom:solid 5px green;
            font-size:22px;
            text-align:center;
            margin:10px 5px;
        } */
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container" style="display:flex;position:relative;">
      <ul class="item_nav">
          <!-- <li>Добавить</li>
          <li>Обновить</li>
          <li>Удалить</li> -->
        </ul>
        <form action="../index.php" method="POST" style="position:absolute;right:0;margin:10px auto;color:red;font-size:18px;">
        <input type="hidden" value="exitAdmin" name="exit">
        <button type="submit">выход</button>
        </form>
        
  </div>
</nav>
<div class="container" style="display:flex;margin-top:7%;width:100%;">

<div style="width:10%;">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Таблицы</h3>
  </div>
  <div class="panel-body">
    <form action="../index.php" method="POST">
    <input type="hidden" name="table" value="tableSelect">
    <input type="hidden" name="table_name" value="category">
    <button class="tab1" type="submit">category</button>
    </form>
  </div>
  <div class="panel-body">
    <form action="../index.php" method="POST">
    <input type="hidden" name="table" value="tableSelect">
    <input type="hidden" name="table_name" value="category_tags">
    <button class="tab2" type="submit">category_tags</button>
    </form>
  </div>
  <div class="panel-body">
    <form action="../index.php" method="POST">
    <input type="hidden" name="table" value="tableSelect">
    <input type="hidden" name="table_name" value="comments">
    <button class="tab3" type="submit">comments</button>
    </form>
  </div>
  <div class="panel-body">
    <form action="../index.php" method="POST">
    <input type="hidden" name="table" value="tableSelect">
    <input type="hidden" name="table_name" value="news_item">
    <button class="tab3" type="submit">news_item</button>
    </form>
  </div>
  <div class="panel-body">
    <form action="../index.php" method="POST">
    <input type="hidden" name="table" value="tableSelect">
    <input type="hidden" name="table_name" value="panel">
    <button class="tab3" type="submit">panel</button>
    </form>
  </div>
</div>
</div>

<div style="width:90%;margin:0 5px;">
<hr>
<h1><?php if(isset($_SESSION["NAMET"]) && !empty($_SESSION["NAMET"])){echo "TAB : " .$_SESSION["NAMET"];}?></h1>
<form action="../index.php" method="GET">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="addTable"> 
        <button style="border:green 4px solid;margin:10px;font-size:20px;" >Добавить</button>
        </form>
<hr>
<table class="table">
<thead>
        <?php
        if(isset($_SESSION["NAMET"]) && !empty($_SESSION["NAMET"])){
         switch($_SESSION["NAMET"]){
          case "category":
         ?>
          <tr>
          <th>ID</th>
          <th>NAME</th>
          </tr>
            <?php
            break;
          case "category_tags":
              ?>
            <tr>
            <th>ID</th>
            <th>TAG</th>
            <th>CATEGORY</th>
            </tr>
              <?php
            break;
          case "comments":
            ?>
            <tr>
            <th>ID</th>
            <th>TEXT</th>
            <th>EMAIL</th>
            <th>NAME</th>
            <th>NEWSID</th>
            </tr>
            <?php
            break;
          case "news_item":
            ?>
            <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>TEXT1</th>
            <th>TEXT2</th>
            <th>LINETEXT</th>
            <th>CATEGORY</th>
            <th>IMGSRC</th>
            <th>IMGAUTHOR</th>
            <th>ALT</th>
            <th>SEO_TEXT</th>
            <th>SEO_TAGS</th>
            <th>AUTHOR</th>
            </tr>
            <?php
            break;
          case "panel":
              ?>
              <tr>
                <th>ID</th>
                <th>TEXT1</th>
                <th>TEXT2</th>
              </tr>
              <?php
            break;
        }
      }else{
        ?>
         <tr>
          <th>NO</th>
          <th>NO</th>
          <th>NO</th>
        </tr>
        <?php
      }
        ?>
  </thead>
  <tbody>
  <?php
if(isset($_SESSION["NAMET"]) && !empty($_SESSION["NAMET"])){
    switch($_SESSION["NAMET"]){
      case "category":
        foreach($_SESSION["table_admin"] as $val){
        ?>
      <tr>
      <td><?php echo $val["id"];?></td>
      <td><?php echo $val["name"];?></td>
      <td class="buttons_ddd">
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="updateTable"> 
        <button style="border:yellow 4px solid;margin:10px;font-size:20px;" >Обновить</button>
        </form>
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="deleteTable"> 
        <button style="border:red 4px solid;margin:10px;font-size:20px;" >Удалить</button>
        </form>
      </td>  
      </tr>
        <?php
        }
        break;
      case "category_tags":
        foreach($_SESSION["table_admin"] as $val){
          ?>
        <tr>
        <td><?php echo $val["id"];?></td>
        <td><?php echo $val["tag"];?></td>
        <td><?php echo $val["category"];?></td>
        <td class="buttons_ddd">
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="updateTable"> 
        <button style="border:yellow 4px solid;margin:10px;font-size:20px;" >Обновить</button>
        </form>
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="deleteTable"> 
        <button style="border:red 4px solid;margin:10px;font-size:20px;" >Удалить</button>
        </form>
      </td>
        </tr>
          <?php
          }
        break;
      case "comments":
        foreach($_SESSION["table_admin"] as $val){
          ?>
        <tr>
        <td><?php echo $val["id"];?></td>
        <td><?php echo $val["text"];?></td>
        <td><?php echo $val["email"];?></td>
        <td><?php echo $val["name"];?></td>
        <td><?php echo $val["newsid"];?></td>
        <td class="buttons_ddd">
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="updateTable"> 
        <button style="border:yellow 4px solid;margin:10px;font-size:20px;" >Обновить</button>
        </form>
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="deleteTable"> 
        <button style="border:red 4px solid;margin:10px;font-size:20px;" >Удалить</button>
        </form>
      </td>
        </tr>
          <?php
          }
        break;
      case "news_item":
        foreach($_SESSION["table_admin"] as $val){
          ?>
        <tr>
        <td><?php echo $val["id"];?></td>
        <td><?php echo $val["title"];?></td>
        <td><?php echo $val["text1"];?></td>
        <td><?php echo $val["text2"];?></td>
        <td><?php echo $val["linetext"];?></td>
        <td><?php echo $val["category"];?></td>
        <td><?php echo $val["imgsrc"];?></td>
        <td><?php echo $val["imgAuthor"];?></td>
        <td><?php echo $val["alt"];?></td>
        <td><?php echo $val["seo_text"];?></td>
        <td><?php echo $val["seo_tags"];?></td>
        <td><?php echo $val["author"];?></td>
        <td class="buttons_ddd">
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="updateTable"> 
        <button style="border:yellow 4px solid;margin:10px;font-size:20px;" >Обновить</button>
        </form>
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="deleteTable"> 
        <button style="border:red 4px solid;margin:10px;font-size:20px;" >Удалить</button>
        </form>
      </td>
        </tr>
          <?php
          }
        break;
      case "panel":
        foreach($_SESSION["table_admin"] as $val){
        ?>
        <tr>
          <td><?php echo $val["id"];?></td>
          <td><?php echo $val["text1"];?></td>
          <td><?php echo $val["text2"];?></td>
          <td class="buttons_ddd">
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="updateTable"> 
        <button style="border:yellow 4px solid;margin:10px;font-size:20px;" >Обновить</button>
        </form>
        <form action="../index.php" method="GET">
        <input name="id_table" type="hidden" value="<?php echo $val["id"];?>">
        <input type="hidden" name="name_table" value="<?php echo $_SESSION["NAMET"];?>">
        <input type="hidden" name="function_table" value="deleteTable"> 
        <button style="border:red 4px solid;margin:10px;font-size:20px;" >Удалить</button>
        </form>
      </td>
        </tr>
        <?php
        }
        break;
    }
  }else{
    ?>
    <tr>
    <td>NO</td>
    <td>NO</td>
    <td>NO</td>
    </tr>
   <?php
  }
?>
</tbody>
</table>
</div>

</div>
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="click.js"></script>
</body>
</html>

<?php
}else{
    header("Location:http://localhost/news/");
}
?>
