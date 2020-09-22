<?php
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $visitor_email = $_POST['email'];
    $message = $_POST['subject'];

    $email_body = "Gebruikers naam: $firstname' '$lastname\n" .
        "Gebruikers Email: $visitor_email\n" .
        "Bericht: $message.\n";


    $to = "29118@ma-web.nl";

    $headers = "From: $visitor_email \r\n";

    $headers .= "Reply-To: $visitor_email \r\n";

    $result = mail($to, $subject, $email_body, $headers);

    if ($result === false) {
        echo 'Mail niet verstuurd';
        exit;
    }

    header("Location: index.html");
    $message = "De mail is verstuurd!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
