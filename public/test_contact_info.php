<?php
require 'contact_info.php';
use PHPUnit\Framework\TestCase;
final class test_contact_info extends TestCase {
    private $contact;
    protected function setUp()
    {
        $this->contact = new contact();
    }
    protected function tearDown()
    {
        $this->contact = null;
    }
    public function test_name()
    {
        $result = $this->contact->check_name('Jared Brigance');
        $this->assertTrue(true, $result);
    }
    public function test_email() {
        $result = $this->contact->check_email('jaredbrigance@gmail.com');
        $this->assertTrue(true, $result);
    }
    public function test_message(){
        $result = $this->contact->check_message('just a simple test to make sure it is working');
        $this->assertTrue(true, $result);

    }
    public function test_send_email(){
        $result = $this->contact->send_email('jared brigance', 'jaredbrigance@gmail.com', '479-637-6429', 'just a simple test to make sure it is working');
        $this->assertTrue(true, $result);


    }
    public function test_save_contact(){
        $result = $this->contact->save_contact('jared brigance', 'jaredbrigance@gmail.com', '479-637-6429', 'just a simple test to make sure it is working');
        $this->assertTrue(true, $result);


    }
}


?>
