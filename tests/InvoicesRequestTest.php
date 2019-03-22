<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\InvoicesRequest;

/**
 * Class InvoicesRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\InvoicesRequest $request
 */
class InvoicesRequestTest extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new InvoicesRequest;
    }

    /** @test */
    public function itCanGetAllInvoices(): void
    {
        $file = __DIR__.'/data/invoices/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
