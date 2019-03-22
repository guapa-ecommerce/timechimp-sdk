<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\TimeRequest;

/**
 * Class TimeRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\TimeRequest $request
 */
class TimeRequestTest extends TestCase
{

    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new TimeRequest;
    }

    /** @test */
    public function itCanGetTimeEntriesByDateRange(): void
    {
        $start = (new \DateTime())->setDate(2019, 1, 1);
        $end = (new \DateTime())->setDate(2019, 1, 31);

        $file = __DIR__.'/data/time/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange($start, $end);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function timeEntriesByDateRangeCanBeAString(): void
    {
        $file = __DIR__.'/data/time/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange('2019-01-1', '2019-01-31');

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function timeEntriesByDateRangeNeedsToBeAValidDate(): void
    {
        $this->expectException(\Exception::class);
        $this->request->getByDateRange('2019-01-1', '2019-31-01');
    }

    /** @test */
    public function itCanGetTimeEntriesByProject()
    {
        $file = __DIR__.'/data/time/for_project.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->forProject(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetATimeEntryById()
    {
        $file = __DIR__.'/data/time/get.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->get(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAllTimeEntities()
    {
        $file = __DIR__.'/data/time/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateATimeEntry()
    {
        $file = __DIR__.'/data/time/update.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->update([
            'id'              => -67340052,
            'customerId'      => 85176112,
            'customerName'    => 'dolore ad nulla et ea',
            'projectId'       => 64721546,
            'projectName'     => 'qui in magna consequat eu',
            'projectTaskId'   => 60630748,
            'taskId'          => 94380562,
            'taskName'        => 'est in Lorem anim',
            'userId'          => -26754334,
            'userDisplayName' => 'est',
            'userTags'        => [
                'enim dolor irure Excepteur',
                'Lorem culpa',
                'reprehenderit sint',
                'Excepteur consequat',
            ],
            'date'            => '1971-08-21T06 =>52 =>37.799Z',
            'hours'           => -95677554.29866876,
            'notes'           => 'Duis ea commodo occaecat',
            'status'          => 1,
            'startEnd'        => 'proident nostrud ut esse',
            'pause'           => 79828141.78747845,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanCreateATimeEntry()
    {
        $file = __DIR__.'/data/time/create.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->create([
            'id'              => 45372313,
            'customerId'      => 12029911,
            'customerName'    => 'occaecat',
            'projectId'       => 86699811,
            'projectName'     => 'sint ad Lorem',
            'projectTaskId'   => 19410381,
            'taskId'          => 72492423,
            'taskName'        => 'ullamco magna',
            'userId'          => -75289899,
            'userDisplayName' => 'nulla nisi',
            'userTags'        => [
                'ad pariatur',
                'quis sunt Ut',
                'in est et',
                'ex in consequat velit',
            ],
            'date'            => '1944-12-09T04 =>14 =>26.682Z',
            'hours'           => -79373235.93306443,
            'notes'           => 'non dolor magna dolor reprehenderit',
            'status'          => 0,
            'startEnd'        => 'culpa commodo dolor',
            'pause'           => -68814270.6541205,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanDeleteATimeEntry()
    {
        $this->setResponse(null);

        $response = $this->request->delete(-80739115);

        $this->assertEmpty((string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanStartATimer()
    {
        $this->setResponse('1980-06-22T10:00:31.437Z');

        $response = $this->request->startTimer(123);

        $this->assertEquals('1980-06-22T10:00:31.437Z', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanStopATimer()
    {
        $this->setResponse('-34979659.0364587');

        $response = $this->request->stopTimer(123);

        $this->assertEquals('-34979659.0364587', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
