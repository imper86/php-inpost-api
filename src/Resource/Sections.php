<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:58
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Sections\Tasks as SectionTasks;

class Sections extends AbstractResource
{
    public function show(string $gid): array
    {
        return $this->get(sprintf('/sections/%s', $gid));
    }

    public function update(string $gid, string $newName): array
    {
        return $this->put(sprintf('/sections/%s', $gid), [
            'data' => ['name' => $newName],
        ]);
    }

    public function remove(string $gid): array
    {
        return $this->delete(sprintf('/sections/%s', $gid));
    }

    public function addTask(string $gid, string $taskGid, array $params = []): array
    {
        $params['task_gid'] = $taskGid;

        return $this->post(sprintf('/sections/%s/addTask', $gid), ['data' => $params]);
    }

    public function tasks(): SectionTasks
    {
        return new SectionTasks($this->client);
    }
}
