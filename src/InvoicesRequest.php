<?php

namespace Guapa\TimeChimp;

class InvoicesRequest extends AbstractRequest
{

    /**
     * Get all invoices.
     *
     * @see https://timechimp.docs.apiary.io/#reference/invoices/v1invoices/get-all-invoices
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'invoices');
    }
}
