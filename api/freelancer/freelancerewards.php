<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $data_array = array();

    $freelancer_id = $_GET['freelancer_id'];

    $freelancer_eligible_sql = "SELECT `id`,`freelancer_id`,`number_of_assignments` , `status` , `made_on` FROM `freelancer_eligible` WHERE `freelancer_id` = '$freelancer_id' AND `status` = '2' ORDER BY `id` ASC";

    $freelancer_eligible_result = mysqli_query($conn, $freelancer_eligible_sql);

    while ($freelancer_eligible_data  = mysqli_fetch_assoc($freelancer_eligible_result)) {

        $number_of_assignments = $freelancer_eligible_data['number_of_assignments'];
        $start_date = $freelancer_eligible_data['made_on'];

        $made_on = explode(' ', $start_date);
        $date = date_create_from_format('d/m/Y', $made_on[0]);
        if ($date !== false) {
            date_add($date, date_interval_create_from_date_string("14 days"));
            $exp_date = date_format($date, 'd/m/Y');
            $today = date("d/m/Y");
            $reward_exp = strcmp($exp_date, $today) == 0;
        } else {
            // echo "Invalid date format";
        }

        $freelancer_reward_claimsSql = "SELECT `id`,`number_of_assignments`,`claim_datetime` , `claimed` , `sent` , `received` FROM  `freelancer_reward_claims` WHERE `number_of_assignments` = '$number_of_assignments' AND `freelancer_id` = '$freelancer_id' ORDER BY `id` ASC   ";

        $freelancer_reward_claim_result =  mysqli_query($conn, $freelancer_reward_claimsSql);

        while ($freelancer_reward_claim_data = mysqli_fetch_assoc($freelancer_reward_claim_result)) {

            $id = $freelancer_reward_claim_data['id'];
            $number_of_assignments1 = $freelancer_reward_claim_data['number_of_assignments'];

            $claim_datetime = $freelancer_reward_claim_data['claim_datetime'];
            $received = $freelancer_reward_claim_data['received'];
            $sent = $freelancer_reward_claim_data['sent'];
            $claimed = $freelancer_reward_claim_data['claimed'];

            if ($reward_exp == '-1') {
                $status = "Claim Expired";
            } else if ($reward_exp == '1') {
                $status = "Claim Now";
            } else  if ($received == '1') {
                $status = "Received";
            } else if ($sent == '1') {
                $status = "In-Transit";
            } else if ($claimed == '1') {
                $status = "Claimed";
            } else if ($claimed == '0') {
                $status = "Error";
            }

            $freelancer_reward_claim_array = array(
                'id' => $id,
                'number_of_assignments' => $number_of_assignments1,
                'claim_datetime' => $claim_datetime,
                'status' => $status
            );

            array_push($data_array, $freelancer_reward_claim_array);
        }
    }

    echo json_encode($data_array);

?>