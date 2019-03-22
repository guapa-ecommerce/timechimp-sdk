<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\ProjectNotesRequest;

/**
 * Class ProjectNotesRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\ProjectNotesRequest $request
 */
class ProjectNotesRequestTest extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new ProjectNotesRequest;
    }

    /** @test */
    public function itCanGetAllProjectNotes()
    {
        $file = __DIR__.'/data/mileage/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateAProjectNote()
    {
        $file = __DIR__.'/data/mileage/update.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->update([
            'id'          => -42206849,
            'description' => 'mollit',
            'date'        => '1981-02-12T19 =>56 =>26.850Z',
            'projectId'   => 50391318,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanCreateAProjectNote()
    {
        $file = __DIR__.'/data/mileage/create.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->create([
            'id'          => 50038896,
            'description' => 'consectetur ex',
            'date'        => '1971-10-25T17 =>06 =>37.332Z',
            'projectId'   => -40444507,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanDeleteAProjectNote()
    {
        $this->setResponse(null);

        $response = $this->request->delete(-42206849);

        $this->assertEmpty((string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAProjectNoteById()
    {
        $file = __DIR__.'/data/projectnotes/get.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->get(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAllProjectNotesForAProject()
    {

        $file = __DIR__.'/data/projectnotes/for_project.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->forProject(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}

