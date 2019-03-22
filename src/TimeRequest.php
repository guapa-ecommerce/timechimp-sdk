<?php

namespace Guapa\TimeChimp;

class TimeRequest extends AbstractRequest
{
    /**
     * Get all times entries by date range.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1timedaterangestartdateenddate/get-time-entries-by-date-range
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

        return $this->execute('get', "time/daterange/{$start}/{$end}");
    }

    /**
     * Get all time entries for a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1timeprojectprojectid/get-time-entries-by-project
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
        return $this->execute('get', "time/project/{$projectId}");
    }

    /**
     * Get a single time entry.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1timeid/get-time-entry
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
        return $this->execute('get', "time/{$id}");
    }

    /**
     * Get all time entries.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1time/get-time-entries
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'time');
    }

    /**
     * Update a time entry.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1time/update-time-entry
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

        return $this->execute('put', 'time', $parameters);
    }

    /**
     * Create a time entry.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1time/create-new-time-entry
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

        return $this->execute('post', 'time', $parameters);
    }

    /**
     * Delete a time entry.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1time/delete-time-entry
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
        return $this->execute('delete', "time/{$id}");
    }

    /**
     * Start a timer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1timestarttimerid/post
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function startTimer($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('post', "time/starttimer/{$id}");
    }

    /**
     * Stop a timer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/time/v1timestoptimerid/post
     *
     * @param mixed $id
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stopTimer($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('post', "time/stoptimer/{$id}");
    }
}
