<?php

class contact {
    public $name_check;
    public $email_check;
    public $message_check;
    public $email_sent;
    public $saved_contact;

    public function check_name($name)   {
        if($name != ''){
            $this->name_check = false;
        } else {
            $this->name_check = true;
        }
        return $this->name_check;
    }
    public function check_email($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email_check = true;
        } else {
            $this->email_check = false;
        }
        return $this->email_check;
    }
    public function check_message($message){
        if($message != '') {
            $this->message_check = true;
        } else {
            $this->message_check = false;
        }
        return $this->message_check;
    }
    public function send_email($name, $email, $phone, $message){
        if($this->email_check && $this->name_check && $this->message_check){
            $to = 'jaredbrigance@gmail.com';
            $email_subject = "Website Contact Form:  $name";
            $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
            $headers = "From: noreply@yourdomain.com\n";
            $headers .= "Reply-To: $email_address";
            $mail_sent = mail($to,$email_subject,$email_body,$headers);
            if($mail_sent) {
                $this->email_sent = true;
            } else {
               $this->email_sent = false;
            }
        }
        return $this->email_sent;
        /*
         * using the mail function as it is built into php.  Most php version don't have it enabled by default
         * Could use phpmailer but would require an account with a username and password
         * Also could use swift mailer but would need an smtp to connect to.
         * Could use sendgrid with swiftmailer, phpmailer, or sendgrid email api as well but requires an account as well as domain authentication
         *
         *
         */
    }
    public function save_contact($name, $email, $phone, $message){
        if($this->email_check && $this->name_check && $this->message_check) {
            //$db = new PDO(...);
            //DataMapper::init($db);
            $st = self::$db->prepare("insert into contacts set full_name = :name, email = :email, phone = :phone,message = :message");
            $st->execute(array(
                ':full_name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':message' => $message
            ));
            $this->saved_contact = true;
        }
        $this->saved_contact = false;
        return $this->saved_contact;
    }
}
?>
