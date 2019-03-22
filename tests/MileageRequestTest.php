<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\MileageRequest;

/**
 * Class MileageRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\MileageRequest $request
 */
class MileageRequestTest extends TestCase
{

    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new MileageRequest;
    }

    /** @test */
    public function itCanGetMileageByDateRange(): void
    {
        $start = (new \DateTime())->setDate(2019, 1, 1);
        $end = (new \DateTime())->setDate(2019, 1, 31);

        $file = __DIR__.'/data/mileage/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange($start, $end);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function mileageByDateRangeCanBeAString(): void
    {
        $file = __DIR__.'/data/mileage/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange('2019-01-1', '2019-01-31');

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function mileageByDateRangeNeedsToBeAValidDate(): void
    {
        $this->expectException(\Exception::class);
        $this->request->getByDateRange('2019-01-1', '2019-31-01');
    }

    /** @test */
    public function itCanGetMileageByProject()
    {
        $file = __DIR__.'/data/mileage/for_project.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->forProject(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetMileageById()
    {
        $file = __DIR__.'/data/mileage/get.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->get(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAllMileage()
    {
        $file = __DIR__.'/data/mileage/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateAnExpense()
    {
        $file = __DIR__.'/data/mileage/update.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->update([
            'id'              => -81963477,
            'customerId'      => -67716773,
            'customerName'    => 'ullamco consectetur ut ',
            'projectId'       => 33894848,
            'projectName'     => 'magna',
            'vehicleId'       => 47391928,
            'vehicleName'     => 'in est cul',
            'userId'          => 45167270,
            'userDisplayName' => 'velit reprehenderit',
            'date'            => '1993-03-29T08 =>11 =>04.960Z',
            'fromAddress'     => 'aliqua cillum',
            'toAddress'       => 'in fugiat',
            'notes'           => 'qui Lorem irure',
            'distance'        => -4135947.883763969,
            'billable'        => false,
            'type'            => 1,
            'status'          => 2,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanCreateAnExpese()
    {
        $file = __DIR__.'/data/mileage/create.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->create([
            'id'              => 57461571,
            'customerId'      => -54415542,
            'customerName'    => 'in id',
            'projectId'       => 42943506,
            'projectName'     => '',
            'vehicleId'       => -20931634,
            'vehicleName'     => 'dolor',
            'userId'          => -57635890,
            'userDisplayName' => 'non anim in',
            'date'            => '1999-05-24T01 =>28 =>05.542Z',
            'fromAddress'     => 'nisi consequat irure quis ut',
            'toAddress'       => 'deserunt ip',
            'notes'           => 'veniam id voluptate',
            'distance'        => -68340686.39230031,
            'billable'        => false,
            'type'            => 2,
            'status'          => 4,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanDeleteAnExpense()
    {
        $this->setResponse(null);

        $response = $this->request->delete(-80739115);

        $this->assertEmpty((string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
