<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 10:31
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Projects\Sections as ProjectSections;
use Imper86\AsanaApi\Resource\Projects\Tasks as ProjectTasks;

class Projects extends AbstractResource
{
    public function create(array $data): array
    {
        return $this->post('/projects', ['data' => $data]);
    }

    public function list(?array $params = null): array
    {
        return $this->get('/projects', $params);
    }

    public function show(string $gid): array
    {
        return $this->get(sprintf('/projects/%s', $gid));
    }

    public function update(string $gid, array $data): array
    {
        return $this->put(sprintf('/projects/%s', $gid), ['data' => $data]);
    }

    public function remove(string $gid): array
    {
        return $this->delete(sprintf('/projects/%s', $gid));
    }

    public function duplicate(string $gid, array $params): array
    {
        return $this->post(sprintf('/projects/%s/duplicate', $gid), ['data' => $params]);
    }

    public function addMembers(string $gid, array $userIds): array
    {
        return $this->post(sprintf('/projects/%s/addMembers', $gid), ['data' => ['members' => $userIds]]);
    }

    public function removeMembers(string $gid, array $userIds): array
    {
        return $this->post(sprintf('/projects/%s/removeMembers', $gid), ['data' => ['members' => $userIds]]);
    }

    public function taskCounts(string $gid): array
    {
        return $this->get(sprintf('/projects/%s/task_counts', $gid));
    }

    public function tasks(): ProjectTasks
    {
        return new ProjectTasks($this->client);
    }

    public function sections(): ProjectSections
    {
        return new ProjectSections($this->client);
    }
}
