<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $program = htmlspecialchars($_POST['program']);
    $message = htmlspecialchars($_POST['message']);
}

//Admin email where applications are sent
$to = "godswilleduservices@gmail.com";
$subject = "New Admission Application from $name";

$body = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Program: $program\n
    Additional information:\n$message
";

$headers = "From: $email";

//Send email
if (mail($to, $subject, $body, $headers)) {
    header("Loation;thank_you.html");
    exit()
} else {
    echo "There was an error submitting your application. Please try again.";
} else {
    echo "Invalid form submission"
}
?>
