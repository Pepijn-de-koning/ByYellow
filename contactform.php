<?php
// ini_set('display_errors', 1);

// if (isset($_POST['submit'])) {

//     $firstname = $_POST['firstname'];
//     $lastname = $_POST['lastname'];
//     $visitor_email = $_POST['email'];
//     $message = $_POST['subject'];

//     $email_body = "Gebruikers naam: $firstname' '$lastname\n" .
//         "Gebruikers Email: $visitor_email\n" .
//         "Bericht: $message.\n";


//     $to = "29118@ma-web.nl";

//     $headers = "From: $firstname \r\n";
//     $headers = "From: $lastname \r\n";
//     $headers = "From: $visitor_email \r\n";

//     $headers .= "Reply-To: $visitor_email \r\n";

//     $result = mail($to, $subject, $email_body, $headers);

//     if ($result === false) {
//         echo 'Mail niet verstuurd';
//         exit;
//     }

//     header("Location: index.html");
//     $message = "De mail is verstuurd!";
//     echo "<script type='text/javascript'>alert('$message');</script>";
// }
?>



<?php 

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $visitor_email = $_POST['email'];
    $message = $_POST['subject'];

    require_once 'vendor/autoload.php';
    require_once 'credential.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
  ->setUsername(EMAIL)
  ->setPassword(PASS)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Byellow' . " " . $firstname . " " . $lastname))
  ->setFrom(['info@byellow.nl' => 'Teun'])
  ->setTo([$visitor_email])
  ->setBody($message . " Naam: " . $firstname . " " . $lastname . "Email: " . $visitor_email)
  ;

// Send the message

if($mailer->send($message)){
    header("Location: index.html#form");
    $end_message = "De mail is verstuurd";
    echo "<script type='text/javascript'>alert('$end_message');</script>";
}else{
    header("Location: index.html");
    $end_message = "De mail is niet verstuurd";
    echo "<script type='text/javascript'>alert('$end_message');</script>";
}




?>
