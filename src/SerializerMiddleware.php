<?php

namespace Webpt\Aquaduck\Zend\Serializer;

use Webpt\Aquaduck\Middleware\AbstractMiddleware;
use Zend\Serializer\Adapter\AdapterInterface;
use Zend\Serializer\Adapter\PhpSerialize;

class SerializerMiddleware extends AbstractMiddleware
{
    protected $serializerAdapter;

    public function __construct(AdapterInterface $serializerAdapter = null)
    {
        if ($serializerAdapter === null) {
            $serializerAdapter = new PhpSerialize();
        }

        $this->serializerAdapter = $serializerAdapter;
    }

    protected function execute($subject)
    {
        return $this->serializerAdapter->serialize($subject);
    }
}
