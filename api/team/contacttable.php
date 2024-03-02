<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data_array = array();

    $contact_table_sql = "SELECT * FROM `contact` ORDER BY `id` DESC"; 
    $contact_table_result = mysqli_query($conn, $contact_table_sql); 

    while($contact_table_data = mysqli_fetch_assoc($contact_table_result))
    {
    
        $id = $contact_table_data['id'];
        $name = $contact_table_data['name'];
        $email = $contact_table_data['email'];
        $message = $contact_table_data['message'];
        $submitted_on = $contact_table_data['submitted_on'];
        
        $utm_data = $contact_table_data['utm_data'];
        $utm_data = json_decode($utm_data);

        $contact_details_array = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'submitted_on' => $submitted_on,
            'utm_data' => $utm_data
        );

        array_push($data_array, $contact_details_array);
    }

    echo json_encode($data_array);
?>