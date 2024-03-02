<?php

    include_once 'new_connect.php';

    $filename = 'freelancers_data_server.json';
    if(file_exists($filename))
    {
        $data = file_get_contents($filename);

        $data = json_decode($data, true);
        
        $number_of_arrays = count($data);

        // $freelancer_id = [3, 4, 7, 8, 9, 10, 11, 12, 14, 21, 23, 24, 26, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 45, 46, 47, 52, 57, 68, 69, 71, 72, 73, 83, 87, 92, 99, 100, 101, 102, 103, 104, 110, 114, 116, 117, 118, 121, 122, 123, 124, 126, 127, 128, 129, 130, 132, 134, 136, 138, 140, 144, 147, 149, 151, 152, 155, 156, 158, 160, 163, 164, 165, 167, 168, 171, 172, 174, 175, 179, 180, 181, 182, 184, 185, 186, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 203, 205, 206, 208, 209, 210, 211, 212, 213, 214, 218, 219, 221, 223, 224, 226, 231, 232, 233, 235, 238, 239, 246, 248, 251, 252, 254, 255, 256, 258, 259, 260, 261, 262, 263, 264, 265, 267, 268, 270, 271, 274, 275, 276, 277, 278, 279, 280, 282, 283, 284, 285, 286, 287, 288, 290, 291, 292, 293, 295, 296, 297, 298, 299, 300, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 313, 314, 316, 317, 320, 322, 323, 324, 325, 326, 327, 328, 330, 331, 340, 346, 351, 356, 357, 359, 361, 362, 365, 366, 367, 368, 369, 371, 372, 374, 375, 376, 377, 378, 379, 380, 381, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 397, 399, 400, 401, 402, 403, 404, 406, 408, 410, 411, 415, 417, 419, 424, 427, 429, 430, 432, 433, 436, 437, 441, 442, 443, 444, 445, 453, 454, 455, 456, 458, 459, 460, 463, 464];
        $freelancer_id = [20, 22, 105, 131, 133, 157, 220, 253, 272, 289, 418, 457];

        foreach($freelancer_id as $freelancer_id)
        {
            // echo "update freelancer id: $freelancer_id <br>";
            // echo "<br>";
            
            for($i = 0; $i < $number_of_arrays; $i++)
            {
                $old_freelancer_id = $data[$i]['id'];

                if($freelancer_id != $old_freelancer_id)
                {
                    
                    continue;
                }
                else
                {
                    $old_freelancer_id = $data[$i]['id'];
                    $old_firstname = $data[$i]['firstname'];
                    $old_lastname = $data[$i]['lastname'];
                    $old_email = $data[$i]['email'];
                    $old_gender = $data[$i]['gender'];
                    $old_whatsapp = $data[$i]['whatsapp'];
                    $old_address = $data[$i]['address'];
                }
            }

            // echo "old freelancer id: $old_freelancer_id <br>";
            // echo "old firstname: $old_firstname <br>";
            // echo "old lastname: $old_lastname <br>";
            // echo "old email: $old_email <br>";
            // echo "old gender: $old_gender <br>";
            // echo "old whatsapp: $old_whatsapp <br>";
            // echo "old address: $old_address <br>";

            $update_sql = "UPDATE `freelancers_map` SET `gender` = '$old_gender', `whatsapp` = '$old_whatsapp', `address` = '$old_address' WHERE `id` = $freelancer_id";
            echo "$update_sql; <br><br>";

        }

        
    }
    else
    {
        var_dump("File does not exist");
    }

?>