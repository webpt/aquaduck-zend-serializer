<?php

namespace Webpt\Aquaduck\Zend\Serializer;

use Webpt\Aquaduck\Exception\InvalidArgumentException;
use Webpt\Aquaduck\Middleware\AbstractMiddleware;
use Zend\Math\BigInteger\Adapter\AdapterInterface;
use Zend\Serializer\Adapter\PhpSerialize;

class UnserializerMiddleware extends AbstractMiddleware
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
        if (!is_string($subject)) {
            throw new InvalidArgumentException(
                sprintf('%s must be passed a string; received "%s"', __METHOD__, gettype($subject))
            );
        }

        return $this->serializerAdapter->unserialize($subject);
    }
}
