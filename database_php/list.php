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
                <td>학번</td>
                <td>이름</td>
                <td>폰번호</td> 
                <td>삭제?</td>       
            </th>
            <?php
                function del($id){
                    if($mysqli->query("delete from students where studentID = '$id'") == TRUE){
                        echo "alert('데이터 삭제 완료')";
                        // echo ("<script>location.href='./list.php'</script>");
                    }
                }

                if ($result = $mysqli->query("select * from students")){
                    while($data = $result->fetch_array()){
                        echo "<tr>";
                        echo "<td>". $data['studentID'] . "</td>";
                        echo "<td>". $data['name'] . "</td>";
                        echo "<td>". $data['phonenum'] . "</td>";
                        echo "<td><button onclick="del($data['studentID'])">삭제</button></td>";
                        echo "</tr>";
                    }
                    $result->close();
                    $mysqli->close();
                }
            ?>
        </table>
    </body>
</html>