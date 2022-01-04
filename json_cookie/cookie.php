<!DOCTYPE html>
<html>
    <head>
        <script language='javascript'>
            function set_cookie(name, value, exp) {
                var date = new Date();
                date.setTime(date.getTime() + exp*24*60*60);
                document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
            }
        </script>
        <title>cookie 저장</title>
    </head>
    <body>
        <?php
            $name = $_POST['name'];
            $age = $_POST['age'];

            echo ("<script>set_cookie('name', '$name', 1);</script>");
            echo ("<script>set_cookie('age', '$age', 1);</script>");
            echo ("<a href = './show_cookie.html'>쿠키값 확인하러 가기</a>");
        ?>
    </body>
</html>