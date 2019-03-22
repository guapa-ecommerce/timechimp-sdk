<?php

namespace Guapa\TimeChimp;

class ProjectsRequest extends AbstractRequest
{

    /**
     * Get all projects.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projects/get-all-projects
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'projects');
    }

    /**
     * Update a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projects/update-project
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

        return $this->execute('put', 'projects', $parameters);
    }

    /**
     * Create a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projects/create-new-project
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

        return $this->execute('post', 'projects', $parameters);
    }

    /**
     * Delete a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projects/delete-project
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
        return $this->execute('delete', "projects/{$id}");
    }

    /**
     * Get a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projectsid/get-project
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
        return $this->execute('get', "projects/{$id}");
    }

    /**
     * Get all projects by customer.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projectscustomercustomerid/get-projects-by-customer
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
        return $this->execute('get', "projects/project/{$projectId}");
    }

    /**
     * Get insights for a project.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projects/v1projectsinsightsid/get-project-insights
     *
     * @param mixed $projectId
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function insights($projectId): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', "projects/insights/{$projectId}");
    }
}
