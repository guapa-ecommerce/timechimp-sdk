<?php

namespace Guapa\TimeChimp;

class ExpensesRequest extends AbstractRequest
{
    /**
     * Get all expenses within a date range.
     *
     * @see https://timechimp.docs.apiary.io/#reference/customers/v1customersid/get-expenses-by-date-range
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

        return $this->execute('get', "expenses/daterange/{$start}/{$end}");
    }

    /**
     * Get all expenses for a single project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/expenses/v1expensesdaterangestartdateenddate/get-expenses-by-project
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
        return $this->execute('get', "expenses/project/{$projectId}");
    }

    /**
     * Get a single expense.
     *
     * @see https://timechimp.docs.apiary.io/#reference/expenses/v1expensesid/get-expense
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
        return $this->execute('get', "expenses/{$id}");
    }

    /**
     * Get all expenses.
     *
     * @see https://timechimp.docs.apiary.io/#reference/expenses/v1expenses/get-expenses
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'expenses');
    }

    /**
     * Update an expense.
     *
     * https://timechimp.docs.apiary.io/#reference/expenses/v1expenses/update-expense
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

        return $this->execute('put', 'expenses', $parameters);
    }

    /**
     * Create an expense.
     *
     * @see https://timechimp.docs.apiary.io/#reference/expenses/v1expenses/create-new-expense
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

        return $this->execute('post', 'expenses', $parameters);
    }

    /**
     * Delete an expense.
     *
     * @see https://timechimp.docs.apiary.io/#reference/expenses/v1expenses/delete-expense
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
        return $this->execute('delete', "expenses/{$id}");
    }
}
