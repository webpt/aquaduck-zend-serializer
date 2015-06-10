<?php

namespace Webpt\Aquaduck\Zend\SerializerTest;

use Webpt\Aquaduck\Zend\Serializer\UnserializerMiddleware;

class UnserializerMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    protected $middleware;

    protected function setUp()
    {
        $this->middleware = new UnserializerMiddleware();
    }

    public function testCanUnserializeValues()
    {
        $middleware = $this->middleware;
        $result = $middleware("a:2:{i:0;i:1;i:1;s:3:\"foo\";}");

        $this->assertInternalType('array', $result);
        $this->assertCount(2, $result);
        $this->assertContains(1, $result);
        $this->assertContains('foo', $result);
    }

    /**
     * @expectedException \Webpt\Aquaduck\Exception\InvalidArgumentException
     */
    public function testThrowsExceptionOnNonString()
    {
        $middleware = $this->middleware;
        $middleware(new \stdClass());
    }
}
