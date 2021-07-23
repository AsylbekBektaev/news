<?php
   namespace app\Modal;
   use app\DB\DBManager;
   use PDO;
   use PDOException;
   class NewsModal{
    private $log;
    private $pas;
    private $name;
    private $cou;
     private $dbManager;
      public function __construct(){
         $this->dbManager = new DBManager("localhost", "test", "root", "");
      }
      public function Category_get($id){
         try{
            if(isset($id) && !empty($id)){
               $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `category` WHERE id=:id");
               $query->execute([
                  "id"=>$id
               ]);
            }else{
            $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `category`");
            $query->execute();
            }
            $result = $query->fetchAll();
         return $result;
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Auth_Admin(){
         try{
            $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `panel`");
            $query->execute();
            $result = $query->fetchAll();
             return $result;
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Random_news($number,$category){
         try{
            if(isset($category) && !empty($category)){
            $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `news_item` WHERE `category`=$category ORDER BY RAND() LIMIT $number");
            }else{
               $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `news_item` ORDER BY RAND() LIMIT $number");   
            }
            $query->execute();
             $result = $query->fetchAll();
             return $result;
          }catch(PDOException $e){
             echo $e->getMessage();
          }
      }
      public function Pagin_category($table,$limit,$offset,$category){
         try{
            $query2 = $this->dbManager->getConnection()->prepare("SELECT * FROM $table WHERE category=$category");
            $query2->execute();
            $allResp = $query2->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $query2->rowCount();
            $total_pages = ceil($total_results/$limit);

            $query = $this->dbManager->getConnection()->prepare("SELECT news_item.id,news_item.title,news_item.text1,news_item.text2,news_item.linetext,news_item.imgsrc,
            news_item.imgAuthor,news_item.alt,news_item.seo_text,news_item.seo_tags,news_item.author,news_item.view,news_item.category,category.name 
            FROM `news_item` LEFT JOIN `category` 
            ON news_item.category=category.id WHERE category=$category LIMIT $limit OFFSET $offset");
            $query->execute();
            $result = $query->fetchAll();

            return ["result"=>$result,"total_page"=>$total_pages];
         }catch(PDOException $e){
         echo $e->getMessage();
         }
      }
      public function ADDCOMMENT($news_id,$user_name,$user_email,$comment){
      if($news_id && $user_name && $user_email && $comment){
            try{
               $query = $this->dbManager->getConnection()->prepare("INSERT INTO `comments`(`text`, `email`, `name`, `newsid`) VALUES 
               (:comment,:email,:name,:news_id)");
               $query->execute([
                  "comment"=>$comment,
                  "email"=>$user_email,
                  "name"=>$user_name,
                  "news_id"=>(int)$news_id
               ]);
               $result = $query->fetchAll();
            }catch(PDOException $e){
            echo $e->getMessage();
            }
         }
      }
      public function SelectComment($id){
            try{
         if($id === "last"){
            $query = $this->dbManager->getConnection()->prepare("SELECT comments.name, comments.date,comments.newsid,comments.text FROM `comments`  ORDER BY RAND() LIMIT 5");
            // SELECT comments.name, comments.date,comments.newsid,comments.text FROM `comments`  ORDER BY id DESC LIMIT 5
         }else if(!empty($id)){
            $query = $this->dbManager->getConnection()->prepare("SELECT * FROM `comments` WHERE newsid=:id");
         }else{
            $query = $this->dbManager->getConnection()->prepare("SELECT  comments.newsid, count(comments.id) AS count_comments FROM news_item RIGHT JOIN comments ON news_item.id=comments.newsid GROUP BY news_item.id");
         }
               $query->execute([
                  "id"=>$id
               ]);
               $result = $query->fetchAll();
               return $result;
            }catch(PDOException $e){
            echo $e->getMessage();
            }
         
      }
      public function ADDVIEW($id){
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `news_item` SET `view`= view + 1  WHERE id=:id");
            $query->execute([
               "id"=>$id
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
         echo $e->getMessage();
         }
      }

   //    select news_item.* , comments.newsid, count(comments.id) as count_comments
   //    from 
   //      news_item
   //        join 
   //      comments 
   //        on news_item.id=comments.newsid 
   //  group by news_item.id


      public function Pagin_index($table,$limit,$offset){
         try{
            $query2 = $this->dbManager->getConnection()->prepare("SELECT * FROM $table");
            $query2->execute();
            $allResp = $query2->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $query2->rowCount();
            $total_pages = ceil($total_results/$limit);

            $query = $this->dbManager->getConnection()->prepare("SELECT news_item.id,news_item.title,news_item.text1,news_item.text2,news_item.linetext,news_item.imgsrc,
            news_item.imgAuthor,news_item.alt,news_item.seo_text,news_item.seo_tags,news_item.author,news_item.view,news_item.category,category.name 
            FROM `news_item` LEFT JOIN `category` 
            ON news_item.category=category.id LIMIT $limit OFFSET $offset");
            $query->execute();
            $result = $query->fetchAll();

            return ["result"=>$result,"total_page"=>$total_pages];
         }catch(PDOException $e){
         echo $e->getMessage();
         }
      }
      public function Select_table_Admin($table,$id,$category,$text){
      
         try{
         if(isset($id) && isset($text)&& !empty($id) && !empty($text)){
               $query = $this->dbManager->getConnection()->prepare("SELECT news_item.category, news_item.id,news_item.title,news_item.text1,news_item.text2,news_item.linetext,news_item.imgsrc,news_item.imgAuthor,news_item.alt,news_item.seo_text,news_item.seo_tags,news_item.author,news_item.view,category.name 
               FROM `news_item`LEFT JOIN `category` 
               ON news_item.category=category.id WHERE news_item.id=$id");
         }else if(isset($id) && !empty($id)){
               $query = $this->dbManager->getConnection()->prepare("SELECT * FROM $table WHERE id=$id");
            }else if(isset($category) && !empty($category)){
               $query = $this->dbManager->getConnection()->prepare("SELECT * FROM $table WHERE category=$category");
            }
            $query->execute();
            $result = $query->fetchAll();
         return $result;
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function FUNC_delete($id,$name){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("DELETE FROM `$name` WHERE id=:id");
            $query->execute([
               "id"=>$id
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }

      // News_item table
      public function News_item_add($title,$text1,$text2,$linetext,
      $category,$imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author){
         try{
            $query = $this->dbManager->getConnection()->prepare("INSERT INTO `news_item`
            (`title`, `text1`, `text2`, `linetext`, `category`, `imgsrc`, 
            `imgAuthor`, `alt`, `seo_text`, `seo_tags`, `author`) VALUES 
            (:title,:text1,:text2,:linetext,:category,:imgsrc,:imgauthor,:alt,
            :seo_text,:seo_tags,:author)");
            $query->execute([
               "title"=>$title,
               "text1"=>$text1,
               "text2"=>$text2,
               "linetext"=>$linetext,
               "category"=>$category,
               "imgsrc"=>$imgsrc,
               "imgauthor"=>$imgauthor,
               "alt"=>$alt,
               "seo_text"=>$seo_text,
               "seo_tags"=>$seo_tags,
               "author"=>$author
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function News_item_update($id,$title,$text1,$text2,$linetext,$category,
      $imgsrc,$imgauthor,$alt,$seo_text,$seo_tags,$author){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `news_item` SET 
            `id`=:id,`title`=:title,`text1`=:text1,`text2`=:text2,`linetext`=:linetext,
            `category`=:category,`imgsrc`=:imgsrc,`imgAuthor`=:imgauthor,`alt`=:alt,
            `seo_text`=:seo_text,`seo_tags`=:seo_tags,`author`=:author WHERE id=$id");
            $query->execute([
               "id"=>$id,
               "title"=>$title,
               "text1"=>$text1,
               "text2"=>$text2,
               "linetext"=>$linetext,
               "category"=>$category,
               "imgsrc"=>$imgsrc,
               "imgauthor"=>$imgauthor,
               "alt"=>$alt,
               "seo_text"=>$seo_text,
               "seo_tags"=>$seo_tags,
               "author"=>$author
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
     

      // Comments table
      public function Comments_add($text,$email,$name,$newsid){
         try{
            $query = $this->dbManager->getConnection()->prepare("INSERT INTO `comments`(`text`, `email`, `name`, `newsid`) VALUES (:text , :email , :name , :newsid)");
            $query->execute([
               "text"=>$text,
               "email"=>$email,
               "name"=>$name,
               "newsid"=>$newsid
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Comments_update($id,$text,$email,$name,$newsid){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `comments` SET `id`=:id,`text`=:text,`email`=:email,`name`=:name,`newsid`=:newsid WHERE id=$id");
            $query->execute([
               "id"=>$id,
               "text"=>$text,
               "email"=>$email,
               "name"=>$name,
               "newsid"=>$newsid
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
   

      // Category_tags table
      public function Category_tags_add($tag,$category){
         try{
            $query = $this->dbManager->getConnection()->prepare("INSERT INTO `category_tags`(`tag`, `category`) VALUES (:tag , :cat)");
            $query->execute([
               "tag"=>$tag,
               "cat"=>$category
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Category_tags_update($tag,$cat,$id){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `category_tags` SET `id`=:id,`tag`=:tag,`category`=:cat WHERE id=$id");
            $query->execute([
               "id"=>$id,
               "tag"=>$tag,
               "cat"=>$cat
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
   

      // Category table
      public function Category_add($category_name){
         try{
            $query = $this->dbManager->getConnection()->prepare("INSERT INTO `category`(`name`) VALUES (:name)");
            $query->execute([
               "name"=>$category_name
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Category_update($category_name,$id){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `category` SET `name`=:name WHERE `id`=:id");
            $query->execute([
               "id"=>$id,
               "name"=>$category_name
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
    
     
      // panel table
      public function Panel_add($text1,$text2){
         try{
            $query = $this->dbManager->getConnection()->prepare("INSERT INTO `panel`(`text1`, `text2`) 
            VALUES (:text1,:text2)");
            $query->execute([
               "text1"=>$text1,
               "text2"=>$text2
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
      public function Panel_update($id,$text1,$text2){
         $id=(int)$id;
         try{
            $query = $this->dbManager->getConnection()->prepare("UPDATE `panel` SET 
            `id`=:id,`text1`=:text1,`text2`=:text2 WHERE id=$id");
            $query->execute([
               "id"=>$id,
               "text1"=>$text1,
               "text2"=>$text2
            ]);
            $result = $query->fetchAll();
         }catch(PDOException $e){
            echo $e->getMessage();
         }
      }
   }
?>