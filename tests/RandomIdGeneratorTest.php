<?php
namespace Tests;
use App\RandomIdGenerator;
use ReflectionMethod;

class RandomIdGeneratorTest extends \PHPUnit\Framework\TestCase
{

    function testGetLastSubstrSplittedByDot()
    {
        $id= new RandomIdGenerator();

        $method = new ReflectionMethod($id,'getLastSubstrSplittedByDot');

        $method->setAccessible(true);

        $actualSubstr=$method->invoke($id,'field1.field2.field3');
        $this->assertEquals('field3',$actualSubstr);


        $actualSubstr=$method->invoke($id,'field1');
        $this->assertEquals('field1',$actualSubstr);

        $actualSubstr=$method->invoke($id,'field1#field2#field3');
        $this->assertEquals('field1#field2#field3',$actualSubstr);
    }

    function testGetLastSubstrSplittedByDot_nullOrEmpty()
    {
        $id= new RandomIdGenerator();

        $method = new ReflectionMethod($id,'getLastSubstrSplittedByDot');

        $method->setAccessible(true);

        $actualSubstr=$method->invoke($id,null);
        $this->assertNull($actualSubstr);
    }
}