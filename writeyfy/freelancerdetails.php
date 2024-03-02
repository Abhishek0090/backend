<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");

    include '../connect.php';

    date_default_timezone_set('Asia/Kolkata');
    $now = date("d-m-Y H:i:s");

    $user_id = $_GET['user_id'];

    $freelancer_data_array = array();

    $get_freelancer_details_sql = "SELECT * FROM `freelancers_map` WHERE `user_id` = '$user_id'";
    $get_freelancer_details_result = mysqli_query($conn, $get_freelancer_details_sql);
    $get_freelancer_details_row = mysqli_fetch_assoc($get_freelancer_details_result);

    $freelancer_id = $get_freelancer_details_row['id'];
    $freelancer_name = $get_freelancer_details_row['name'];
    $freelancer_user_name = $get_freelancer_details_row['user_name'];
    $freelancer_address = $get_freelancer_details_row['address'];
    $freelancer_number = $get_freelancer_details_row['number'];
    $freelancer_whatsapp = $get_freelancer_details_row['whatsapp'];
    $freelancer_gender = $get_freelancer_details_row['gender'];
    $freelancer_profile_pic = $get_freelancer_details_row['profile_pic'];
    $freelancer_bio = $get_freelancer_details_row['bio'];
    $freelancer_hand_written = $get_freelancer_details_row['hand_written'];
    $freelancer_ppt_making = $get_freelancer_details_row['ppt_making'];
    $freelancer_technical_drawing = $get_freelancer_details_row['technical_drawing'];
    $freelancer_art_and_craft = $get_freelancer_details_row['art_and_craft'];
    $freelancer_other_requirements = $get_freelancer_details_row['other_requirements'];

    $personal_details_array = array(
        "freelancer_id" => $freelancer_id,
        "freelancer_name" => $freelancer_name,
        "freelancer_user_name" => $freelancer_user_name,
        "freelancer_address" => $freelancer_address,
        "freelancer_number" => $freelancer_number,
        "freelancer_whatsapp" => $freelancer_whatsapp,
        "freelancer_gender" => $freelancer_gender,
        "freelancer_profile_pic" => $freelancer_profile_pic,
        "freelancer_bio" => $freelancer_bio,
    );

    array_push($freelancer_data_array, $personal_details_array);

    if($freelancer_hand_written == 1)
    {
        $get_hand_written_sql = "SELECT * FROM `copy_paste_writing_freelancer` WHERE `user_id` = '$freelancer_id'";
        $get_hand_written_result = mysqli_query($conn, $get_hand_written_sql);
        $get_hand_written_row = mysqli_fetch_assoc($get_hand_written_result);

        $writing_capacity = $get_hand_written_row['writing_capacity'];
        $can_draw = $get_hand_written_row['can_draw'];
        $can_find_content = $get_hand_written_row['can_find_content'];
        $cost_less_than_1_day = $get_hand_written_row['cost_less_than_1_day'];
        $cost_1_to_2_days = $get_hand_written_row['cost_1_to_2_days'];
        $cost_more_than_2_days = $get_hand_written_row['cost_more_than_2_days'];
        $files = $get_hand_written_row['files'];

        $hand_written_array = array(
            "status" => "Present",
            "writing_capacity" => $writing_capacity,
            "can_draw" => $can_draw,
            "can_find_content" => $can_find_content,
            "cost_less_than_1_day" => $cost_less_than_1_day,
            "cost_1_to_2_days" => $cost_1_to_2_days,
            "cost_more_than_2_days" => $cost_more_than_2_days,
            "files" => $files,
        );
    }
    else
    {
        $hand_written_array = array(
            "status" => "Absent",
            "writing_capacity" => "",
            "can_draw" => "",
            "can_find_content" => "",
            "cost_less_than_1_day" => "",
            "cost_1_to_2_days" => "",
            "cost_more_than_2_days" => "",
            "files" => "",
        );
    }
    array_push($freelancer_data_array, $hand_written_array);

    if($freelancer_ppt_making == 1)
    {
        $get_ppt_making_sql = "SELECT * FROM `ppt_making_freelancer` WHERE `user_id` = '$freelancer_id'";
        $get_ppt_making_result = mysqli_query($conn, $get_ppt_making_sql);
        $get_ppt_making_row = mysqli_fetch_assoc($get_ppt_making_result);

        $level = $get_ppt_making_row['level'];
        $experience = $get_ppt_making_row['experience'];
        $cost_per_slide = $get_ppt_making_row['cost_per_slide'];
        $plagiarism_free_content = $get_ppt_making_row['plagiarism_free_content'];
        $speed = $get_ppt_making_row['speed'];
        $subject_tags = $get_ppt_making_row['subject_tags'];
        $files = $get_ppt_making_row['files'];

        $ppt_making_array = array(
            "status" => "Present",
            "level" => $level,
            "experience" => $experience,
            "cost_per_slide" => $cost_per_slide,
            "plagiarism_free_content" => $plagiarism_free_content,
            "speed" => $speed,
            "subject_tags" => $subject_tags,
            "files" => $files,
        );
    }
    else
    {
        $ppt_making_array = array(
            "status" => "Absent",
            "level" => "",
            "experience" => "",
            "cost_per_slide" => "",
            "plagiarism_free_content" => "",
            "speed" => "",
            "subject_tags" => "",
            "files" => "",
        );
    }
    array_push($freelancer_data_array, $ppt_making_array);

    if($freelancer_technical_drawing == 1)
    {
        $get_technical_drawing_sql = "SELECT * FROM `technical_drawing_freelancer` WHERE `user_id` = '$freelancer_id'";
        $get_technical_drawing_result = mysqli_query($conn, $get_technical_drawing_sql);
        $get_technical_drawing_row = mysqli_fetch_assoc($get_technical_drawing_result);

        $experience = $get_technical_drawing_row['experience'];
        $cost_per_diagram = $get_technical_drawing_row['cost_per_diagram'];
        $solve_on_your_own = $get_technical_drawing_row['solve_on_your_own'];
        $types = $get_technical_drawing_row['types'];
        $copy_paste = $get_technical_drawing_row['copy_paste'];
        $softwares = $get_technical_drawing_row['softwares'];
        $files = $get_technical_drawing_row['files'];

        $technical_drawing_array = array(
            "status" => "Present",
            "experience" => $experience,
            "cost_per_diagram" => $cost_per_diagram,
            "solve_on_your_own" => $solve_on_your_own,
            "types" => $types,
            "copy_paste" => $copy_paste,
            "softwares" => $softwares,
            "files" => $files,
        );
    }
    else
    {
        $technical_drawing_array = array(
            "status" => "Absent",
            "experience" => "",
            "cost_per_diagram" => "",
            "solve_on_your_own" => "",
            "types" => "",
            "copy_paste" => "",
            "softwares" => "",
            "files" => "",
        );
    }
    array_push($freelancer_data_array, $technical_drawing_array);

    if($freelancer_art_and_craft == 1)
    {
        $get_art_and_craft_sql = "SELECT * FROM `art_and_craft_freelancer` WHERE `user_id` = '$freelancer_id'";
        $get_art_and_craft_result = mysqli_query($conn, $get_art_and_craft_sql);
        $get_art_and_craft_row = mysqli_fetch_assoc($get_art_and_craft_result);

        $experience = $get_art_and_craft_row['experience'];
        $cost_per_piece = $get_art_and_craft_row['cost_per_piece'];
        $make_own = $get_art_and_craft_row['make_own'];
        $category = $get_art_and_craft_row['category'];
        $files = $get_art_and_craft_row['files'];

        $art_and_craft_array = array(
            "status" => "Present",
            "experience" => $experience,
            "cost_per_piece" => $cost_per_piece,
            "make_own" => $make_own,
            "category" => $category,
            "files" => $files,
        );
    }
    else
    {
        $art_and_craft_array = array(
            "status" => "Absent",
            "experience" => "",
            "cost_per_piece" => "",
            "make_own" => "",
            "category" => "",
            "files" => "",
        );
    }
    array_push($freelancer_data_array, $art_and_craft_array);

    if($freelancer_other_requirements == 1)
    {
        $get_other_requirements_sql = "SELECT * FROM `other_requirements_freelancer` WHERE `user_id` = '$freelancer_id'";
        $get_other_requirements_result = mysqli_query($conn, $get_other_requirements_sql);
        $get_other_requirements_row = mysqli_fetch_assoc($get_other_requirements_result);

        $category = $get_other_requirements_row['category'];
        $subject_tags = $get_other_requirements_row['subject_tags'];
        $qualifications = $get_other_requirements_row['qualifications'];
        $education = $get_other_requirements_row['education'];
        $experience = $get_other_requirements_row['experience'];
        $publications = $get_other_requirements_row['publications'];
        $portfolio = $get_other_requirements_row['portfolio'];
        $linkedin = $get_other_requirements_row['linkedin'];

        $other_requirements_array = array(
            "status" => "Present",
            "category" => $category,
            "subject_tags" => $subject_tags,
            "qualifications" => $qualifications,
            "education" => $education,
            "experience" => $experience,
            "publications" => $publications,
            "portfolio" => $portfolio,
            "linkedin" => $linkedin,
        );
    }
    else
    {
        $other_requirements_array = array(
            "status" => "Absent",
            "category" => "",
            "subject_tags" => "",
            "qualifications" => "",
            "education" => "",
            "experience" => "",
            "publications" => "",
            "portfolio" => "",
            "linkedin" => "",
        );
    }
    array_push($freelancer_data_array, $other_requirements_array);

    $response = array(
        "status" => "success",
        "message" => "Freelancer details fetched successfully",
        "freelancer_data_array" => $freelancer_data_array,
    );

?>