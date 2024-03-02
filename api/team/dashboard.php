<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    // from assignments show:
        //   1. total inquiries
        //   2. under process
        //   3. assigned to pm
        //   4. assigned to freelancer
        //   5. completed
        //   6. review received 
        //   7. lost
        //   8. deleted
    
    // from freelancers show:
        //   1. total freelancers
        //   2. approved
        //   3. rejected
        //   4. interview pending
        //   5. interview conducted
        //   6. agreement sent
        //   7. agreement received

    // from users show
        //   1. total users
        //   2. setup complete
        //   3. setup incomplete

    $data = array();
    
    $total_assignments_sql = "SELECT COUNT(*) AS total_assignments FROM `assignment_freelance`";
    $total_assignments_result = mysqli_query($conn, $total_assignments_sql);
    $total_assignments_data = mysqli_fetch_assoc($total_assignments_result);
    $total_assignments = $total_assignments_data['total_assignments'];

    $under_process_sql = "SELECT COUNT(*) AS under_process FROM `assignment_freelance` WHERE `under_process` = 1";
    $under_process_result = mysqli_query($conn, $under_process_sql);
    $under_process_data = mysqli_fetch_assoc($under_process_result);
    $under_process = $under_process_data['under_process'];

    $assigned_to_pm_sql = "SELECT COUNT(*) AS assigned_to_pm FROM `assignment_freelance` WHERE `assigned_to_pm` = 1";
    $assigned_to_pm_result = mysqli_query($conn, $assigned_to_pm_sql);
    $assigned_to_pm_data = mysqli_fetch_assoc($assigned_to_pm_result);
    $assigned_to_pm = $assigned_to_pm_data['assigned_to_pm'];

    $assigned_to_freelancer_sql = "SELECT COUNT(*) AS assigned_to_freelancer FROM `assignment_freelance` WHERE `assigned_to_freelancer` = 1";
    $assigned_to_freelancer_result = mysqli_query($conn, $assigned_to_freelancer_sql);
    $assigned_to_freelancer_data = mysqli_fetch_assoc($assigned_to_freelancer_result);
    $assigned_to_freelancer = $assigned_to_freelancer_data['assigned_to_freelancer'];

    $completed_sql = "SELECT COUNT(*) AS completed FROM `assignment_freelance` WHERE `completed` = 1";
    $completed_result = mysqli_query($conn, $completed_sql);
    $completed_data = mysqli_fetch_assoc($completed_result);
    $completed = $completed_data['completed'];

    $review_received_sql = "SELECT COUNT(*) AS review_received FROM `assignment_freelance` WHERE `review_recieved` = 1";
    $review_received_result = mysqli_query($conn, $review_received_sql);
    $review_received_data = mysqli_fetch_assoc($review_received_result);
    $review_received = $review_received_data['review_received'];

    $lost_sql = "SELECT COUNT(*) AS lost FROM `assignment_freelance` WHERE `lost` = 1";
    $lost_result = mysqli_query($conn, $lost_sql);
    $lost_data = mysqli_fetch_assoc($lost_result);
    $lost = $lost_data['lost'];

    $resit_sql = "SELECT COUNT(*) AS resit FROM `assignment_freelance` WHERE `resit` = 1";
    $resit_result = mysqli_query($conn, $resit_sql);
    $resit_data = mysqli_fetch_assoc($resit_result);
    $resit = $resit_data['resit'];

    $assignments_data = array(
        'category' => "Assignments",
        'total_assignments' => $total_assignments,
        'under_process' => $under_process,
        'assigned_to_pm' => $assigned_to_pm,
        'assigned_to_freelancer' => $assigned_to_freelancer,
        'completed' => $completed,
        'review_received' => $review_received,
        'lost' => $lost,
        'resit' => $resit,
    );
    array_push($data, $assignments_data);


    $total_freelancers_sql = "SELECT COUNT(*) AS total_freelancers FROM `freelancers_map`";
    $total_freelancers_result = mysqli_query($conn, $total_freelancers_sql);
    $total_freelancers_data = mysqli_fetch_assoc($total_freelancers_result);
    $total_freelancers = $total_freelancers_data['total_freelancers'];

    $approved_sql = "SELECT COUNT(*) AS approved FROM `freelancers_map` WHERE `technical_is_approved` = 1 OR `non_technical_is_approved` = 1";
    $approved_result = mysqli_query($conn, $approved_sql);
    $approved_data = mysqli_fetch_assoc($approved_result);
    $approved = $approved_data['approved'];

    $interview_pending_freelancers_sql = "SELECT COUNT(*) AS interview_pending_freelancers FROM `freelancers_map` WHERE `technical_form_filled` = 1 OR `non_technical_form_filled` = 1";
    $interview_pending_freelancers_result = mysqli_query($conn, $interview_pending_freelancers_sql);
    $interview_pending_freelancers_data = mysqli_fetch_assoc($interview_pending_freelancers_result);
    $interview_pending_freelancers = $interview_pending_freelancers_data['interview_pending_freelancers'];

    $interview_conducted_freelancers_sql = "SELECT COUNT(*) AS interview_conducted_freelancers FROM `freelancers_map` WHERE `technical_interview_conducted` = 1 OR `non_technical_interview_conducted` = 1";
    $interview_conducted_freelancers_result = mysqli_query($conn, $interview_conducted_freelancers_sql);
    $interview_conducted_freelancers_data = mysqli_fetch_assoc($interview_conducted_freelancers_result);
    $interview_conducted_freelancers = $interview_conducted_freelancers_data['interview_conducted_freelancers'];

    $agreement_sent_freelancers_sql = "SELECT COUNT(*) AS agreement_sent_freelancers FROM `freelancers_map` WHERE `technical_agreement_sent` = 1 OR `non_technical_agreement_sent` = 1";
    $agreement_sent_freelancers_result = mysqli_query($conn, $agreement_sent_freelancers_sql);
    $agreement_sent_freelancers_data = mysqli_fetch_assoc($agreement_sent_freelancers_result);
    $agreement_sent_freelancers = $agreement_sent_freelancers_data['agreement_sent_freelancers'];

    $agreement_received_freelancers_sql = "SELECT COUNT(*) AS agreement_received_freelancers FROM `freelancers_map` WHERE `technical_agreement_received` = 1 OR `non_technical_agreement_received` = 1";
    $agreement_received_freelancers_result = mysqli_query($conn, $agreement_received_freelancers_sql);
    $agreement_received_freelancers_data = mysqli_fetch_assoc($agreement_received_freelancers_result);
    $agreement_received_freelancers = $agreement_received_freelancers_data['agreement_received_freelancers'];

    $interview_pending_freelancers = $total_freelancers - $interview_conducted_freelancers;

    $freelancers_data = array(
        'category' => "Freelancers",
        'total_freelancers' => $total_freelancers,
        'approved' => $approved,
        'interview_pending_freelancers' => $interview_pending_freelancers,
        'interview_conducted_freelancers' => $interview_conducted_freelancers,
        'agreement_sent_freelancers' => $agreement_sent_freelancers,
        'agreement_received_freelancers' => $agreement_received_freelancers,
    );
    array_push($data, $freelancers_data);

    $totals_users_sql = "SELECT COUNT(*) AS total_users FROM `users`";
    $totals_users_result = mysqli_query($conn, $totals_users_sql);
    $totals_users_data = mysqli_fetch_assoc($totals_users_result);
    $total_users = $totals_users_data['total_users'];

    $users_data  = array(
        'category' => "Users",
        'total_users' => $total_users,
    );
    array_push($data, $users_data);

    echo json_encode($data);
?>