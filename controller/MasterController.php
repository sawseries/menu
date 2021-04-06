<?php

require_once './app/BaseController.php';
require_once './model/Master.php';

class MasterController extends BaseController {
    
       public function __construct() {
          // Master::limit(10);  
       }

       public function index(){                            
       $menus = Master::find("select * from tbl_menu where root = '0'");            
        Redirect::view("master/index",array("menus"=>$menus));
       }
       
       public function setedit(){
           
           $result = Master::find_edit($_REQUEST["id"]);
           
            $htmls="<form method='post' enctype='multipart/form-data' action='./index.php?controller=Master&action=edit'>
                       <input type='hidden' id='root' name='root' value='".$result["root"]."' style='width:100%;height: 40px;'>
                        <input type='hidden' id='ids' name='ids' value='".$result["id"]."' style='width:100%;height: 40px;'>    
                       <table style='width:100%;' border='1'>
                          <tr style='height:60px;'>
                          <td style='padding:1em;text-align: center;'>title</td>
                          <td><input type='text' id='title' name='title' value='".$result["title"]."' style='width:100%;height: 40px;'></td>
                          </tr>
                          <tr style='height:60px;'>
                          <td></td><td>";
                 if($result["type"]==1){
                     $htmls.="<input type='radio' name='chktype' id='chkfile' onclick='alert('hello');' value='1' checked>ไฟล์ ";
                     $htmls.="<input type='radio' id='chklink' onclick='chklink();' name='chktype' value='2'>link";
                 }else{                     
                     $htmls.="<input type='radio' name='chktype' id='chkfile' onclick='alert('hello');' value='1'>ไฟล์ ";
                     $htmls.="<input type='radio' id='chklink' onclick='chklink();' name='chktype' value='2' checked>link";
                 }
                          
                     $htmls.="</td>
                          </tr>
                          <tr style='height:60px;'>
                          <td style='padding:1em;text-align: center;'>file</td>
                          <td><input type='file' id='file' name='uploadedFile' style='width:100%;height: 40px;'></td>
                          </tr>
                          <tr style='height:60px;'>
                          <td style='padding:1em;text-align: center;'>links</td>
                          <td><input type='text' id='links' name='links' value='".$result["link"]."' style='width:100%;height: 40px;'></td>
                          </tr>
                          </table>
                          <center><br><input type='submit' value='แก้ไข'></center>
                          <br>
                          </form>";
           
           echo $htmls;  
       }
       
       public function create(){
          $file_name="";
     
         if(isset($_FILES["uploadedFile"])){
            $max = Master::find_max();
            if (!file_exists("./storage/$max")) {
              mkdir("./storage/$max", 0777, true);
            }
             
            $file_name = $_FILES['uploadedFile']['name'];       
            $file_tmp =$_FILES['uploadedFile']['tmp_name'];
            move_uploaded_file($file_tmp,"./storage/$max/".$file_name);        
         }
        
         Master::insert(array("title"=>$_REQUEST["title"],
             "type"=>$_REQUEST["chktype"],
             "link"=>$_REQUEST["links"],
             "file"=>$file_name,
             "root"=>$_REQUEST["root"]));   
         
         Redirect::url("master","index");
         
       }
       
       public function edit(){
//           echo $_REQUEST["title"]."<br>";
//           echo $_REQUEST["chktype"]."<br>";
//           echo $_REQUEST["links"]."<br>";
//           echo $_REQUEST["ids"]."<br>";
//           echo $_REQUEST["root"]."<br>";
            Master::updates(array("title"=>$_REQUEST["title"],
             "type"=>$_REQUEST["chktype"],
             "link"=>$_REQUEST["links"],
             "id"=>$_REQUEST["ids"],   
             "file"=>"",
             "root"=>$_REQUEST["root"]));   
         
         Redirect::url("master","index");
       }
}
