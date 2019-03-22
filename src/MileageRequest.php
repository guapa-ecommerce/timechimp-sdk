<?php

namespace Guapa\TimeChimp;

class MileageRequest extends AbstractRequest
{
    /**
     * Get all mileages by date range.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileagedaterangestartdateenddate/get-mileage-by-date-range
     *
     * @param \DateTime|string $start
     * @param \DateTime|string $end
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByDateRange($start, $end): \Psr\Http\Message\ResponseInterface
    {
        if (! $start instanceof \DateTime) {
            $start = new \DateTime($start);
        }
        $start = $start->format('Y-m-d');

        if (! $end instanceof \DateTime) {
            $end = new \DateTime($end);
        }
        $end = $end->format('Y-m-d');

        return $this->execute('get', "mileage/daterange/{$start}/{$end}");
    }

    /**
     * Get all mileages for a single project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileageprojectprojectid/get-mileage-by-project
     *
     * @param mixed $projectId
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function forProject($projectId): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', "mileage/project/{$projectId}");
    }

    /**
     * Get a single mileage.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileageid/get-mileage
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
        return $this->execute('get', "mileage/{$id}");
    }

    /**
     * Get all mileages.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileage/get-mileages
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'mileage');
    }

    /**
     * Update a mileage.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileage/update-mileage
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

        return $this->execute('put', 'mileage', $parameters);
    }

    /**
     * Create an mileage.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileage/create-new-mileage
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

        return $this->execute('post', 'mileage', $parameters);
    }

    /**
     * Delete an mileage.
     *
     * @see https://timechimp.docs.apiary.io/#reference/mileage/v1mileage/delete-mileage
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('delete', "mileage/{$id}");
    }
}
