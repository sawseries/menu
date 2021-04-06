   function chklink(){
                alert("link");
                  $("#file").attr("enabled", "enabled"); 
                  $("#links").attr("disabled", "disabled"); 
            }
            
             function chkfile(){
                
                  $("#file").attr("disabled", "disabled"); 
                  $("#links").attr("enabled", "enabled"); 
            }
        function addmenu(root){
            
            var htmls="<form method='post' enctype='multipart/form-data' action='./index.php?controller=Master&action=create'>" +
                       "<input type='hidden' id='root' name='root' value='"+root+"' style='width:100%;height: 40px;'>"+
                       "<table style='width:100%;' border='1'>" +
                          "<tr style='height:60px;'>"+
                          "<td style='padding:1em;text-align: center;'>title</td>"+
                          "<td><input type='text' id='title' name='title' style='width:100%;height: 40px;'></td>"+
                          "</tr>" +
                          "<tr style='height:60px;'>"+
                          "<td></td>"+
                          "<td><input type='radio' name='chktype' id='chkfile' onclick='alert('hello');' value='1'>ไฟล์  " +
                          "<input type='radio' id='chklink' onclick='chklink();' name='chktype' value='2'>link</td>"+
                          "</tr>"+
                          "<tr style='height:60px;'>"+
                          "<td style='padding:1em;text-align: center;'>file</td>"+
                          "<td><input type='file' id='file' name='uploadedFile' style='width:100%;height: 40px;'></td>"+
                          "</tr>"+
                          "<tr style='height:60px;'>"+
                          "<td style='padding:1em;text-align: center;'>links</td>"+
                          "<td><input type='text' id='links' name='links' style='width:100%;height: 40px;'></td>"+
                          "</tr>"+
                          "</table>"+
                          "<center><br><input type='submit' value='บันทึก'></center>"+
                          "<br>"+
                          "</form>";
                  
                  $("#popup_append").html("");
                  $("#popup_append").html(htmls);
            
            
        }
        
        function editmenu(id){
            
            $.ajax({
            url: './index.php?controller=Master&action=setedit',
            type: 'POST',
            data: {id:id},
            success: function (data) {
                $("#popup_append").html("");
                $("#popup_append").html(data);
                //$('#container').html(data);
            }
        });
            
        }