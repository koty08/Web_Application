<!DOCTYPE html>
<html>
    <head>
        <?php
            $mysqli = new mysqli("164.125.36.78","202055510","ty0201", "202055510");
            if($mysqli->connect_errno){
                die("Failed to connect MySQL");
            }
        ?>
    </head>
    <body>
        <table border = 1>
            <?php echo "<h1>저장된 데이터 목록</h1>"; ?>
            <tr>
                <td>이름</td>
                <td>정보</td>    
            </th>
            <?php
                if ($result = $mysqli->query("select * from json_table")){
                    while($data = $result->fetch_array()){
                        echo "<tr>";
                        echo "<td>". $data['sname'] . "</td>";
                        echo "<td>". $data['sdata'] . "</td>";
                        echo "</tr>";
                    }
                    $result->close();
                    $mysqli->close();
                }
            ?>
        </table>
    </body>
</html>