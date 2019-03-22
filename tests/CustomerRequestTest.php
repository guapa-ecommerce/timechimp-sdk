<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\CustomersRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class CustomerRequestTest extends TestCase
{


    /**
     * @var CustomersRequest
     */
    protected $request;

    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new CustomersRequest('https://api.timechimp.com/');
    }

    /**
     * @param mixed $contents
     * @param int $statusCode
     */
    protected function setResponse($contents, int $statusCode = 200)
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

    /** @test */
    public function itCanGetAllCustomers(): void
    {
        $file = __DIR__.'/data/customers/get_all.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string) $response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateACustomer()
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanCreateACustomer()
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerByRelationId()
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerByName()
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerById()
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanDeleteACustomer()
    {
        $this->setResponse(null);

        $response = $this->request->getAll();

        $this->assertEmpty((string) $response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
