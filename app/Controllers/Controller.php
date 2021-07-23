<?php
   namespace app\Controllers;
   use PDO;
   use app\Controllers\MainController;
   class Controller{
      public function process(){
         if(isset($_GET['act'])){
            return $this->{$_GET['act']}();
         }else if(isset($_GET['p'])){
            return $this->{$_GET['p']}();
         }else if(isset($_POST['exit'])){
            return $this->{$_POST['exit']}();
         }else if(isset($_POST['table']) && isset($_POST['table_name'])){
            $name_table=$_POST['table_name'];
            return $this->{$_POST['table']}($name_table);
         }else if(isset($_GET["name_table"]) && isset($_GET["function_table"])){

            $name_table=$_GET['name_table'];
            if(isset($_GET["id_table"])){
               $id_table=$_GET['id_table'];
               return $this->{$_GET['function_table']}($name_table,$id_table);
            }else{
               return $this->{$_GET['function_table']}($name_table);
            }
         //   category table
         }else if(isset($_GET["category_add"]) ||
               isset($_GET["category_update"]) || 
               isset($_GET["category_delete"]) ){
            if (isset($_GET["category_delete"])){
               
               return $this->{$_GET["category_delete"]}($_GET["category_id"],$_GET["name_table"]);
            }
            if(isset($_GET["category_update"])){
               return $this->{$_GET["category_update"]}($_GET["category_name"],$_GET["category_id"]);
            }
            if(isset($_GET["category_add"])){
               return $this->{$_GET["category_add"]}($_GET["category_name"]);
            }
               // category_tags table
         }else if(isset($_GET["category_tags_add"]) ||
                isset($_GET["category_tags_update"]) || 
                isset($_GET["category_tags_delete"]) ){
            if (isset($_GET["category_tags_delete"])){
               return $this->{$_GET["category_tags_delete"]}($_GET["category_tags_id"],$_GET["name_table"]);
            }
            if(isset($_GET["category_tags_update"])){
               return $this->{$_GET["category_tags_update"]}($_GET["category_tags_tag"],$_GET["category_tags_category"],$_GET["category_tags_id"]);
            }
            if(isset($_GET["category_tags_add"])){
               return $this->{$_GET["category_tags_add"]}($_GET["category_tags_tag"],$_GET["category_tags_category"]);
            }
            // Comments table
         }else if(isset($_GET["comments_add"]) || 
               isset($_GET["comments_update"]) || 
               isset($_GET["comments_delete"]) ){
              
             if (isset($_GET["comments_delete"])){
               return $this->{$_GET["comments_delete"]}($_GET["comments_id"],$_GET["name_table"]);
            }
            if(isset($_GET["comments_update"])){
               $text=$_GET["comments_text"];
               $email=$_GET["comments_email"];
               $name=$_GET["comments_name"];
               $newsID=$_GET["comments_newsID"];
               $id=$_GET["comments_id"];
               return $this->{$_GET["comments_update"]}($id,$text,$email,$name,$newsID);
            }
            if(isset($_GET["comments_add"])){
               $text=$_GET["comments_text"];
               $email=$_GET["comments_email"];
               $name=$_GET["comments_name"];
               $newsID=$_GET["comments_newsID"];
               return $this->{$_GET["comments_add"]}($text,$email,$name,$newsID);
            }
         }else if(isset($_GET["news_item_add"]) || 
               isset($_GET["news_item_update"]) || 
               isset($_GET["news_item_delete"]) ){
              
            if (isset($_GET["news_item_delete"])){
              return $this->{$_GET["news_item_delete"]}($_GET["news_item_id"],$_GET["name_table"]);
           }
           if(isset($_GET["news_item_update"])){
            $id=$_GET["news_item_id"];
            $title=$_GET["news_item_title"];
            $text1=$_GET["news_item_text1"];
            $text2=$_GET["news_item_text2"];
            $linetext=$_GET["news_item_linetext"];
            $category=$_GET["news_item_category"];
            $imgsrc=$_GET["news_item_imgsrc"];
            $imgauthor=$_GET["news_item_imgauthor"];
            $alt=$_GET["news_item_alt"];
            $seo_text=$_GET["news_item_seo_text"];
            $seo_tags=$_GET["news_item_seo_tags"];
            $author=$_GET["news_item_author"];
            return $this->{$_GET["news_item_update"]}($id,$title,
                                                    $text1,
                                                    $text2,
                                                    $linetext,
                                                    $category,
                                                    $imgsrc,
                                                    $imgauthor,
                                                    $alt,
                                                    $seo_text,
                                                    $seo_tags,
                                                    $author);
           }
           if(isset($_GET["news_item_add"])){
              $title=$_GET["news_item_title"];
              $text1=$_GET["news_item_text1"];
              $text2=$_GET["news_item_text2"];
              $linetext=$_GET["news_item_linetext"];
              $category=$_GET["news_item_category"];
              $imgsrc=$_GET["news_item_imgsrc"];
              $imgauthor=$_GET["news_item_imgauthor"];
              $alt=$_GET["news_item_alt"];
              $seo_text=$_GET["news_item_seo_text"];
              $seo_tags=$_GET["news_item_seo_tags"];
              $author=$_GET["news_item_author"];
              return $this->{$_GET["news_item_add"]}($title,
                                                      $text1,
                                                      $text2,
                                                      $linetext,
                                                      $category,
                                                      $imgsrc,
                                                      $imgauthor,
                                                      $alt,
                                                      $seo_text,
                                                      $seo_tags,
                                                      $author);
           }
   }else if(isset($_GET["panel_add"]) ||
        isset($_GET["panel_update"]) || 
        isset($_GET["panel_delete"]) ){

     if (isset($_GET["panel_delete"])){
        return $this->{$_GET["panel_delete"]}($_GET["panel_id"],$_GET["name_table"]);
     }
     if(isset($_GET["panel_update"])){
      //  print_r($_GET);
      //   echo "controller";
        return $this->{$_GET["panel_update"]}($_GET["panel_id"],$_GET["panel_text1"],$_GET["panel_text2"]);
     }
     if(isset($_GET["panel_add"])){
        return $this->{$_GET["panel_add"]}($_GET["panel_text1"],$_GET["panel_text2"]);
     }
        // category_tags table
}else if(isset($_GET["page"])){
   
   
   if($_GET["page"] === "single" && isset($_GET["news"])){
      return $this->{$_GET["page"]}($_GET["page"],$_GET["news"]);
   }
   if($_GET["page"] === "category" && isset($_GET["category"]) && isset($_GET["pag"]) && !empty($_GET["pag"])){
      $_REQUEST['pageno']=$_GET["pag"];
      return $this->{$_GET["page"]}($_GET["page"],$_GET["category"]);
   }
   if($_GET["page"] === "category" && isset($_GET["category"])){
      session_start();
      $_SESSION["status_single"]="category";
      $_SESSION["status_single_category"]=$_GET["category"];
      return $this->{$_GET["page"]}($_GET["page"],$_GET["category"]);
   }
   if(isset($_GET["pag"]) && !empty($_GET["pag"])){
      $_REQUEST['pageno']=$_GET["pag"];
      return $this->{$_GET["page"]}($_GET["page"]);
   }
   if(isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] === "error"){
      return $this->{$_GET["page"]}();
   }
   if(isset($_GET["page"]) && !empty($_GET["page"])){
      session_start();
      $_SESSION["status_single"]="index";
      return $this->{$_GET["page"]}($_GET["page"]);
   }
}else if(isset($_GET["view"]) && isset($_GET["id"]) &&  !empty($_GET["view"]) && !empty($_GET["id"])){
   return $this->{$_GET["view"]}($_GET["id"]);
}else if( isset($_GET["comment"])){
   $user_name=$_GET["user_name"];
   $user_email=$_GET["user_email"];
   $news_id=$_GET["news_id"];
   $text=$_GET["text"];  
   return $this->{$_GET["comment"]}($news_id,$user_name,$user_email,$text);
}else{
   $main=new MainController;
   return $main->index("index");
   }
      


}
   }
?>