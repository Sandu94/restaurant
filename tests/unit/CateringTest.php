<?php
use PHPUnit\Framework\TestCase;
require_once '\page\catering\page-content-process.php';

class CateringTest extends TestCase
{ 
    public function test_deleteOrder(){
        $this->assertEquals("Success","Success");
        $this->assertTrue(True);
        $this->assertFalse(True);
    }

}