<?php

namespace Guapa\TimeChimp;

use Guapa\TimeChimp\Exceptions\ClientException;
use Guapa\TimeChimp\Exceptions\NotFoundException;
use Guapa\TimeChimp\Exceptions\UnauthorizedException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \GuzzleHttp\Client|string
     */
    protected $url = 'https://api.timechimp.com/';

    /**
     * @param string $url
     *
     * @return \Guapa\TimeChimp\AbstractRequest
     */
    public function setUrl(string $url): AbstractRequest
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function createClient(): Client
    {
        if ($this->client === null) {
            // Default Options
            $options = [
                'base_uri' => $this->url,
                'headers'  => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ];

            $this->client = new Client($options);
        }

        return $this->client;
    }

    /**
     * Allows the user to set a specific client should the moment arise.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the request url
     *
     * @param string $resource
     *
     * @return \Psr\Http\Message\UriInterface
     */
    public function getRequestUrl($resource)
    {
        return Psr7\uri_for($this->getApi().'/'.$resource);
    }

    /**
     * Get the Api to call agains
     *
     * @return string
     */
    public function getApi()
    {
        return '/v1';
    }

    /**
     * Execute the request and return the response as a stream
     *
     * @param string $method
     * @param string $resource
     * @param array $parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function execute(string $method, string $resource, array $parameters = []): ResponseInterface
    {
        $method = strtoupper($method);
        $client = $this->createClient();

        try {
            return $client->request($method, $this->getRequestUrl($resource), $parameters);
        } catch (RequestException $exception) {
            $response = \json_decode((string)$exception->getResponse()->getBody(), true);
            $message = $response['message'] ??$exception->getMessage();

            switch ($exception->getCode()) {
                case 401:
                    throw new UnauthorizedException($message, 401, $exception);
                case 404:
                    throw new NotFoundException($message, 404, $exception);
                default:
                    throw new ClientException($message, $exception->getCode(), $exception);
            }
        }
    }
}
