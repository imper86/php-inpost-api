<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:12
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Tasks\Projects as TaskProjects;
use Imper86\AsanaApi\Resource\Tasks\Subtasks as TaskSubtasks;
use Imper86\AsanaApi\Resource\Tasks\Tags as TaskTags;

class Tasks extends AbstractResource
{
    public function create(array $data): array
    {
        return $this->post('/tasks', ['data' => $data]);
    }

    public function show(string $taskGid): array
    {
        return $this->get(sprintf('/tasks/%s', $taskGid));
    }

    public function update(string $taskGid, array $data): array
    {
        return $this->put(sprintf('/tasks/%s', $taskGid), ['data' => $data]);
    }

    public function remove(string $taskGid): array
    {
        return $this->delete(sprintf('/tasks/%s', $taskGid));
    }

    public function duplicate(string $taskGid, array $data): array
    {
        return $this->post(sprintf('/tasks/%s/duplicate', $taskGid), ['data' => $data]);
    }

    public function list(?array $params = null): array
    {
        return $this->get('/tasks', $params);
    }

    public function setParent(string $taskGid, string $parentGid, array $params = []): array
    {
        $params['parent'] = $parentGid;

        return $this->post(sprintf('/tasks/%s/setParent', $taskGid), ['data' => $params]);
    }

    public function subtasks(): TaskSubtasks
    {
        return new TaskSubtasks($this->client);
    }

    public function projects(): TaskProjects
    {
        return new TaskProjects($this->client);
    }

    public function tags(): TaskTags
    {
        return new TaskTags($this->client);
    }
}
