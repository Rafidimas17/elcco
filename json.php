<?php 

    include("connect.php");
    $sql = mysqli_query($conn, "SELECT * FROM datasensor");
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));

?>