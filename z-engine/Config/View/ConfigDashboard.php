<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="z-engine\Config\View\ConfigDashboard.css"; ?>
</head>

<body>

    <?php echo $content_for_layout; ?>

    <footer class="background bdMain font-size">
        <nav>
            <ul>
                <li class="li_route"><a href="#" class="communParam">R (<?php echo sizeOf(Autoload::$App["Route"]->getRContainer()); ?>)</a><ul class="ulSubMenu">

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
                <li class="li_logs"><a href="#">Logs</a><ul class="ulLogs">

                        <?php $logs = Autoload::$App["Log"]->getFileXml(); ?>

                        <div class="dicContainerLog">

                            <?php foreach($logs as $key => $value){

                                ?><p><?php echo $value; ?></p><?php

                            }?>

                        </div>
                    </ul></li>
            </ul>
        </nav>
    </footer>

</body>
</html>