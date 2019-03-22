<?php

namespace Guapa\TimeChimp\Tests;

use Guapa\TimeChimp\UsersRequest;

/**
 * Class UsersRequestTest
 *
 * @package Guapa\TimeChimp\Tests
 *
 * @property \Guapa\TimeChimp\UsersRequest $request
 */
class UsersRequestTest extends TestCase
{

    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = new UsersRequest;
    }

    /** @test */
    public function itCanGetAllUser()
    {
        $file = __DIR__.'/data/users/index.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function itCanGetTheCurrentUser()
    {
        $file = __DIR__.'/data/users/me.json';

        $this->setResponse(file_get_contents($file));

        $response = $this->request->getAll();

        $this->assertJsonStringEqualsJsonFile($file, (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
