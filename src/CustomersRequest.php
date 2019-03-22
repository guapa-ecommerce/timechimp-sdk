<?php

namespace Guapa\TimeChimp;

class CustomersRequest extends AbstractRequest
{
    /**
     * Get all customers
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'customers');
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function getByRelationId()
    {

    }

    public function getByName()
    {

    }

    public function get($id)
    {

    }

    public function delete($id)
    {

    }
}