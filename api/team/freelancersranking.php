<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

include '../connect.php';

$datas = array();
$result = mysqli_query($conn, "SELECT * FROM `freelancers_map`");

while ($row = mysqli_fetch_array($result))
{
  $freelancer_id = $row['id'];
  $assigned_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `status` = 1";
  $assigned_result = mysqli_query($conn, $assigned_sql);

  $complete = 0;
  $ongoing = 0;
  while ($assigned_row = mysqli_fetch_array($assigned_result))
  {
    $assignment_id = $assigned_row['assignment_id'];
    // var_dump($assignment_id);
    // $assignment_sql = "SELECT * FROM `assignment_map`  WHERE `id` = $assignment_id";
    $assignment_sql = "SELECT * FROM `assignment_freelance`  WHERE `assignment_id` = $assignment_id";
    // var_dump($assignment_sql);

    $assignment_result = mysqli_query($conn, $assignment_sql);

    while ($assignment_row = mysqli_fetch_array($assignment_result))
    {
      $assignment_id = $assignment_row['id'];

      if ($assignment_row['completed'] == 1)
      {
        // var_dump($assignment_row['id']);
        $complete++;
      }
      if ($assignment_row['completed'] == 0)
      {
        $ongoing++;
      }
    }
  }

  $datas[] = 
  array(
    'id' => $row['id'], 
    'firstname' => $row['firstname'], 
    'lastname' => $row['lastname'], 
    'number' => $row['number'], 
    'complete' => $complete, 
    'ongoing' => $ongoing
  );
  $columns = array_column($datas, 'complete');
  array_multisort($columns, SORT_DESC, $datas);
  // var_dump($datas);
}

echo json_encode($datas);

// $freelancers_list_sql = "SELECT * FROM `freelancers_map`";
// $freelancers_list_result = mysqli_query($conn, $freelancers_list_sql);

// while($freelancers_list_row = mysqli_fetch_array($freelancers_list_result))
// {
//   $freelancer_id = $freelancers_list_row['id'];
//   $freelancer_firstname = $freelancers_list_row['firstname'];
//   $freelancer_lastname = $freelancers_list_row['lastname'];

//   // echo json_encode(array(
//   //     'id' => $freelancer_id,
//   //     'firstname' => $freelancer_firstname,
//   //     'lastname' => $freelancer_lastname,
//   //   ));

//   $get_assignment_data_sql = "SELECT * FROM `assign_to_freelancer` WHERE `freelancer_id` = $freelancer_id AND `status` = 1";
//   $get_assignment_data_result = mysqli_query($conn, $get_assignment_data_sql);
//   $get_assignment_data_count = mysqli_num_rows($get_assignment_data_result);
  
//   // echo json_encode(array(
//   //   'sql' => $get_assignment_data_sql,
//   //   'count' => $get_assignment_data_count
//   // ));

//   if($get_assignment_data_count != 0)
//   {
//     echo json_encode(array(
//       'sql' => $get_assignment_data_sql,
//       'count' => $get_assignment_data_count
//     ));

//     $ongoing_count = 0;
//     $completed_count = 0;
//     $lost_count = 0;
//     $error_count = 0;

//     while($get_assignment_data_row = mysqli_fetch_array($get_assignment_data_result))
//     {
//       $assignment_id = $get_assignment_data_row['assignment_id'];
//       $assignment_data_sql = "SELECT * FROM `assignment_freelance` WHERE `assignment_id` = $assignment_id";
//       $assignment_data_result = mysqli_query($conn, $assignment_data_sql);
//       $assignment_data_row = mysqli_fetch_array($assignment_data_result);
//       $completed = $assignment_data_row['completed'];

//       if($completed == 1)
//       {
//         $completed_count++;
//       }
//       else if($completed == 0)
//       {
//         $ongoing_count++;
//       }
//       else if($completed == -1)
//       {
//         $lost_count++;
//       }
//       else
//       {
//         $error_count++;
//       }

//       // echo json_encode(array(
//       //   'id' => $freelancer_id,
//       //   'firstname' => $freelancer_firstname,
//       //   'lastname' => $freelancer_lastname,
//       //   'assignment_id' => $assignment_id,
//       //   'completed' => $completed
//       // ));
//     }

//     echo json_encode(array(
//       'id' => $freelancer_id,
//       'firstname' => $freelancer_firstname,
//       'lastname' => $freelancer_lastname,
//       'ongoing_count' => $ongoing_count,
//       'completed_count' => $completed_count,
//       'lost_count' => $lost_count,
//       'error_count' => $error_count
//     ));
//   }
  

//   // while($get_assignment_data_row = $get_assignment_data_result)
//   // {
//   //   // $assignment_id = $get_assignment_data_row['assignment_id'];
    
//   //   // echo json_encode(array(
//   //   //   'id' => $freelancer_id,
//   //   //   'firstname' => $freelancer_firstname,
//   //   //   'lastname' => $freelancer_lastname,
//   //   //   'assignment_id' => $assignment_id
//   //   // ));
//   // }
// }

// // echo json_encode(array(
// //   'id' => $freelancer_id,
// //   'firstname' => $freelancer_firstname,
// //   'lastname' => $freelancer_lastname,
// //   'assignment_id' => $assignment_id
// // ));

?>