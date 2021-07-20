<!DOCTYPE html>

<?php

    function readFiles( $file , $li ){

        $lines = file($file);
        return $lines[$li - 1];

    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="z-engine\Exceptions\Views\css\Errors.css">
    <title>Errors</title>
</head>
<body>

<div class="div_main_container">

    <div class="div_title_error">
        <h1><?php echo $xml->message;?></h1>

        <div class="div_red_message">
            <h3><?php if($xml->code == 0){ echo "La route demandé n'existe pas"; } else {echo $xml->code;}?></h3>
        </div>
    </div>

    <div class="div_MainMessage_error">

        <div class="div_title">
            <?php  $url = explode("\\",$xml->file); ?>
            <p><strong><?php echo $xml->type; ?></strong>&nbsp&nbsp In <span><?php echo $url[sizeOf($url) - 1];?></span></p>
        </div>

        <div class="div_container">
            
            <p>In <span><?php echo $xml->file;?></span> Line <?php echo $xml->line;?></p>
            <div class="div_codeLine">   
    
                <?php

                $lines = file($xml->file);

                foreach($lines as $key => $value){
                    //echo "key : ".$key ." values ".$value[$key]."</br>";

                    if($key == ($xml->line - 2) ||
                       $key == ($xml->line - 1) ||
                       $key == $xml->line ||
                       $key == ($xml->line + 1) ||
                       $key == ($xml->line + 2)){

                        $i = 0;
                        $null = array();
                        ?> <p class="<?php if($key == ($xml->line - 1))echo "error"; ?>" > <?php echo ($key + 1)." : "; 
                        while($i < strlen($lines[$key])){

                            if($lines[$key][$i] == " "){
                                echo "&nbsp";
                            } else {
                                echo $lines[$key][$i];
                                $null[sizeOf($null)] = $lines[$key][$i];
                            }
                            
                            $i++;
                        }
                        ?> </p> <?php
                    }
                        
                }
                
                ?>
              
            </div>

        </div>
        
        
    </div>

</div>
    

</body>
</html>