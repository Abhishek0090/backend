<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data_array = array();

    $get_freelancer_reward_claims_sql = "SELECT * FROM `freelancer_reward_claims` ORDER BY `id` DESC";
    $get_freelancer_reward_claims = mysqli_query($conn, $get_freelancer_reward_claims_sql);
    while($get_freelancer_reward_claims_data = mysqli_fetch_assoc($get_freelancer_reward_claims))
    {
        // array_push($data_array, $get_freelancer_reward_claims_data);
        $claim_id = $get_freelancer_reward_claims_data['id'];
        $freelancer_id = $get_freelancer_reward_claims_data['freelancer_id'];
        $number_of_assignments = $get_freelancer_reward_claims_data['number_of_assignments'];
        $claim_datetime = $get_freelancer_reward_claims_data['claim_datetime'];
        $claimed = $get_freelancer_reward_claims_data['claimed'];
        $sent = $get_freelancer_reward_claims_data['sent'];
        $received = $get_freelancer_reward_claims_data['received'];

        // $freelancer_id = 47;
        $get_freelancer_data_sql = "SELECT * FROM `freelancers_map` WHERE `id` = '$freelancer_id'";
        $get_freelancer_data = mysqli_query($conn, $get_freelancer_data_sql);
        $get_freelancer_data_row = mysqli_fetch_assoc($get_freelancer_data);

        $freelancer_firstname = $get_freelancer_data_row['firstname'];
        $freelancer_lastname = $get_freelancer_data_row['lastname'];
        $freelancer_name = $freelancer_firstname . " " . $freelancer_lastname;

        // do switch case for number of assignments
        switch($number_of_assignments)
        {
            case 3:
                $reward = "Bluepen Kit";
                break;
            case 5:
                $reward = "Money Plant";
                break;
            case 10:
                $reward = "Recharge";
                break;
            case 15:
                $reward = "2 Movie Tickets";
                break;
            case 17:
                $reward = "Bluetooth Earphones";
                break;
            case 20:
                $reward = "Zomato Gold";
                break;
            case 25:
                $reward = "Sneakers";
                break;
            case 40:
                $reward = "Fashion Kit";
                break;
            case 50:
                $reward = "Crypto Dropbox";
                break;
            case 75:
                $reward = "Goa Trip";
                break;
            case 100:
                $reward = "Smart TV";
                break;
            case 111:
                $reward = "Smartphone";
                break;
            case 150:
                $reward = "Laptop";
                break;
            case 200:
                $reward = "Two Wheeler";
                break;
            default:
                $reward = 0;
        }

        $data = array(
            "claim_id" => $claim_id,
            "freelancer_id" => $freelancer_id,
            // "freelancer_sql" => $get_freelancer_data_sql,
            "freelancer_name" => $freelancer_name,
            "number_of_assignments" => $number_of_assignments,
            "reward" => $reward,
            "claim_datetime" => $claim_datetime,
            "claimed" => $claimed,
            "sent" => $sent,
            "received" => $received
        );

        array_push($data_array, $data);
    }

    $json_data = json_encode($data_array);
    $result = file_put_contents('freelancer_reward_data_local.json', $json_data);
    echo json_encode(array(
        "result" => $result,
        "data" => $data_array
    ));
?>