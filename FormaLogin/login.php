<?php
    $dbServer = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "login3";

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
?>
<?php
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

                if($resultCheck >0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['user_first'] . "<br>";
                    echo $row['user_last'] . "<br>";
                    echo $row['user_email'] . "<button>Poke</button><br>";
                }
                }
                ?>