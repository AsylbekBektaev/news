<?php
   namespace app\Controllers;
   use app\Controllers\Controller;
   use app\Modal\NewsModal;
   use PDO;
   use PDOException;
   class MainController extends Controller{
   private $modal;

   public function __construct(){
      $this->modal =new NewsModal();
   }
   public function tableSelect($name){
      if(!empty($name)){
      $select=$this->modal->Select_table_Admin($name,NULL,NULL,NULL);
      session_start();  
      $_SESSION["table_admin"][]=[];
      $_SESSION["NAMET"]=$name;
      $_SESSION["table_admin"]=$select;
      header("Location:http://localhost/news/admin/panel.php");
      }
   }

   public function category($name,$category){
      if(!empty($category) && !empty($name)){
      $category=(int)$category;
      $name=(string)$name;
      $page=isset($_REQUEST['pageno']) ? $_REQUEST['pageno'] : 1;
      $limit=10;
      $offset=$limit * ($page - 1);
      $_REQUEST["array"]["categories"]=$table_category=$this->modal->Category_get(null); 
      $_SESSION["array"]["category"]=$table_news=$this->modal->Select_table_Admin("news_item",null,$category,NULL);
      $_SESSION["array"]["category_name"]=$table_category=$this->modal->Category_get($category);
      $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
      $_REQUEST["array"]["news_item_all"]=$this->modal->Pagin_category("news_item",$limit,$offset,$category);
      $_REQUEST["array"]["comments_count_all"]=$this->modal->SelectComment("");
      $_REQUEST["array"]["comments_last_5"]=$this->modal->SelectComment("last");
      $_REQUEST["array"]["random_news_popular"]=$this->modal->Random_news(7,"");
      return $name . ".php";
      }
   }
   public function single($name,$id){
      if((!empty($id) && isset($id))  && (!empty($id) && isset($id))){
      session_start();
      $id=(int)$id;
      $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
      $_REQUEST["array"]["article"]=$this->modal->Select_table_Admin("news_item",$id,null,"yes");
      $prev=$id-1;
      $next=$id+1;
      $category=(int)$_SESSION["status_single_category"];
   
      if($_SESSION["status_single"] ==="category" && !empty($_SESSION["status_single"])){
      $_REQUEST["array"]["prev_article"]=$this->modal->Select_table_Admin("news_item",$prev,$category,"yes");
      }else if($_SESSION["status_single"] ==="index"){
      $_REQUEST["array"]["prev_article"]=$this->modal->Select_table_Admin("news_item",$prev,"","yes");
      }

      if($_SESSION["status_single"] ==="category" && !empty($_SESSION["status_single"])){
      $_REQUEST["array"]["next_article"]=$this->modal->Select_table_Admin("news_item",$next,$category,"yes");
      }else if($_SESSION["status_single"] ==="index"){
      $_REQUEST["array"]["next_article"]=$this->modal->Select_table_Admin("news_item",$next,"","yes");
      }

      $_REQUEST["array"]["comments"]=$this->modal->SelectComment($id);
      $_REQUEST["array"]["comments_last_5"]=$this->modal->SelectComment("last");
      $_REQUEST["array"]["random_news_popular"]=$this->modal->Random_news(7,"");
      $_REQUEST["array"]["random_also_2"]=$this->modal->Random_news(2,"");
      return $name . ".php";
      }
   }
   public function error(){
      $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
      $_REQUEST["array"]["comments_last_5"]=$this->modal->SelectComment("last");
      $_REQUEST["array"]["random_news_popular"]=$this->modal->Random_news(7,"");
      return "error.php";
   }
   public function contact($name){
      if(!empty($name) && isset($name)){
         $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
      return $name . ".php";
      }
   }
   public function author($name){
      if(!empty($name) && isset($name)){
         $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
      $_REQUEST["array"]["comments_last_5"]=$this->modal->SelectComment("last");
      $_REQUEST["array"]["random_news_popular"]=$this->modal->Random_news(7,"");
      return $name . ".php";
      }
   }
   public function addView($id){
      if(isset($id) && !empty($id)){
      $this->modal->ADDVIEW($id);
      }
   }
   public function addComment($news_id,$user_name,$user_email,$comment){
      if(!empty($news_id) && !empty($user_name) && !empty($user_email) && !empty($comment) && 
      isset($news_id) && isset($user_name) && isset($user_email) && isset($comment)){
      $this->modal->ADDCOMMENT($news_id,$user_name,$user_email,$comment);
      header("Location:app/View/single.php");
      }
   }
   public function index($name){
      if(!empty($name)){
         $name=(string)$name;
         $page=isset($_REQUEST['pageno']) ? $_REQUEST['pageno'] : 1;
         $limit=10;
         $offset=$limit * ($page - 1);
         $_REQUEST["array"]["categories"]=$this->modal->Category_get(null); 
         $_REQUEST["array"]["news_item_all"]=$this->modal->Pagin_index("news_item",$limit,$offset);
         $_REQUEST["array"]["comments_count_all"]=$this->modal->SelectComment("");
         $_REQUEST["array"]["comments_last_5"]=$this->modal->SelectComment("last");
         $_REQUEST["array"]["random_news_popular"]=$this->modal->Random_news(7,"");
      return $name.".php";
      }
   }
   public function AuthPanel(){
      if(!empty($_POST["login"]) && !empty($_POST["password"])){
      $table=$this->modal->Auth_Admin();
      foreach($table as $value){
      if($_POST["login"] === $value["text1"] && $_POST["password"] === $value["text2"]){
      session_start();
      $_SESSION["admin"]="success";
      header("Location:http://localhost/news/admin/panel.php");
      }else{
      header("Location:http://localhost/news/admin/");
      }
      }
      }
   }
   public function exitAdmin(){
      session_start();
      unset($_SESSION['admin']);
      unset($_SESSION["NAMET"]);
      unset($_SESSION["table_admin"]);
      return"index";
   }
   public function addTable($name){
         if(!empty($name)){
            if($name === "news_item" || "category_tags"){
            $table=$this->modal->Category_get();
            header("Location:http://localhost/news/admin/ddd.php?name=".$name."&function=add&cat=" . serialize($table));
            }else{
            header("Location:http://localhost/news/admin/ddd.php?name=".$name."&function=add");
            }
         }
   }
   public function updateTable($name,$id){
         if(!empty($name) && !empty($id)){
            $table=$this->modal->Select_table_Admin($name,$id,NULL,NULL,NULL,NULL,NULL);
            header("Location:http://localhost/news/admin/ddd.php?name=".$name."&function=update&data=".serialize($table));
         }
   }
   public function deleteTable($name,$id){

         if(!empty($name) && !empty($id)){
            $table=$this->modal->Select_table_Admin($name,$id,NULL,NULL,NULL,NULL,NULL);
            header("Location:http://localhost/news/admin/ddd.php?name=".$name."&function=delete&data=".serialize($table));
         }
   }
   public function category_add($category_name){
         if(!empty($category_name)){
            $table=$this->modal->Category_add($category_name);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function category_update($category_name,$id){
         if(!empty($category_name) && !empty($id)){
            $table=$this->modal->Category_update($category_name,$id);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function category_delete($id,$name){
         if(!empty($id)){
            $table=$this->modal->FUNC_delete($id,$name);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function category_tags_add($tag,$category){
         if(!empty($tag) && !empty($category)){
            $table=$this->modal->Category_tags_add($tag,$category);
            header("Location:http://localhost/news/admin/panel.php");
         }
      }
   public function category_tags_update($tag,$cat,$id){
      if(!empty($tag) && !empty($cat) && !empty($id)){
         $table=$this->modal->Category_tags_update($tag,$cat,$id);
         header("Location:http://localhost/news/admin/panel.php");
      }
   }
   public function category_tags_delete($id,$name){
         if(!empty($id)){
            $table=$this->modal->FUNC_delete($id,$name);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function comments_add($text,$email,$name,$newsid){
         if(!empty($text) && !empty($email) && !empty($name) && !empty($newsid)){
            $table=$this->modal->Comments_add($text,$email,$name,$newsid);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function comments_update($id,$text,$email,$name,$newsid){
         if(!empty($id) && !empty($text) && !empty($email) && !empty($name) && !empty($newsid)){
            $table=$this->modal->Comments_update($id,$text,$email,$name,$newsid);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function comments_delete($id,$name){
         if(!empty($id)){
            $table=$this->modal->FUNC_delete($id,$name);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function news_item_add($title,$text1,$text2,$linetext,
      $category,$imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author){
         if(!empty($title) && !empty($text1) && !empty($text2) && !empty($linetext) && !empty($category) 
         && !empty($imgsrc) && !empty($imgauthor) && !empty($alt) && !empty($seo_text) && !empty($seo_tags) && !empty($author)){
            $table=$this->modal->News_item_add($title,$text1,$text2,$linetext,
            $category,$imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author);
            header("Location:http://localhost/news/admin/panel.php");
         }
   } 
   public function news_item_update($id,$title,$text1,$text2,$linetext,$category,
      $imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author){
         if(!empty($id) &&!empty($title) && !empty($text1) && !empty($text2) && !empty($linetext) && !empty($category) 
         && !empty($imgsrc) && !empty($imgauthor) && !empty($alt) && !empty($seo_text) && !empty($seo_tags) && !empty($author)){
            $table=$this->modal->News_item_update($id,$title,$text1,$text2,$linetext,$category,
            $imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function news_item_delete($id,$name){
         if(!empty($id) && !empty($name)){
            $table=$this->modal->FUNC_delete($id,$name);
            header("Location:http://localhost/news/admin/panel.php");
         }
   }
   public function panel_add($text1,$text2){
      if(!empty($text1) && !empty($text2)){
         $table=$this->modal->Panel_add($text1,$text2);
         header("Location:http://localhost/news/admin/panel.php");
      }
   }
   public function panel_update($id,$text1,$text2){
      if(!empty($id)  && !empty($text1) && !empty($text2)){
            $table=$this->modal->Panel_update($id,$text1,$text2);
            header("Location:http://localhost/news/admin/panel.php");
      }
   }
   public function panel_delete($id,$name){
      if(!empty($id) && !empty($name)){
         $table=$this->modal->FUNC_delete($id,$name);
         header("Location:http://localhost/news/admin/panel.php");
      }
   }
}  
?>