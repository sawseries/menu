<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src= "./asset/control/master.js"></script>
        <link href="../../public/asset/css/style.css" rel="stylesheet">
        <style>
              .dropdown {
                position: relative;
                display: inline-block;
                width: 130px;border: 1px solid #ccc;
                text-align: center;
                float: left;   
                padding: 0em;    
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;

                min-width: 150px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                padding: 0;
                z-index: 1;
            }

            .dropdown-content-left {
                top:70px;
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                padding: 0px 0px;
                z-index: 1;
                margin-left: 145px;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown-content:hover .dropdown-content-left {
                display: block;
            }
            .menu_itm{

            }

            .tb_dropdown-content tr{
                height: 30px;
                border: 1px solid gray;

            }
            .tb_dropdown-content td{
                padding: 0.5em;
            }

            .tb_dropdown-content-left tr{
                height: 20px;
                border: 1px solid gray;

            }
            .tb_dropdown-content-left td{
                padding: 0.5em;
            }


            .box {
                width: 40%;
                margin: 0 auto;
                background: rgba(255,255,255,0.2);
                padding: 35px;
                border: 2px solid #fff;
                border-radius: 20px/50px;
                background-clip: padding-box;
                text-align: center;
            }

            .button {
                font-size: 1em;
                padding: 10px;
                color: #2193b0;
                border: 2px solid #06D85F;
                border-radius: 20px/50px;
                text-decoration: none;
                cursor: pointer;
                transition: all 0.3s ease-out;
            }
            .button:hover {
                background: #06D85F;
            }

            .overlay {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.7);
                transition: opacity 500ms;
                visibility: hidden;
                opacity: 0;
            }
            .overlay:target {
                visibility: visible;
                opacity: 1;
            }

            .popup {
                margin: 70px auto;
                padding: 20px;
                background: #fff;
                border-radius: 5px;
                width: 50%;
                height: 50%;
                position: relative;
                transition: all 5s ease-in-out;
            }

            .popup h2 {
                margin-top: 0;
                color: #333;
                font-family: Tahoma, Arial, sans-serif;
            }
            .popup .close {
                position: absolute;
                top: 20px;
                right: 30px;
                transition: all 200ms;
                font-size: 30px;
                font-weight: bold;
                text-decoration: none;
                color: #333;
            }
            .popup .close:hover {
                color: #06D85F;
            }
            .popup .popup-content {
                max-height: 100%;
                overflow: auto;
            }

            @media screen and (max-width: 700px){
                .box{
                    width: 100%;
                }
                .popup{
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="container" style="padding:5em;">
            <a class="button" href="#popup1" onclick="addmenu(0);">addmenu</a>
            <div class="row" style="padding:1em;border: 1px solid gray;">
               
                
                <?php foreach ($menus as $menu) { ?>

                    <div class="dropdown">
                        <div style="text-align:right;padding:0em;padding-right: 20px;height: 10px;"><a href="#" title="ลบ">x</a></div>
                        <span> <?=$menu["title"];?> </span>
                        <br><a href="#popup1" onclick="addmenu(<?=$menu["id"];?>);">add</a> | <a href="#popup1" onclick="editmenu(<?=$menu["id"];?>);">edit</a>
                        
                        <?php $sub = Master::find_submenu($menu["id"]); ?>
                        <?php if (count($sub) > 0) {?> v
                        <?php } ?>

                        <div class="dropdown-content">
                            <ul style="list-style: none;padding: 0;">
                                <?php foreach ($sub as $subs) { ?>

                                    <li style="padding: 1em;border: 1px solid gray;">
                                        <?=$subs["title"]; ?>
                                        <br><a href="#popup1" onclick="addmenu(0);">add</a> | <a href="#popup1" onclick="editmenu(<?=$menu["id"];?>);">edit</a> <b>></b>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                <?php }
                ?>

                <div id="popup1" class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <div id="popup_append" class="popup-content">
                            
                        </div>
                    </div>   
                </div>             


            </div>
        </div>
    </body>

</html>