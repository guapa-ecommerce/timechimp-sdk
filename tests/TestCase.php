<?php

namespace Guapa\TimeChimp\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Guapa\TimeChimp\AbstractRequest
     */
    protected $request;

    /**
     * @param mixed $contents
     * @param int $statusCode
     */
    protected function setResponse($contents, int $statusCode = 200): void
    {
        $mock = new MockHandler([
            new Response($statusCode, [], $contents),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler,
        ]);
        $this->request->setClient($client);
    }
}
