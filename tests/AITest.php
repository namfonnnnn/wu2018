<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_Male1(): void
    {
        $result = AI::getGender('สวัสดีคับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_FeMale(): void
    {
        $result = AI::getGender('สวัสดีค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function testGender_FeMale1(): void
    {
        $result = AI::getGender('สวัสดีจ่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }
    public function test_getSentiment():void{
        $result = AI::getSentiment('มีความสุข');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }
   
    public function test_getSentiment1():void{
        $result = AI::getSentiment('เซ็ง');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function test_getSentiment2():void{
        $result = AI::getSentiment('เศร้า');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }
    public function test_getRudeWords(): void
    {
        $result = AI::getRudeWords('โง่');
        $expected_result = 'โง่';
        $this->assertEquals($expected_result, $result[0]);
    }
    public function test_getLanguages1(): void
    {
        $result = AI::getLanguages('สว้สดี');
        $expected_result = 'TH';
        $this->assertContains($expected_result, $result);
    }
    public function test_getLanguages2(): void
    {
        $result = AI::getLanguages('php');
        $expected_result = 'EN';
        $this->assertContains($expected_result, $result);
    }
    public function test_getLanguages3(): void
    {
        $result = AI::getLanguages('hello');
        $expected_result = 'EN';
        $this->assertContains($expected_result, $result);
    }
    
    
}