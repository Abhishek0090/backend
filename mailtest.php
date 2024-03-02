<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    
    require ('mail_test/sendgrid-php.php');

    $apikey = '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' ;

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("dev.biosphere@gmail.com", "no reply bluepen");
    $email->setSubject("Sending with SendGrid is Fun");
    $email->addTo("bhavyaharia100@gmail.com", "Example User");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
        "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );
    $sendgrid = new \SendGrid($apikey);
    try
    {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } 
    catch (Exception $e)
    {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
?>


<!-- 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 -->