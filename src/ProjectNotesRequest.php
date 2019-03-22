<?php

namespace Guapa\TimeChimp;

class ProjectNotesRequest extends AbstractRequest
{

    /**
     * Get all project notes.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projectnotes/v1projectnotes/get-all-project-notes
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Guapa\TimeChimp\Exceptions\ClientException
     * @throws \Guapa\TimeChimp\Exceptions\NotFoundException
     * @throws \Guapa\TimeChimp\Exceptions\UnauthorizedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): \Psr\Http\Message\ResponseInterface
    {
        return $this->execute('get', 'projectnotes');
    }

    /**
     * Update a project note.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projectnotes/v1projectnotes/update-project-note
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

        return $this->execute('put', 'projectnotes', $parameters);
    }

    /**
     * Create a project note.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projectnotes/v1projectnotes/create-new-project-notes
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

        return $this->execute('post', 'projectnotes', $parameters);
    }

    /**
     * Delete a project note.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projectnotes/v1projectnotes/delete-project-note
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
        return $this->execute('delete', "projectnotes/{$id}");
    }

    /**
     * Get a project note.
     *
     * @see https://timechimp.docs.apiary.io/#reference/projectnotes/v1projectnotesid/get-projectnsote
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
        return $this->execute('get', "projectnotes/{$id}");
    }

    /**
     * Get all project notes by project.
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
        return $this->execute('get', "projectnotes/project/{$projectId}");
    }
}
