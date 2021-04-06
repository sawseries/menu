<?php


function checkstatus($i){   
    switch($i){
        case 1 : return "<a class='btn' style='width:90px;padding:0em;background-color:#B0C4DE;color:#5499C7;'>รอดำเนินการ</a>"; 
        case 2 : return "<a class='btn' style='width:100px;padding:0em;background-color:#FFFF99;color:#FF9966;'>กำลังดำเนินการ</a>";
        case 3 : return "<a class='btn' style='width:90px;padding:0em;background-color:#2E8B57;color:white;'>สำเร็จ</a>";                
    }    
}



function userfullnm($user){
    
    $cons = connect();
    
    $STH = $cons->query("select fname,lname from users where username='$user'");
    $result = $STH->fetch();
    
    return $result["fname"]." ".$result["lname"];
}




?>