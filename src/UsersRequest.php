<?php

namespace Guapa\TimeChimp;

class UsersRequest extends AbstractRequest
{
    /**
     * Get all users.
     *
     * @see https://timechimp.docs.apiary.io/#reference/users/v1users/get-all-users
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'users');
    }

    /**
     * Get the current user.
     *
     * @see https://timechimp.docs.apiary.io/#reference/users/v1usersme/get-current-user
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function me(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'users/me');
    }
}
