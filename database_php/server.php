<!DOCTYPE html>
<html>
    <head>
        <?php
            function pretty($data){
                highlight_string("<?php\n " . var_export($data, true) . "?>");
                echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
                die();
          }
        ?>
        <title>_SERVER 확인</title>
    </head>
    <body>
        <?php pretty($_SERVER);?>
    </body>
</html>