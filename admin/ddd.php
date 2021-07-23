<?php
if(isset($_GET["data"]) && !empty($_GET["data"])){
    $data=unserialize($_GET["data"]);
}
if(isset($_GET["cat"]) && !empty($_GET["cat"])){
  $CATEGORIES=unserialize($_GET["cat"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<h1><?php echo "TABLE : " .$_GET["name"]?></h1>

<?php if($_GET["function"] === "add"){ ?>
<?php
     switch($_GET["name"]){
        case "category":
            ?>
            <h5>ID_AUTO</h5>
            <form action="../index.php">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input type="hidden" name="category_add" value="category_add">
            <input type="text" name="category_name" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:green 4px solid;margin:10px;font-size:20px;"  type="submit">ДОБАВИТЬ</button>
            </form>
              <?php
            break;
        case "category_tags":
            ?>
            <h5>ID_AUTO</h5>
            <form action="../index.php">
            <input type="hidden" name="category_tags_add" value="category_tags_add">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Tag</span>
            <input type="text" name="category_tags_tag" class="form-control" placeholder="Tag" aria-describedby="sizing-addon1">
            </div>
            <div class="form-group" style="display:flex;">
              <label for="name">Category</label>
              <select name="category_tags_category" class="form-control" required>
              <?php
               for($i=0;$i<count($CATEGORIES);$i++) {
              ?>
              <option value="<?php echo $CATEGORIES[$i]["id"];?>"><?php echo $CATEGORIES[$i]["name"];?></option>
             <?php }?>
              </select>
            </div>
            <button style="border:green 4px solid;margin:10px;font-size:20px;"  type="submit">ДОБАВИТЬ</button>
            </form>
            <?php
            break;  
        case "comments":
            ?>
            <h5>ID_AUTO</h5>
            <form action="../index.php">
            <input type="hidden" name="comments_add" value="comments_add">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text</span>
            <input type="text" name="comments_text" class="form-control" placeholder="Text" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Email</span>
            <input type="text" name="comments_email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input type="text" name="comments_name" class="form-control" placeholder="Name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">NewsID</span>
            <input type="text" name="comments_newsID" class="form-control" placeholder="NewsID" aria-describedby="sizing-addon1">
            </div>
            <button style="border:green 4px solid;margin:10px;font-size:20px;"  type="submit">ДОБАВИТЬ</button>
            </form>
            <?php
            break;
        case "news_item":
            ?>
            <h5>ID_AUTO</h5>
            <form action="../index.php">
            <input type="hidden" name="news_item_add" value="news_item_add">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Title</span>
            <input type="text" name="news_item_title" class="form-control" placeholder="Title" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text1</span>
            <input type="text" name="news_item_text1" class="form-control" placeholder="Text1" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text2</span>
            <input type="text" name="news_item_text2" class="form-control" placeholder="Text2" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">LineText</span>
            <input type="text" name="news_item_linetext" class="form-control" placeholder="LineText" aria-describedby="sizing-addon1">
            </div>
            <div class="form-group" style="display:flex;">
              <label for="name">Category</label>
              <select name="news_item_category" class="form-control" required>
              <?php
               for($i=0;$i<count($CATEGORIES);$i++) {
              ?>
              <option value="<?php echo $CATEGORIES[$i]["id"];?>"><?php echo $CATEGORIES[$i]["name"];?></option>
             <?php }?>
              </select>
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Imgsrc</span>
            <input type="text" name="news_item_imgsrc" class="form-control" placeholder="Imgsrc" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">imgAuthor</span>
            <input type="text" name="news_item_imgauthor" class="form-control" placeholder="imgAuthor" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Alt</span>
            <input type="text" name="news_item_alt" class="form-control" placeholder="Alt" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Text</span>
            <input type="text" name="news_item_seo_text" class="form-control" placeholder="Seo_Text" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Tags</span>
            <input type="text" name="news_item_seo_tags" class="form-control" placeholder="Seo_Tags" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Author</span>
            <input type="text" name="news_item_author" class="form-control" placeholder="Author" aria-describedby="sizing-addon1">
            </div>
            <button style="border:green 4px solid;margin:10px;font-size:20px;"  type="submit">ДОБАВИТЬ</button>
            </form>
            <?php
             break;  
             case "panel":
                ?>
                <h5>ID_AUTO</h5>
                <form action="../index.php">
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text1</span>
                <input type="hidden" name="panel_add" value="panel_add">
                <input type="text" name="panel_text1" class="form-control" placeholder="text1" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text2</span>
                <input type="text" name="panel_text2" class="form-control" placeholder="text2" aria-describedby="sizing-addon1">
                </div>
                <button style="border:green 4px solid;margin:10px;font-size:20px;"  type="submit">ДОБАВИТЬ</button>
                </form>
                  <?php
                break;
     }       
?>
<?php } ?>


<?php if($_GET["function"] === "update"){ ?>
    <?php
     switch($_GET["name"]){
        case "category":
            ?>
            <form action="../index.php">
            <input type="hidden" name="category_update" value="category_update">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
            <input type="text" value="<?php echo $data[0]["id"]?>" name="category_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input type="text" value="<?php echo $data[0]["name"]?>" name="category_name" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:yellow 4px solid;margin:10px;font-size:20px;"  type="submit">ОБНОВИТЬ</button>
            </form>
              <?php
            break;
        case "category_tags":
            ?>
            <form action="../index.php">
            <input type="hidden" name="category_tags_update" value="category_tags_update">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
            <input type="text" value="<?php echo $data[0]["id"]?>" name="category_tags_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Tag</span>
            <input type="text" value="<?php echo $data[0]["tag"]?>" name="category_tags_tag" class="form-control" placeholder="Tag" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Category</span>
            <input type="text" value="<?php echo $data[0]["category"]?>" name="category_tags_category" class="form-control" placeholder="Category" aria-describedby="sizing-addon1">
            </div>
            
            <button style="border:yellow 4px solid;margin:10px;font-size:20px;"  type="submit">ОБНОВИТЬ</button>
            </form>
            
          
              <?php
            break;  
        case "comments":
            ?>
            <form action="../index.php">
            <input type="hidden" name="comments_update" value="comments_update">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
           <input type="text" value="<?php echo $data[0]["id"]?>" name="comments_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text</span>
            <input type="text" value="<?php echo $data[0]["text"]?>" name="comments_text" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Email</span>
            <input type="text" value="<?php echo $data[0]["email"]?>" name="comments_email" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input type="text" value="<?php echo $data[0]["name"]?>" name="comments_name" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">NewsID</span>
            <input type="text" value="<?php echo $data[0]["newsid"]?>" name="comments_newsID" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:yellow 4px solid;margin:10px;font-size:20px;"  type="submit">ОБНОВИТЬ</button>
            </form>
              <?php
            break;
        case "news_item":
            ?>
            <form action="../index.php">
            <input type="hidden" name="news_item_update" value="news_item_update">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
           <input type="text" value="<?php echo $data[0]["id"]?>" name="news_item_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Title</span>
            <input type="text" value="<?php echo $data[0]["title"]?>" name="news_item_title" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text1</span>
            <input type="text" value="<?php echo $data[0]["text1"]?>" name="news_item_text1" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text2</span>
            <input type="text" value="<?php echo $data[0]["text2"]?>" name="news_item_text2" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">LineText</span>
            <input type="text" value="<?php echo $data[0]["linetext"]?>" name="news_item_linetext" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Category</span>
            <input type="text" value="<?php echo $data[0]["category"]?>" name="news_item_category" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Imgsrc</span>
            <input type="text" value="<?php echo $data[0]["imgsrc"]?>" name="news_item_imgsrc" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">imgAuthor</span>
            <input type="text" value="<?php echo $data[0]["imgAuthor"]?>" name="news_item_imgauthor" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Alt</span>
            <input type="text" value="<?php echo $data[0]["alt"]?>" name="news_item_alt" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Text</span>
            <input type="text" value="<?php echo $data[0]["seo_text"]?>" name="news_item_seo_text" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Tags</span>
            <input type="text" value="<?php echo $data[0]["seo_tags"]?>" name="news_item_seo_tags" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Author</span>
            <input type="text" value="<?php echo $data[0]["author"]?>" name="news_item_author" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:yellow 4px solid;margin:10px;font-size:20px;"  type="submit">ОБНОВИТЬ</button>
            </form>
              <?php
             break;  
            case "panel":
                ?>
                <form action="../index.php">
                <input type="hidden" name="panel_update" value="panel_update">
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">ID</span>
                <input type="text" value="<?php echo $data[0]["id"]?>" name="panel_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text1</span>
                <input type="text" value="<?php echo $data[0]["text1"]?>" name="panel_text1" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text2</span>
                <input type="text" value="<?php echo $data[0]["text2"]?>" name="panel_text2" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
                </div>
                <button style="border:yellow 4px solid;margin:10px;font-size:20px;"  type="submit">ОБНОВИТЬ</button>
                </form>
                  <?php
                break;
            }       
?>
<?php } ?>

<?php if($_GET["function"] === "delete"){?>
    <?php
  
     switch($_GET["name"]){
        case "category":
            ?>
            <form action="../index.php">
            <input type="hidden" value="<?php echo $_GET["name"]?>" name="name_table">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
            <input type="hidden" name="category_delete" value="category_delete">
            <input readonly type="text" value="<?php echo $data[0]["id"]?>" name="category_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input type="hidden" name="category_delete" value="category_delete">
            <input  readonly type="text" value="<?php echo $data[0]["name"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:red 4px solid;margin:10px;font-size:20px;" type="submit">УДАЛИТЬ</button>
            </form>
              <?php
            break;
        case "category_tags":
            ?>
            <form action="../index.php">
            <input type="hidden" value="<?php echo $_GET["name"]?>" name="name_table">
            <input type="hidden" name="category_tags_delete" value="category_tags_delete">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
            <input readonly type="text" value="<?php echo $data[0]["id"]?>" name="category_tags_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Tag</span>
            <input  readonly type="text" value="<?php echo $data[0]["tag"]?>"  class="form-control" placeholder="Tag" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Category</span>
            <input  readonly type="text" value="<?php echo $data[0]["category"]?>"  class="form-control" placeholder="Category" aria-describedby="sizing-addon1">
            </div>
            <button style="border:red 4px solid;margin:10px;font-size:20px;" type="submit">УДАЛИТЬ</button>
            </form>
              <?php
            break;  
        case "comments":
            ?>
            <form action="../index.php">
            <input type="hidden" value="<?php echo $_GET["name"]?>" name="name_table">
            <input type="hidden" name="comments_delete" value="comments_delete">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
            <input readonly type="text" value="<?php echo $data[0]["id"]?>" name="comments_id" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text</span>
            <input  readonly type="text" value="<?php echo $data[0]["text"]?>"  class="form-control" placeholder="Tag" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Email</span>
            <input  readonly type="text" value="<?php echo $data[0]["email"]?>"  class="form-control" placeholder="Category" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Name</span>
            <input  readonly type="text" value="<?php echo $data[0]["name"]?>"  class="form-control" placeholder="Category" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">NewsID</span>
            <input  readonly type="text" value="<?php echo $data[0]["newsid"]?>"  class="form-control" placeholder="Category" aria-describedby="sizing-addon1">
            </div>
            <button style="border:red 4px solid;margin:10px;font-size:20px;" type="submit">УДАЛИТЬ</button>
            </form>
              <?php
            break;
        case "news_item":
            ?>
            <form action="../index.php">
            <input type="hidden" value="<?php echo $_GET["name"]?>" name="name_table">
            <input type="hidden" name="news_item_delete" value="news_item_delete">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">ID</span>
           <input readonly  type="text" value="<?php echo $data[0]["id"]?>" name="news_item_id"  class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Title</span>
            <input readonly type="text" value="<?php echo $data[0]["title"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text1</span>
            <input readonly type="text" value="<?php echo $data[0]["text1"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Text2</span>
            <input readonly type="text" value="<?php echo $data[0]["text2"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">LineText</span>
            <input readonly type="text" value="<?php echo $data[0]["linetext"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Category</span>
            <input readonly type="text" value="<?php echo $data[0]["category"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Imgsrc</span>
            <input  readonly type="text" value="<?php echo $data[0]["imgsrc"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">imgAuthor</span>
            <input readonly type="text" value="<?php echo $data[0]["imgAuthor"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Alt</span>
            <input readonly type="text" value="<?php echo $data[0]["alt"]?>" class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Text</span>
            <input readonly type="text" value="<?php echo $data[0]["seo_text"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Seo_Tags</span>
            <input readonly type="text" value="<?php echo $data[0]["seo_tags"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1">Author</span>
            <input readonly type="text" value="<?php echo $data[0]["author"]?>"  class="form-control" placeholder="Category_name" aria-describedby="sizing-addon1">
            </div>
            <button style="border:red 4px solid;margin:10px;font-size:20px;"  type="submit">Удалить</button>
            </form>
              <?php
             break; 
             case "panel":
                ?>
                <form action="../index.php">
                <input type="hidden" value="<?php echo $_GET["name"]?>" name="name_table">
                <input type="hidden" name="panel_delete" value="panel_delete">
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">ID</span>
               <input readonly  type="text" value="<?php echo $data[0]["id"]?>" name="panel_id"  class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text1</span>
               <input readonly  type="text" value="<?php echo $data[0]["text1"]?>" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Text2</span>
               <input readonly  type="text" value="<?php echo $data[0]["text2"]?>" class="form-control" placeholder="Category_id" aria-describedby="sizing-addon1">
                </div>
                <button style="border:red 4px solid;margin:10px;font-size:20px;"  type="submit">Удалить</button>
                </form>
                  <?php
                break; 
     }       
?>
<?php } ?>
</div>
<script src="../assets/js/bootstrap.min.js"></script> 
</body>
</html>