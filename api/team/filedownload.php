<?php
$file = $_GET['link'];
// $file=explode('/',$file);
// var_dump($file);
// $n=sizeof($file);

// $file=explode(',',$file[$n-1]);
// var_dump(sizeof($file));
// for($i=0;$i<(sizeof($file)-1);$i++){
// var_dump($file);
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
// }   
}
// else {
//     // echo'File not present';
//     echo json_encode(array(
//         'status' => 'error', 
//         'message' => 'File not present'
//     ));
// }

?>