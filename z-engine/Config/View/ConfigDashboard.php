<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Développeur</title>
</head>
<body>

    <style>
        body{ margin: 0px; }
        .background { background-color: rgb(5,5,20); }
        footer{ position: fixed; bottom: 0; width: 100%;}
        ul{  margin:0; padding:0;}
        li{ display:inline-block; list-style-type:none; }
        a{ display: block; color: white; text-decoration: none; padding: 10px 20px 10px 20px; margin: 0 -3px 0 0; letter-spacing: 1px; font-size: 13px;}
        li:hover > .ulSubMenu{ display: block; }
        .ulSubMenu{ position: absolute; display: none; bottom: 39px; }
        .ulSubMenu li{ display:inline; }
        .ulSubMenu a{ color: white; padding: 10px; }

    </style>

    <?php echo $content_for_layout; ?>

    <footer class="background">
        <nav>
            <ul>
                <li><a href="#">Routes</a><ul class="ulSubMenu background">
                        <?php
                        $i = 0;
                        foreach(Autoload::$App["Route"]->getRContainer() as $key => $value){
                            ?> <li><a href="#"><?php echo $key; ?> | <?php 
                            foreach($value as $key => $val){
                                echo $val." - "; 
                            }
                            ?></a> <?php
                            $i++;
                        }

                        ?>
                </ul></li>
                <li><a href="#">Configurations</a></li>
                <li><a href="#">aeae</a></li>
            </ul>
        </nav>
    </footer>
    
</body>
</html>