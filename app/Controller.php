<?php
require_once './app/Connection.php';

class Controllers extends connect{
    
    public static $limit;
    public static $links;
    
    public function limit($limit){
        $this->limit = $limit;
    }
    
    public  function pagination($query){
         $page=1;
         
          if(isset($_GET["page"])){ 
              $page=$_GET["page"];
          }
          
          $start=(($page-1)*$this->limit)+1;
          $end = $this->limit; 
         
           $this->links = $this->page_links($this->get_path(),$query,$page); 
          $result = $query.=" "."limit $start,$end";
         
          return $result;
    }
    
    public function get_path(){
          $controller="";
          $action="";
          
          if(isset($_GET['controller'])&&isset($_GET['action'])){
		$controller = $_GET['controller'];
		$action = $_GET['action'];
          }else{
            $controller = 'Master';
            $action = 'index';
          }

         return $_SERVER['PHP_SELF']."?controller=".$controller."&action=".$action;
    }


    public function page_links($path,$query,$page)
	{
        
           $result = mysqli_query($this->getInstance(),$query); 
           $row_cnt = mysqli_num_rows($result);
           $row_cnt = ceil($row_cnt/$this->limit);
           
               $pagination = "<ul class='pagination'>";
	       
               if($page!=1){
               $previous = $page-1;
               }else{
               $previous=1;    
               }
               
               if($page!=$row_cnt){
               $next = $page+1;
               }else{
               $next = $row_cnt;   
               }
               
               
               $pagination.= "<li><a href='".$path."&page=$previous'>Previous</a></li>";
           
           for($i=1;$i<=$row_cnt;$i++){
                  if($i==$page){
                   $pagination.= "<li style='background-color: #B0C4DE;'><a href='".$path."&page=$i'>$i</a></li>";
                  }else{
                   $pagination.= "<li><a href='".$path."&page=$i'>$i</a></li>";   
                  }
           }
                $pagination.= "<li><a href='".$path."&page=$next'>Next</a></li>";  
                $pagination.= "</ul>";
               
	        return $pagination;
	 
        }
}
?>