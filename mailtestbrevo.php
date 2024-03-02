<?php
    // header('Content-Type: application/json');
    // header('Access-Control-Allow-Origin: *');
    // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    // header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    
  // ********** API EMAIL START **************

    $toName = 'Bhavya Haria';
    $toEmail = 'bhavyaharia100@gmail.com';
    $fromName = 'bluepen';
    $fromEmail = 'no-reply@bluepen.co.in	';
    $subject = 'TEST SUBJECT';
    $htmlMessage = '<p>Hello '.$toName.',</p><p>This is my first transactional email sent from Sendinblue.</p>';

    $data = array(
        "sender" => array(
            "email" => $fromEmail,
            "name" => $fromName,  
        ),
        "to" => array(
            array(
                "email" => $toEmail,
                "name" => $toName 
                )
        ), 
        "subject" => $subject,
        "htmlContent" => '<html><head></head><body><p>'.$htmlMessage.'</p></p></body></html>'
    ); 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.brevo.com/v3/emailCampaigns');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'Api-Key: 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';
    $headers[] = 'Content-Type: application/json';  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    
    
    if (curl_error($ch))
    {
        echo 'Error:' . curl_error($ch);
    }
    print_r($result);
    
    curl_close($ch);
// *********  EMAIL API END **********************
?>
curl --request POST \
     --url https://api.brevo.com/v3/smtp/email \
     --header 'accept: application/json' \
     --header 'api-key: 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' \
     --header 'content-type: application/json' \
     --data '
{
  "sender": {
    "name": "Mary from MyShop",
    "email": "no-reply@myshop.com"
  },
  "to": [
    {
      "email": "jimmy98@example.com",
      "name": "Jimmy"
    }
  ],
  "replyTo": {
    "email": "ann6533@example.com",
    "name": "Ann"
  },
  "headers": {
    "sender.ip": "1.2.3.4",
    "X-Mailin-custom": "some_custom_header",
    "idempotencyKey": "abc-123"
  },
  "params": {
    "FNAME": "Joe",
    "LNAME": "Doe"
  },
  "htmlContent": "<!DOCTYPE html> <html> <body> <h1>Confirm you email</h1> <p>Please confirm your email address by clicking on the link below</p> </body> </html>",
  "textContent": "Please confirm your email address by clicking on the link https://text.domain.com",
  "subject": "Login Email confirmation",
  "templateId": 2,
  "scheduledAt": "2023-07-05T12:30:00+02:00",
  "batchId": "5c6cfa04-eed9-42c2-8b5c-6d470d978e9d"
}
'