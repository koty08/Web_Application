<html>
    <body>
        <?php
            $mysqli = new mysqli("164.125.36.78","202055510","ty0201", "202055510");
            if($mysqli->connect_errno){
                die("Failed to connect MySQL");
            }

            if($mysqli->query("insert into students(studentID, name, phonenum) values('$_POST[studentID]', '$_POST[name]', '$_POST[phonenum]')") !== TRUE){
                die("Failed to Insert Data");
            }
            echo "데이터 한행 추가.";
        ?>
    <table border = 1>
        <tr>
            <td>학번</td>
            <td>이름</td>
            <td>폰번호</td>        
        </th>
        <?php
            if ($result = $mysqli->query("select * from students")){
                while($data = $result->fetch_array()){
                    echo "<tr>";
                    echo "<td>". $data['studentID'] . "</td>";
                    echo "<td>". $data['name'] . "</td>";
                    echo "<td>". $data['phonenum'] . "</td>";
                    echo "</tr>";
                }
                $result->close();
                $mysqli->close();
            }
        ?>
    </table>
</body>
</html>

