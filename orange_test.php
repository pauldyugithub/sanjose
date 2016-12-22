<?php
    
    $select = $_POST['select'];
    //echo $select;
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    // 連結資料庫
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM save_googlemap where FenceName ="."'".$select."'";
    //echo $sql;
    
    $res = $conn->query($sql);
    $lat_array = array();
    $lng_array = array();
    
    while($row=$res->fetch_array())
    {
        
        $lat_array[] = $row ['lat'];
        $lng_array[] = $row ['lng'];
        
    }
    
    $num = count($lat_array);
    //echo count($lng_array);
    
    for($i = 0; $i<$num; $i++ )
    {
        
        echo $lat_array[$i].",";
        echo $lng_array[$i].";";
    }
       mysqli_close($conn);
?>