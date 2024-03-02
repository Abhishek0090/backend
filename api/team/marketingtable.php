<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data_array = array();

    $marketing_table_sql = "SELECT * FROM `marketing_data` ORDER BY `id` DESC"; 
    $marketing_table_result = mysqli_query($conn, $marketing_table_sql); 

    while($marketing_table_data = mysqli_fetch_assoc($marketing_table_result))
    {
    
        $id = $marketing_table_data['id'];
        $page_name = $marketing_table_data['page_name'];
        $added_on = $marketing_table_data['added_on'];
        
        $data = $marketing_table_data['data'];
        $data = json_decode($data);

        $marketing_details_array = array(
            'id' => $id,
            'page_name' => $page_name,
            'data' => $data,
            'added_on' => $added_on,
        );

        array_push($data_array, $marketing_details_array);
    }

    echo json_encode($data_array);
?>