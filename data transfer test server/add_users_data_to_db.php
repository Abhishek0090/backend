<?php

    include_once 'new_connect.php';

    $filename = 'users_data.json';
    if(file_exists($filename))
    {
        // var_dump("File exists");

        $data = file_get_contents($filename);
        
        $data = json_decode($data, true);
        
        $number_of_arrays = count($data);
        
        for($i = 0; $i < $number_of_arrays; $i++)
        {
            var_dump($i);

            $old_user_id = $data[$i]['id'];
            $old_firstname = $data[$i]['firstname'];
            $old_lastname = $data[$i]['lastname'];
            $old_college = $data[$i]['college'];
            $old_email = $data[$i]['email'];
            $old_email_verified = $data[$i]['email_verified'];
            $old_country = $data[$i]['country'];
            $old_mobile = $data[$i]['mobile'];
            $old_address = $data[$i]['address'];
            $old_wallet_coins = $data[$i]['wallet_coins'];
            $old_date_of_birth = $data[$i]['date_of_birth'];
            $old_password = $data[$i]['password'];
            $old_date_of_submission = $data[$i]['date_of_submission'];
            $old_agreed = $data[$i]['agreed_to_terms'];

            // echo "User Details";
            // echo "<br>";
            // echo $old_user_id;
            // echo "<br>";
            // echo $old_firstname;
            // echo "<br>";
            // echo $old_lastname;
            // echo "<br>";
            // echo $old_college;
            // echo "<br>";
            // echo $old_email;
            // echo "<br>";
            // echo $old_email_verified;
            // echo "<br>";
            // echo $old_country;
            // echo "<br>";
            // echo $old_mobile;
            // echo "<br>";
            // echo $old_address;
            // echo "<br>";
            // echo $old_wallet_coins;
            // echo "<br>";
            // echo $old_date_of_birth;
            // echo "<br>";
            // echo $old_password;
            // echo "<br>";
            // echo $old_date_of_submission;
            // echo "<br>";
            // echo $old_agreed;
            // echo "<br>";
            // echo "<br>";
            // echo "--------------------------------------------------------------------------------------------------";
            // echo "<br>";
            // echo "<br>";

            $id = $old_user_id;
            $firstname = $old_firstname;
            $lastname = $old_lastname;
            $college = $old_college;
            $email = $old_email;
            $email_verified = $old_email_verified;
            $country = $old_country;
            $number = $old_mobile;
            $number_verified = 0;
            $address = $old_address;
            $is_accepted = 1;
            $signin_method = "manual";
            $password = $old_password;
            $wallet = $old_wallet_coins;
            $date_of_birth = $old_date_of_birth;
            $created = $old_date_of_submission;
            $agreed_to_terms = $old_agreed;

            
            $insert_assignment_sql = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `college`, `email`, `email_verified`, `country`, `number`, `number_verified`, `address`, `is_accepted`, `signin_method`, `password`, `wallet`, `date_of_birth`, `created`, `agreed`) 
            VALUES ('$id', '$firstname', '$lastname', '$college', '$email', '$email_verified', '$country', '$number', '$number_verified', '$address', '$is_accepted', '$signin_method', '$password', '$wallet', '$date_of_birth', '$created', '$agreed_to_terms')";
            echo $insert_assignment_sql;
            echo "<br>";
            $insert_assignment_result = mysqli_query($new_conn, $insert_assignment_sql);
            echo $insert_assignment_result;
            echo "<br>";
        }
    }

    else
    {
        var_dump("File does not exist");
    }

?>