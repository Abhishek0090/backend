<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $data_array = array();

    $freelancer_reward_claimsSql = "SELECT freelancer_reward_claims.`id`,freelancer_reward_claims.`freelancer_id`, freelancers_map.`firstname`,freelancers_map.`lastname`,freelancer_reward_claims.`number_of_assignments`,freelancer_reward_claims.`claim_datetime` , freelancer_reward_claims.`claimed` , freelancer_reward_claims.`sent` , freelancer_reward_claims.`received` FROM  `freelancer_reward_claims` JOIN `freelancers_map`ON `freelancers_map`.id = `freelancer_reward_claims`.freelancer_id ORDER BY freelancer_reward_claims.`id` DESC";
    $freelancer_reward_claim_result =  mysqli_query($conn, $freelancer_reward_claimsSql);

    while ($freelancer_reward_claim_data = mysqli_fetch_assoc($freelancer_reward_claim_result))
    {

        $id = $freelancer_reward_claim_data['id'];
        $freelancer_id = $freelancer_reward_claim_data['freelancer_id'];
        $first_name = $freelancer_reward_claim_data['firstname'];
        $last_name = $freelancer_reward_claim_data['lastname'];

        $number_of_assignments1 = $freelancer_reward_claim_data['number_of_assignments'];

        $claim_datetime = $freelancer_reward_claim_data['claim_datetime'];
        $received = $freelancer_reward_claim_data['received'];
        $sent = $freelancer_reward_claim_data['sent'];
        $claimed = $freelancer_reward_claim_data['claimed'];

        if ($reward_exp == '-1')
        {
            $status = "Claim Expired";
            $update = "Claim Expired";
        }
        else if ($reward_exp == '1')
        {
            $status = "Claim Now";
        }
        else  if ($received == '1')
        {
            $status = "Received";
            $update = "Received";
        }
        else if ($sent == '1')
        {
            $status = "Sent";
            $update = "Received";
        }
        else if ($claimed == '1')
        {
            $status = "Claimed";
            $update = "Sent";
        }
        else if ($claimed == '0')
        {
            $status = "Error";
            $update = "Error";
        }

        $freelancer_reward_claim_array = array(
            'id' => $id,
            'freelancer_id' => $freelancer_id,
            'freelancer_name' => $first_name . " " . $last_name,
            'number_of_assignments' => $number_of_assignments1,
            'claim_datetime' => $claim_datetime,
            'status' => $status,
            // 'update' => $update,
        );

        array_push($data_array, $freelancer_reward_claim_array);
    }

echo json_encode($data_array);

?>