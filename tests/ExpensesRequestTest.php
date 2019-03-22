<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\ExpensesRequest;

/**
 * Class ExpensesRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\ExpensesRequest $request
 */
class ExpensesRequestTest extends TestCase
{

    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new ExpensesRequest;
    }

    /** @test */
    public function itCanGetExpensesByDateRange(): void
    {
        $start = (new \DateTime())->setDate(2019, 1, 1);
        $end = (new \DateTime())->setDate(2019, 1, 31);

        $file = __DIR__.'/data/expenses/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange($start, $end);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function expensesByDateRangeCanBeAString(): void
    {
        $file = __DIR__.'/data/expenses/date_range.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getByDateRange('2019-01-1', '2019-01-31');

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function expensesByDateRangeNeedsToBeAValidDate(): void
    {
        $this->expectException(\Exception::class);
        $this->request->getByDateRange('2019-01-1', '2019-31-01');
    }

    /** @test */
    public function itCanGetExpensesByProject()
    {
        $file = __DIR__.'/data/expenses/for_project.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->forProject(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetExpensesById()
    {
        $file = __DIR__.'/data/expenses/get.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->get(1);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetAllExpenses()
    {
        $file = __DIR__.'/data/expenses/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanUpdateAnExpense()
    {
        $file = __DIR__.'/data/expenses/update.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->update([
            'id'              => 75972066,
            'customerId'      => 2683812,
            'customerName'    => 'anim nisi Duis',
            'projectId'       => -55375245,
            'projectName'     => 'minim cillum est',
            'categoryName'    => 'eiusmod tempor culpa id',
            'categoryId'      => -80830887,
            'userId'          => 12038998,
            'userDisplayName' => 'cupidatat veniam sint in',
            'date'            => '1954-11-28T07 =>54 =>05.817Z',
            'notes'           => 'Excepteur sunt ullamco',
            'attachment'      => 'irure aliqua eu commodo dolore',
            'quantity'        => 82993125.80097505,
            'rate'            => -55791626.84944356,
            'tax'             => -51428658.4957496,
            'billable'        => false,
            'status'          => 1,
        ]);

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanCreateAnExpese()
    {
        $file = __DIR__.'/data/expenses/create.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->create([
            'customerId'      => -76223598,
            'customerName'    => 'dolor ut',
            'projectId'       => -84545586,
            'projectName'     => 'et ut',
            'categoryName'    => 'ut non ipsum Lorem',
            'categoryId'      => 74927363,
            'userId'          => -74707834,
            'userDisplayName' => 'do',
            'date'            => '1962-12-31T21 =>31 =>56.697Z',
            'notes'           => 'Ut anim',
            'attachment'      => 'elit voluptate labore',
            'quantity'        => 57837568.878623456,
            'rate'            => -12519251.68377021,
            'tax'             => 86102218.02420339,
            'billable'        => true,
            'status'          => 0,
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
