<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $affiliate_array = array();
    // $data = json_decode(file_get_contents("php://input"), true);

    // get all users
    // make code BLUEBH1898
    // BLUE is constant
    // BH is the first letter of the first name and last name
    // if last name is missing then use first two letters of first name
    // if first name is one character then use B and first letter of first name
    // add random 4 digit number ranging from 1000 to 9999
    // concatenate final code 
    // check if code exists
    // if yes then generate new number and concatenate
    // if no then insert into table

    $get_users_sql = "SELECT * FROM users";
    $get_users_result = mysqli_query($conn, $get_users_sql);
    while($get_users_row = mysqli_fetch_assoc($get_users_result))
    {
        $first_name = $get_users_row['firstname'];
        $last_name = $get_users_row['lastname'];
        $email = $get_users_row['email'];
        $user_id = $get_users_row['id'];
        $affiliate_code = '';

        if(ctype_alpha($first_name[0]) && ctype_alpha($last_name[0]))
        {
            // generate code BLUEBH1989 (B and H are from first name and lastname)
            $affiliate_code = 'BLUE'.strtoupper(substr($first_name, 0, 1)).strtoupper(substr($last_name, 0, 1));
        }
        else if(ctype_alpha($first_name[0]) && !ctype_alpha($last_name[0]))
        {
            // generate code BLUEBP1989 (B is from firstname and P is from bluepen)
            $affiliate_code = 'BLUE'.strtoupper(substr($first_name, 0, 1)).'P';
        }
        else if(!ctype_alpha($first_name[0]) && ctype_alpha($last_name[0]))
        {
            // generate code BLUEH1989 (B is from bluepen and H is from lastname)
            $affiliate_code = 'BLUEB'.strtoupper(substr($last_name, 0, 1));
        }
        else if(!ctype_alpha($first_name[0]) && !ctype_alpha($last_name[0]))
        {
            // generate code BLUE1989 (B and P are from bluepen)
            $affiliate_code = 'BLUEBP';
        }
        
        $random_number = rand(1000, 9999);
        $affiliate_code = $affiliate_code.$random_number;
        
        $check_affiliate_code_sql = "SELECT * FROM users WHERE affiliate_code = '$affiliate_code'";
        $check_affiliate_code_result = mysqli_query($conn, $check_affiliate_code_sql);
        while(mysqli_num_rows($check_affiliate_code_result) > 0)
        {
            $random_number = rand(1000, 9999);
            $affiliate_code = $affiliate_code.$random_number;

            // Check if the new affiliate code exists in the database
            $check_affiliate_code_sql = "SELECT * FROM `users` WHERE `affiliate_code` = '$affiliate_code'";
            $check_affiliate_code_result = mysqli_query($conn, $check_affiliate_code_sql);
        }
        $update_affiliate_code_sql = "UPDATE users SET affiliate_code = '$affiliate_code' WHERE id = '$user_id'";
        $update_affiliate_code_result = mysqli_query($conn, $update_affiliate_code_sql);

        $user_data = array(
            'id' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'affiliate_code' => $affiliate_code,
            'update_affiliate_code_result' => $update_affiliate_code_result,
        );
        array_push($affiliate_array, $user_data);
    }

    echo json_encode($affiliate_array);

?>