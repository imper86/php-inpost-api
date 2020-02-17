<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:12
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Tags\Tasks as TagTasks;

class Tags extends AbstractResource
{
    public function create(array $data): array
    {
        return $this->post('/tags', ['data' => $data]);
    }

    public function show(string $gid): array
    {
        return $this->get(sprintf('/tags/%s', $gid));
    }

    public function update(string $gid, array $data): array
    {
        return $this->put(sprintf('/tags/%s', $gid), ['data' => $data]);
    }

    public function list(?array $params = null): array
    {
        return $this->get('/tags', $params);
    }

    public function tasks(): TagTasks
    {
        return new TagTasks($this->client);
    }
}
