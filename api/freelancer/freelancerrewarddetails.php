<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set("Asia/Kolkata");
    $now = date("Y-m-d H:i:s", strtotime("now"));

    $data_array = array();

    $freelancer_id = $_GET['freelancer_id'];

    $get_all_assignments_data_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `status` = 1";
    $get_all_assignments_result = mysqli_query($conn, $get_all_assignments_data_sql);
    $get_all_assignments_count = mysqli_num_rows($get_all_assignments_result);

    $incomplete = 0;
    $completed = 0;
    while($get_all_assignments_data_row = mysqli_fetch_array($get_all_assignments_result))
    {
        $assignment_id = $get_all_assignments_data_row['assignment_id'];
        $get_assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = $assignment_id";
        $get_assignment_data_result = mysqli_query($conn, $get_assignment_data_sql);
        while($get_assignment_data_row = mysqli_fetch_array($get_assignment_data_result))
        {
            if($get_assignment_data_row['completed'] == 0)
            {
                $incomplete++;
            }
            else if($get_assignment_data_row['completed'] == 1)
            {
                $completed++;
            }
        }
    }

    $get_old_rewards_data = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `claimed` = 1 ORDER BY `id` DESC";
    $get_old_rewards_result = mysqli_query($conn, $get_old_rewards_data);
    $old_rewards_count = mysqli_num_rows($get_old_rewards_result);

    // if($old_rewards_count == 0)
    // {
    //     $freelancer_type = "New";
    // }
    // else
    // {
    //     $freelancer_type = "Old";
    // }

    // check old rewards table for rewards given till current completed assignments

    $old_rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` <= 15 AND `claimed` = 1 ORDER BY `id` DESC";
    $old_rewards_result = mysqli_query($conn, $old_rewards_sql);
    $old_rewards_count = mysqli_num_rows($old_rewards_result);

    if($completed < 5)
    {
        $level = "Bronze I";
        // $reward = "Bluepen Kit";
        $distance = 5 - $completed;
        $goal = 5;
    }
    else if($completed >= 5 && $completed < 15)
    {
        $level = "Bronze II";
        // $reward = "Money Plant";
        $distance = 15 - $completed;
        $goal = 15;
    }
    else if($completed >= 15 && $completed < 20)
    {
        $level = "Bronze III";
        // $reward = "Recharge";
        $distance = 20 - $completed;
        $goal = 20;
    }
    else if($completed >= 20 && $completed < 25)
    {
        $level = "Silver I";
        // $reward = "2 Movie Tickets";
        $distance = 25 - $completed;
        $goal = 25;
    }
    else if($completed >= 25 && $completed < 50)
    {
        $level = "Silver II";
        // $reward = "Bluetooth Earphones";
        $distance = 50 - $completed;
        $goal = 50;
    }
    else if($completed >= 50 && $completed < 100)
    {
        $level = "Silver III";
        // $reward = "Zomato Gold";
        $distance = 100 - $completed;
        $goal = 100;
    }
    else if($completed >= 100 && $completed < 200)
    {
        $level = "Gold I";
        // $reward = "Sneakers";
        $distance = 200 - $completed;
        $goal = 200;
    }
    else if($completed >= 200 && $completed < 300)
    {
        $level = "Gold II";
        // $reward = "Fashion Kit";
        $distance = 300 - $completed;
        $goal = 300;
    }
    else if($completed >= 300 && $completed < 400)
    {
        $level = "Gold III";
        // $reward = "Crypto Dropbox";
        $distance = 400 - $completed;
        $goal = 400;
    }
    else if($completed >= 400 && $completed < 500)
    {
        $level = "Platinum I";
        // $reward = "Goa Trip";
        $distance = 500 - $completed;
        $goal = 500;
    }
    else if($completed >= 500 && $completed < 750)
    {
        $level = "Platinum II";
        // $reward = "Smart TV";
        $distance = 750 - $completed;
        $goal = 750;
    }
    else if($completed >= 750 && $completed < 1000)
    {
        $level = "Platinum III";
        // $reward = "Smartphone";
        $distance = 1000 - $completed;
        $goal = 1000;
    }
    else if($completed >= 1000)
    {
        $level = "Diamond";
        // $reward = "Two Wheeler";
        $distance = 1000 - $completed;
        $goal = 1000;
    }
    else
    {
        $reward = "No Reward";
        $distance = -1;
        $goal = -1;
    }


    // new rewards data
    $rewards_data_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id ORDER BY `id` ASC";
    $rewards_data_result = mysqli_query($conn, $rewards_data_sql);

    $rewards_array = array();

    // level for 5 assignments i.e. Bronze II
    $assignment_count = 5;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Bronze II",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 15 assignments i.e. Bronze III
    $assignment_count = 15;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Bronze III",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 20 assignments i.e. Silver I
    $assignment_count = 20;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Silver I",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 25 assignments i.e. Silver II
    $assignment_count = 25;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Silver II",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 50 assignments i.e. Silver III
    $assignment_count = 50;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Silver III",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 100 assignments i.e. Gold I
    $assignment_count = 100;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Gold I",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 200 assignments i.e. Gold II
    $assignment_count = 200;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Gold II",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 300 assignments i.e. Gold III
    $assignment_count = 300;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Gold III",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 400 assignments i.e. Platinum I
    $assignment_count = 400;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Platinum I",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 500 assignments i.e. Platinum II
    $assignment_count = 500;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Platinum II",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 750 assignments i.e. Platinum III
    $assignment_count = 750;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }
    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Platinum III",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);

    // level for 1000 assignments i.e. Diamond
    $assignment_count = 1000;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "level" => "Diamond",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );
    array_push($rewards_array, $reward_array);









    // old rewards data
    $rewards_data_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id ORDER BY `id` ASC";
    $rewards_data_result = mysqli_query($conn, $rewards_data_sql);
    
    $rewards_array_old = array();

    // rewards data for 3 reward i.e. bluepen kit
    $assignment_count = 3;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Bluepen Kit",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 5 reward i.e. money plant
    $assignment_count = 5;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Money Plant",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 10 reward i.e. Recharge
    $assignment_count = 10;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Recharge",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 15 reward i.e. 2 Movie Ticket
    $assignment_count = 15;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "2 Movie Ticket",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 17 reward i.e. Bluetooth Earphone
    $assignment_count = 17;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Bluetooth Earphone",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 20 reward i.e. Zomato Gold
    $assignment_count = 20;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Zomato Gold",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 25 reward i.e. Sneakers
    $assignment_count = 25;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Sneakers",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 40 reward i.e. Fashion Kit
    $assignment_count = 40;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Fashion Kit",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 50 reward i.e. Crypto Dropbox
    $assignment_count = 50;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Crypto Dropbox",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 75 reward i.e. Goa Trip
    $assignment_count = 75;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Goa Trip",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 100 reward i.e. Smart TV
    $assignment_count = 100;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Smart TV",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 111 reward i.e. Smartphone
    $assignment_count = 111;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Smartphone",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 150 reward i.e. Laptop
    $assignment_count = 150;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Laptop",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    // rewards data for 200 reward i.e. Two Wheeler
    $assignment_count = 200;
    $eligibility_sql = "SELECT * FROM `freelancer_eligible_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $eligibility_result = mysqli_query($conn, $eligibility_sql);
    $eligibility_row = mysqli_fetch_array($eligibility_result);
    if($eligibility_row['status'] == 2)
    {
        $eligible = "Yes";
    }
    else
    {
        $eligible = "No";
    }

    $rewards_sql = "SELECT * FROM `freelancer_reward_claims_old` WHERE `freelancer_id` = $freelancer_id AND `number_of_assignments` = $assignment_count ORDER BY `id` DESC";
    $rewards_result = mysqli_query($conn, $rewards_sql);
    $rewards_row = mysqli_fetch_array($rewards_result);

    $reward_array = array(
        "reward" => "Two Wheeler",
        "goal" => $assignment_count,
        "eligible" => $eligible,
        "claimed" => $rewards_row['claimed'],
        "sent" => $rewards_row['sent'],
        "received" => $rewards_row['received']
    );

    array_push($rewards_array_old, $reward_array);

    echo json_encode(
        array(
            "old_rewards" => $old_rewards_count,
            // "old_rewards_sql" => $old_rewards_sql,
            // "reward" => $reward,
            "level" => $level,
            "distance" => $distance,
            "goal" => $goal,
            "completed" => $completed,
            "incomplete" => $incomplete,
            "rewards_array" => $rewards_array,
            "old_rewards_array" => $rewards_array_old,
        ));
?>