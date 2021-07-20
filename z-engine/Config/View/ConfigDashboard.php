<!DOCTYPE html>
<html lang="en">

<body>

    <style>
        body{ margin: 0px; }
        .bdMain{ background-color: rgb(7,150,89); }
        .font-size{ font-size: 13px; }
        footer{ position: fixed; bottom: 0; width: 100%; }
        .communParam{  letter-spacing: 1px; }
        .dashNameRow { color:white; }
        .dashCommun { background-color: rgb(190,190,190);  }
        .bcRed{ background-color:rgb(243,35,35); }
        .green{ color:green; }
        .red{ color:rgb(200,11,11); }
        nav ul{  margin:0; padding:0;}
        li{ display:inline-block; list-style-type:none; }
        nav li > a{ display: block; color: white; text-decoration: none; padding: 10px 20px 10px 20px; margin: 0 -3px 0 0; letter-spacing: 1px;}
        li:hover > .ulSubMenu{ display: block; }
        .ulSubMenu{ position: absolute; display: none; bottom: 35px; padding-bottom:10px;}
        /*.ulSubMenu .container{ display:flex; flex-direction: row; padding-bottom:10px;}*/
        .dicContainer{  }
        table{ border-collapse: collapse; }
        table tr th, table tr td{ padding:7px; }
        table tr td{ background-color:rgb(230,230,230); }
        .GET{ color:blue; }
        .POST{ color:green; }



    </style>

    <?php echo $content_for_layout; ?>

    <footer class="background bdMain font-size">
        <nav>
            <ul>
                <li><a href="#" class="communParam">R (<?php echo sizeOf(Autoload::$App["Route"]->getRContainer()); ?>)</a><ul class="ulSubMenu">

                    <div class="dicContainer"><div><table class="communParam font-size"><?php

                        ?> <thead class="bdMain"><tr><?php
                        $tab = Autoload::$App["Route"]->getRContainer()[0];
        
                        foreach($tab as $key => $value){ 
                            
                            ?> <th class="<?php echo $key; ?>"> <?php echo $key; ?> </th> <?php
   
                        }
                        ?></tr></thead> <?php

                        ?> <tbody><?php

                        foreach(Autoload::$App["Route"]->getRContainer() as $key => $value){ 

                            ?> <tr> <?php

                            foreach($value as $k => $v){

                                ?> <td class="<?php if($v == "GET" || $v == "POST"){ echo $v; } ?>"> <?php echo $v; ?>  </td> <?php

                            }

                            ?>  </tr><?php
   
                        }
                        ?></tbody> <?php

                    ?></table></div></div>

                </ul></li>
                <li><a href="#"><?php echo "E (".sizeOf(Autoload::$App["Errors"]->getErrorInfos()).")";?></a></li>
                <li><a href="#">Logs</a></li>
            </ul>
        </nav>
    </footer>
    
</body>
</html>