<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\CustomersRequest;

/**
 * Class CustomerRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\CustomersRequest $request
 */
class CustomersRequestTest extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new CustomersRequest;
    }

    /** @test */
    public function itCanGetAllCustomers(): void
    {
        $file = __DIR__.'/data/customers/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateACustomer(): void
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanCreateACustomer(): void
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerByRelationId(): void
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerByName(): void
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanGetACustomerById(): void
    {
        $this->markTestIncomplete('Test api is not returning what should be returned');
    }

    /** @test */
    public function itCanDeleteACustomer(): void
    {
        $this->setResponse(null);

        $response = $this->request->getAll();

        $this->assertEmpty((string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
