<?php 

require ('./vendor/autoload.php');

use PHPUnit\Framework\TestCase;

class DependTest extends TestCase
{
    public function testEmpty()
    {
        $stacked = [1,2,3,4];
        $this->assertSame(4, count($stacked));

        return $stacked;
    }

    /**
     * @depends testEmpty
     * testPush akan dijalankan jika testEmpty passed test nya, jika gagal maka gagal seterusnya
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack) - 1]);
        $this->assertNotEmpty($stack);
        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testTerakhir(array $stack)
    {
        $stack = [];
        array_push($stack, 'foo');
        $this->assertSame('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}