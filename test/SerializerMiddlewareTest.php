<?php

namespace Webpt\Aquaduck\Zend\SerializerTest;

use Webpt\Aquaduck\Zend\Serializer\SerializerMiddleware;

class SerializerMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    protected $middleware;

    protected function setUp()
    {
        $this->middleware = new SerializerMiddleware();
    }

    public function testCanSerializeValues()
    {
        $middleware = $this->middleware;
        $result = $middleware(array(1, 'foo'));

        $this->assertInternalType('string', $result);
    }
}
