<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $id = $_GET['id'];
    // $status = $_GET['status'];

    $update_status_sql = "UPDATE `assignment_freelance` SET `completed` = 1  WHERE `assignment_id` = $id";
    $update_status_result = mysqli_query($conn, $update_status_sql);

    if($update_status_result)
    {
        $message = "Status Updated to Completed Successfully";
        $status = 200;

        $counter_data = array();

        $freelancer_id_sql = "SELECT * FROM `assign_to_freelancer` WHERE `assignment_id` = $id";
        $freelancer_id_result = mysqli_query($conn, $freelancer_id_sql);
        while($freelancer_id_row = mysqli_fetch_assoc($freelancer_id_result))
        {
            $freelancer_id = $freelancer_id_row['freelancer_id'];
            $completed_counter = 0;

            $freelancer_completed_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `status` = 1";
            $freelancer_completed_result = mysqli_query($conn, $freelancer_completed_sql);
            while($freelancer_completed_row = mysqli_fetch_assoc($freelancer_completed_result))
            {
                $assignment_id = $freelancer_completed_row['assignment_id'];
                $assignment_status_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = $assignment_id";
                $assignment_status_result = mysqli_query($conn, $assignment_status_sql);
                $assignment_row = mysqli_fetch_assoc($assignment_status_result);
                $assignment_status = $assignment_row['completed'];
                if($assignment_status == 1)
                {
                    $completed_counter++;
                }
                // echo json_encode(array(
                //     'freelancer_id' => $freelancer_id,
                //     'assignment_status_sql' => $assignment_status_sql,
                //     'assignment_status' => $assignment_status,
                //     'completed_counter' => $completed_counter,
                // ));
            }

            // echo json_encode(array(
            //     'freelancer_id' => $freelancer_id,
            //     'completed_counter' => $completed_counter,
            // ));
            // check counter here and assign rewards accordingly
            if($completed_counter >= 5)
            {
                switch ($completed_counter)
                {
                    case 5:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 5 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '3 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 5 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '5 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 15:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 15 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '10 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 15 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '15 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 20:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 20 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '15 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 20 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '20 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 25:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 25 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '17 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 25 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '25 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 50:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 50 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '20 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 50 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '50 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 100:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 100 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '25 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 100 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '100 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 200:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 200 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '40 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 200 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '200 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 300:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 300 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '50 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 300 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '300 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 400:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 400 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '75 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 400 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '400 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 500:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 500 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '100 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 500 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '500 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 750:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 750 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '111 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 750 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '750 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    case 1000:
                        $eligible_sql = "INSERT INTO `freelancer_eligible` (`freelancer_id` , `number_of_assignments`, `status`) VALUES ('$freelancer_id', '$completed_counter', 1)";
                        mysqli_query($conn, $eligible_sql) or die("couldn't set 1000 eligible status");
                        // echo "freelancer id: ".$freelancer_id." is eligible for: ";
                        // echo '150 reward';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is eligible for 1000 reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => '1000 reward',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                    default:
                        // echo 'freelancer id: '.$freelancer_id.' no milestone';
                        // echo "<br>";
                        $message = $message." and $freelancer_id is not eligible for any reward";
                        $freelancer_data = array(
                            'freelancer_id' => $freelancer_id,
                            'reward' => 'no milestone',
                        );
                        array_push($counter_data, $freelancer_data);
                        continue 2;
                }
            }
            elseif($completed_counter < 5)
            {
                    // var_dump("no reward");
                    // echo 'freelancer id: '.$freelancer_id.' no reward';
                    // echo "<br>";
                    $message = $message." and $freelancer_id is not eligible for any reward";
                    $freelancer_data = array(
                        'freelancer_id' => $freelancer_id,
                        'reward' => 'no reward',
                    );
                    array_push($counter_data, $freelancer_data);
                    continue;
            }
            // $freelancer_data = array(
            //     'freelancer_id' => $freelancer_id,
            //     'completed_counter' => $completed_counter,
            // );
            // array_push($counter_data, $freelancer_data);
        }
    }
    else
    {
        $message = "Error";
    }

    // $decoded_array = json_decode($counter_data, true);

    echo json_encode(array(
        'status' => $status,
        'message' => $message,
        'counter_data' => $counter_data,
        'freelancer_id_sql' => $freelancer_id_sql,
        'freelancer_completed_sql' => $freelancer_completed_sql,
        'eligible_sql' => $eligible_sql,
    ));

?>