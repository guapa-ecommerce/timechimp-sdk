<?php

namespace Guapa\TimeChimp;

class CustomersRequest extends AbstractRequest
{
    /**
     * Get all customers.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customers/get-all-customers
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

    /**
     * Update a customer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customers/update-customer
     *
     * @param array $parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $parameters): \Psr\Http\Message\ResponseInterface
    {
        if (! isset($parameters['json'])) {
            $parameters = [
                'json' => $parameters,
            ];
        }

        return $this->execute('put', 'customers', $parameters);
    }

    /**
     * Create a customer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customers/create-new-customer
     *
     * @param array $parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $parameters): \Psr\Http\Message\ResponseInterface
    {
        if (! isset($parameters['json'])) {
            $parameters = [
                'json' => $parameters,
            ];
        }

        return $this->execute('post', 'customers', $parameters);
    }

    /**
     * Get a customer by relation id.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customersrelationidrelationid/get-customer-by-relation-id
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByRelationId($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', "customers/relationid/{$id}");
    }

    /**
     * Get a customer by name.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customersnamename/get-customer-by-name
     *
     * @param string $name
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByName(string $name): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', "customers/name/{$name}");
    }

    /**
     * Get a customer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customersid/get-customer
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', "customers/{$id}");
    }

    /**
     * Delete a customer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customersid/delete-customer
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($id)
    {
        return $this->execute('delete', "customers/{$id}");
    }
}