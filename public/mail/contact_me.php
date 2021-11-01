<?php
// Check for empty fields
require_once('../contact_info.php');
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$contact = new contact();
$contact->check_name($name);
$contact->check_email($email_address);
$contact->check_message($message);

$contact->send_email($name, $email_address, $phone, $message);
$contact->save_contact($name, $email_address, $phone, $message);

if($contact->email_sent) {
    echo 'Message has been sent';
} else {
    echo "Message has not been sent";
}
return;
?>