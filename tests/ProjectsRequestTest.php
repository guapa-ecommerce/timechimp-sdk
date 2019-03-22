<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\ProjectsRequest;

/**
 * Class ProjectsRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\ProjectsRequest $request
 */
class ProjectsRequestTest extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new ProjectsRequest;
    }

    /** @test */
    public function itCanGetAllProjects()
    {
        $file = __DIR__.'/data/projects/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateAProject()
    {
        $file = __DIR__.'/data/projects/update.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->update([
            'customerId' => -28748864,
            'name'       => 'tempor consectetur in ullamco',
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanCreateAProject()
    {
        $file = __DIR__.'/data/projects/create.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->create([
            'customerId' => 45034203,
            'name'       => 'esse dolore',
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanDeleteAProject()
    {
        $this->setResponse(null);

        $response = $this->request->delete(-42206849);

        $this->assertEmpty((string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAProjectById()
    {
        $file = __DIR__.'/data/projects/get.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->get(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAllProjectsForACustomer()
    {
        $file = __DIR__.'/data/projects/for_customer.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->forProject(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
