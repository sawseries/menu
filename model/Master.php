<?php

require_once './app/BaseController.php';

class Master extends BaseController{

    public static function find($sql){

         $stmt = DB()->query($sql)->fetchAll();  
//        $list = [];        
//        foreach($stmt as $row){
//          $list[]=array('id'=>$row["id"],
//              'title'=>$row["title"],
//              'file'=>$row["file"],
//              'link'=>$row["link"],
//              'root'=>$row["root"]);
//        }
        
        return $stmt;
    }
    
    public static function find_submenu($sub){
        $sql = "select * from tbl_menu where root='$sub'";
        $stmt = DB()->query($sql)->fetchAll();         
        return $stmt;        
    }
    
     public static function find_max(){
       $STH = DB()->query("select max(id) as mx from tbl_menu");
       $result = $STH->fetch();
       return $result["mx"]+1;
     }
     
    public static function find_edit($id){
       $STH = DB()->query("select * from tbl_menu where id='$id'");
       $result = $STH->fetch();
       return $result;
     }

    public static function insert(Array $data){    
        $sql = "INSERT INTO tbl_menu(title,type,link,file,root) VALUES(:title,:type,:link,:file,:root)";
        $stmt= DB()->prepare($sql);
        $stmt->execute($data);          
    } 
    
    
    public static function updates(Array $data){
        $sql = "update tbl_menu set title=:title,type=:type,link=:link,file=:file,root=:root where id=:id";
        $stmt= self::DB()->prepare($sql);
        $stmt->execute($data);       
    }
    
    public function delete($taskId) {
        $sql = 'DELETE FROM tbl_menu WHERE id = :task_id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':task_id', $taskId);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
    public static function validate($data){
         $urlArray=[];
         foreach($data as $key => $value){
            $urlArray[$key] =  $value;            
         }
         return $urlArray;
    }
}