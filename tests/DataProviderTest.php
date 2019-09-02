<?php

require ('./vendor/autoload.php');

use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase
{
    /**
     * @dataProvider sourceData
     */
    public function testAdd($a, $b, $expected, $nul){
        $this->assertSame($expected, $a + $b);
    }

    public function sourceData(){
        return [
            [0,0,0,0],
            [0,1,1,0],
            [1,0,1,0],
            [1,1,2,0]
        ];
    }
}

