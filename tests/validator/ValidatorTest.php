<?php
use App\Validator\Validator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidatorTest
 *
 * @author axurt
 */
class ValidatorTest extends PHPUnit\Framework\TestCase {

    protected $validator;

    public function setUp() : void {
        $this->validator = new Validator('', '');
    }

    public function tearDown() : void {
        $this->test = '';
    }

    public function testSize() {
        $data = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea co';
        $limit = 255;
        $this->assertSame(
                false,
                $this->validator->size($data, $limit)
                );
        $limit = 20000;
        $this->assertSame(
                true,
                $this->validator->size($data, $limit)
                );
    }
    
    /**
     * @dataProvider emptyProvider
     */
    
    public function testEmpty($data, $requirement, $result) {
        $this->assertSame(
            $this->validator->empty($data, $requirement),
            $result
                );
    }
    
    public function emptyProvider()
    {
        return [
            ['', false, true],
            ['', true, false],
            ['aaa', true, true],
            ['ssss', false, true],
        ];
    }
    
    /**
     * @dataProvider symbolsProvider
     */
    
    public function testSymbols($data, $requirement, $result) {
        $this->assertSame(
            $this->validator->symbols($data, $requirement),
            $result
                );
    }
    
    
    
    public function symbolsProvider()
    {
        return [
            ['', false, true],
            ['aaa', ['*', '#'], false],
            ['*aaa#', ['*', '#'], true],
            ['*aaa', ['*', '#'], false],
        ];
    }

}
