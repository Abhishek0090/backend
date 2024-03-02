<?php

    // Headers
    // header('Content-Type: multipart/form-data');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    $data = json_decode(file_get_contents("php://input"), true);

    $freelancer_email = $data['email'];
    $freelancer_email_verified = $data['email_verified'];
    $freelancer_country_name = $data['country_name'];
    $freelancer_country_code = $data['country_code'];
    $freelancer_number = $data['number'];
    $freelancer_number_verified = $data['number_verified'];
    $freelancer_role = $data['role'];
    $freelancer_firstname = $data['firstname'];
    $freelancer_lastname = $data['lastname'];
    $freelancer_gender = $data['gender'];
    $freelancer_whatsapp = $data['whatsapp'];
    $freelancer_address = $data['address'];
    $freelancer_street = $data['street'];
    $freelancer_city = $data['city'];
    $freelancer_state = $data['state'];
    $freelancer_pincode = $data['pincode'];
    $freelancer_bio = $data['bio'];
    
    $profile_photo_files_received_random_number = $data['profile_photo_random_number'];
    $profile_photo_files_string = $data['profile_photo'];

    $submit = $data['submit'];

    $response = json_encode(array(
        "message" => "entered",
        "submit" => $submit,
        "role" => $freelancer_role,
    ));

    // if (isset($_POST['submit']))
    if($submit === "submit")
    {
        $response = json_encode(array("message" => "entered"));
        
        if($freelancer_role === "Writer")
        {
            $response =  json_encode(array("message" => "Writer"));

            $is_freelancer_present_sql = "SELECT * FROM `freelancers_map` WHERE `email` = '$freelancer_email'";
            $is_freelancer_present_result = mysqli_query($conn, $is_freelancer_present_sql);
            $is_freelancer_present = mysqli_num_rows($is_freelancer_present_result);

            if($is_freelancer_present == 1)
            {
                // write update query
                $data_in_map_sql = "UPDATE `freelancers_map` SET `writer` = 1, `writer_form_filled` = 1 WHERE `email` = '$freelancer_email'";
                $data_in_map = mysqli_query($conn, $data_in_map_sql);
            }
            else
            {
                // write insert query
                $data_in_map_sql = "INSERT INTO `freelancers_map`(`email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `technical`, `non technical`, `writer`, `writer_form_filled`, `firstname`, `lastname`, `gender`, `whatsapp`, `address`, `street`, `city`, `state`, `pincode`, `agreed`, `non_technical_form_filled`, `technical_form_filled`) 
                VALUES ('$freelancer_email', '$freelancer_email_verified', '$freelancer_country_name', '$freelancer_country_code', '$freelancer_number', '$freelancer_number_verified', 0, 0, 1, 1, '$freelancer_firstname', '$freelancer_lastname', '$freelancer_gender', '$freelancer_whatsapp', '$freelancer_address', '$freelancer_street', '$freelancer_city', '$freelancer_state', '$freelancer_pincode', 1, 0, 0)";
                $data_in_map = mysqli_query($conn, $data_in_map_sql);
            }

            $get_freelancer_id_sql = "SELECT `id` FROM `freelancers_map` WHERE `email` = '$freelancer_email' ORDER BY `id` DESC LIMIT 1";
            $get_freelancer_id_result = mysqli_query($conn, $get_freelancer_id_sql);
            $get_freelancer_id_row = mysqli_fetch_assoc($get_freelancer_id_result);
            $freelancer_id = $get_freelancer_id_row['id'];

            $profile_photo_files = explode('_$_', $profile_photo_files_string);
            // $number_of_profile_photo_files = count($profile_photo_files);
            rename("../../files/uploads/writers/profile_photo/".$profile_photo_files[0], "../../files/writers/profile_photo/".$freelancer_id."_".$profile_photo_files[0]);

            $domains = $data['domains'];
            $is_writing = $domains['writing'];
            $is_diagrams = $domains['diagrams'];
            $is_technical_drawing = $domains['technical_drawing'];
            $is_typing = $domains['typing'];
            $is_art_and_craft = $domains['art_and_craft'];

            if($is_writing == 1)
            {
                $writing_data = $data['writing'];
                $writing_files_string = $writing_data['files'];
                $writing_random_number = $writing_data['random_number'];
                $writing_capacity = $writing_data['writing_capacity'];
                $writing_1day_cost = $writing_data['writing_1day_cost'];
                $writing_2day_cost = $writing_data['writing_2day_cost'];
                $writing_3day_cost = $writing_data['writing_3day_cost'];

                $writing_files = explode('_$_', $writing_files_string);
                $number_of_files = count($writing_files);
                
                if($number_of_files == 2)
                {
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[0], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[0]);
                }
                else if($number_of_files == 3)
                {
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[0], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[0]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[1], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[1]);
                }
                else if($number_of_files == 4)
                {
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[0], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[0]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[1], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[1]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[2], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[2]);
                }
                else if($number_of_files == 5)
                {
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[0], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[0]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[1], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[1]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[2], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[2]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[3], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[3]);
                }
                else if($number_of_files == 6)
                {
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[0], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[0]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[1], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[1]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[2], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[2]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[3], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[3]);
                    rename("../../files/uploads/writers/writing_sample/".$writing_files[4], "../../files/writers/writing_sample/".$freelancer_id."_".$writing_files[4]);
                }
            }
            else
            {
                $writing_capacity = 0;
                $writing_1day_cost = 0;
                $writing_2day_cost = 0;
                $writing_3day_cost = 0;
            }

            if($is_diagrams == 1)
            {
                $diagrams_data = $data['diagrams'];
                $diagrams_files_string = $diagrams_data['files'];
                $diagrams_random_number = $diagrams_data['random_number'];
                $diagrams_cost = $diagrams_data['cost'];

                $diagrams_files = explode('_$_', $diagrams_files_string);
                $number_of_files = count($diagrams_files);

                if($number_of_files == 2)
                {
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[0], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[0]);
                }
                else if($number_of_files == 3)
                {
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[0], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[0]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[1], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[1]);
                }
                else if($number_of_files == 4)
                {
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[0], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[0]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[1], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[1]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[2], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[2]);
                }
                else if($number_of_files == 5)
                {
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[0], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[0]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[1], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[1]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[2], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[2]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[3], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[3]);
                }
                else if($number_of_files == 6)
                {
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[0], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[0]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[1], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[1]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[2], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[2]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[3], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[3]);
                    rename("../../files/uploads/writers/diagram_sample/".$diagrams_files[4], "../../files/writers/diagram_sample/".$freelancer_id."_".$diagrams_files[4]);
                }
            }
            else
            {
                $diagrams_cost = 0;
            }

            if($is_technical_drawing == 1)
            {
                $technical_drawing_data = $data['technical_drawing'];
                $technical_drawing_files_string = $technical_drawing_data['files'];
                $technical_drawing_random_number = $technical_drawing_data['random_number'];
                $technical_drawing_cost = $technical_drawing_data['cost'];

                $technical_drawing_files = explode('_$_', $technical_drawing_files_string);
                $number_of_files = count($technical_drawing_files);

                if($number_of_files == 2)
                {
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[0], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[0]);
                }
                else if($number_of_files == 3)
                {
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[0], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[0]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[1], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[1]);
                }
                else if($number_of_files == 4)
                {
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[0], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[0]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[1], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[1]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[2], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[2]);
                }
                else if($number_of_files == 5)
                {
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[0], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[0]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[1], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[1]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[2], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[2]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[3], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[3]);
                }
                else if($number_of_files == 6)
                {
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[0], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[0]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[1], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[1]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[2], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[2]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[3], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[3]);
                    rename("../../files/uploads/writers/technical_drawing_sample/".$technical_drawing_files[4], "../../files/writers/technical_drawing_sample/".$freelancer_id."_".$technical_drawing_files[4]);
                }                    
            }
            else
            {
                $technical_drawing_cost = 0;
            }

            if($is_typing == 1)
            {
                $typing_data = $data['typing'];
                $typing_cost = $typing_data['cost'];
                $typing_speed = $typing_data['speed'];
            }
            else
            {
                $typing_cost = 0;
                $typing_speed = 0;
            }

            if($is_art_and_craft == 1)
            {
                $art_and_craft_data = $data['art_and_craft'];
                $art_and_craft_files_string = $art_and_craft_data['files'];
                $art_and_craft_type_of_models = $art_and_craft_data['type_of_models'];
                $art_and_craft_random_number = $art_and_craft_data['random_number'];
                $art_and_craft_cost = $art_and_craft_data['cost'];

                $art_and_craft_files = explode('_$_', $art_and_craft_files_string);
                $number_of_files = count($art_and_craft_files);

                if($number_of_files == 2)
                {
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[0], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[0]);
                }
                else if($number_of_files == 3)
                {
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[0], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[0]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[1], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[1]);
                }
                else if($number_of_files == 4)
                {
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[0], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[0]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[1], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[1]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[2], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[2]);
                }
                else if($number_of_files == 5)
                {
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[0], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[0]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[1], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[1]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[2], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[2]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[3], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[3]);
                }
                else if($number_of_files == 6)
                {
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[0], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[0]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[1], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[1]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[2], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[2]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[3], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[3]);
                    rename("../../files/uploads/writers/art_and_craft_sample/".$art_and_craft_files[4], "../../files/writers/art_and_craft_sample/".$freelancer_id."_".$art_and_craft_files[4]);
                }
            }
            else
            {
                $art_and_craft_cost = 0;
            }

            date_default_timezone_set("Asia/Kolkata");
            $now = date("d-m-Y H:i:s");

            $response = json_encode(array(
                "freelancer_id" => $freelancer_id,
                "domains" => $domains,
                "data_in_map_sql" => $data_in_map_sql,
                "data_in_map" => $data_in_map,
                "is_writing" => $is_writing,
                "is_diagrams" => $is_diagrams,
                "is_technical_drawing" => $is_technical_drawing,
                "is_typing" => $is_typing,
                "is_art_and_craft" => $is_art_and_craft,
                "received_data" => $data,
            ));

            $domains = json_encode($domains);
            // $writing_files = json_encode($writing_files);
            
            $insert_into_writer_freelancers_sql = "INSERT INTO `freelancers_writer`(`freelancer_id`, `domains`, `writing`, `diagram`, `ed`, `typing`, `art`, `writing_capacity`, `writing_1day_cost`, `writing_2day_cost`, `writing_3day_cost`, `writing_sample`, `diagram_cost`, `diagram_sample`, `ed_cost`, `ed_sample`, `typing_cost`, `typing_speed`, `art_type_of_models`, `art_cost`, `art_sample`, `bio`, `profile_photo`, `date_of_submission`)
            VALUES ('$freelancer_id', '$domains', '$is_writing', '$is_diagrams', '$is_technical_drawing', '$is_typing', '$is_art_and_craft', '$writing_capacity', '$writing_1day_cost', '$writing_2day_cost', '$writing_3day_cost', '$writing_files_string', $diagrams_cost, '$diagrams_files_string', '$technical_drawing_cost', '$technical_drawing_files_string', '$typing_cost', '$typing_speed', '$art_and_craft_type_of_models', '$art_and_craft_cost', '$art_and_craft_files_string', '$freelancer_bio', '$profile_photo_files_string', '$now')";
            $insert_into_writer_freelancers = mysqli_query($conn, $insert_into_writer_freelancers_sql);

            if($data_in_map == true)
            {
                if($insert_into_writer_freelancers_sql == true)
                {
                    $queries = array(
                        "data_in_map_sql" => $data_in_map_sql,
                        "insert_into_writer_freelancers_sql" => $insert_into_writer_freelancers_sql,
                    );
                    $response = json_encode(array(
                        "message" => "Writer added successfully",
                        "freelancer_id" => $freelancer_id,
                        "queries" => $queries,
                        // "domains" => $domains,
                        // "data_in_map_sql" => $data_in_map_sql,
                        // "data_in_map" => $data_in_map,
                        // "insert_into_writer_freelancers_sql" => $insert_into_writer_freelancers_sql,
                        // "insert_into_writer_freelancers" => $insert_into_writer_freelancers,
                        // "is_writing" => $is_writing,
                        // "is_diagrams" => $is_diagrams,
                        // "is_technical_drawing" => $is_technical_drawing,
                        // "is_typing" => $is_typing,
                        // "is_art_and_craft" => $is_art_and_craft,
                        "received_data" => $data,
                    ));
                }
                else if($insert_into_writer_freelancers_sql == false)
                {
                    $response = json_encode(array(
                        "message" => "Writer signup Failed",
                        // "freelancer_id" => $freelancer_id,
                        // "domains" => $domains,
                        // "data_in_map_sql" => $data_in_map_sql,
                        // "data_in_map" => $data_in_map,
                        // "is_writing" => $is_writing,
                        // "is_diagrams" => $is_diagrams,
                        // "is_technical_drawing" => $is_technical_drawing,
                        // "is_typing" => $is_typing,
                        // "is_art_and_craft" => $is_art_and_craft,
                        // "received_data" => $data,
                    ));
                }
            }
            else if($data_in_map == false)
            {
                $response = json_encode(array(
                    "message" => "Writer not added",
                    // "freelancer_id" => $freelancer_id,
                    // "domains" => $domains,
                    // "data_in_map_sql" => $data_in_map_sql,
                    // "data_in_map" => $data_in_map,
                    // "writing_files" => $writing_files,
                    // "is_writing" => $is_writing,
                    // "is_diagrams" => $is_diagrams,
                    // "is_technical_drawing" => $is_technical_drawing,
                    // "is_typing" => $is_typing,
                    // "is_art_and_craft" => $is_art_and_craft,
                    // "insert_into_writer_freelancers_sql" => $insert_into_writer_freelancers_sql,
                    // "insert_into_writer_freelancers" => $insert_into_writer_freelancers,
                    // "received_data" => $data,
                ));
            }
        }
        else
        {
            $response = json_encode(array(
                "message" => "Not a writer",
                "freelancer_role" => $freelancer_role,
                $received_data = $data,
            ));
        }
    }
    else 
    {
        $response = json_encode(array(
            "message" => "Form not submitted",
            "submitted" => $submit, 
            "received_data" => $data,
        ));
    }

    echo $response;
    
?>