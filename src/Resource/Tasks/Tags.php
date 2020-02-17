<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:30
 */

namespace Imper86\AsanaApi\Resource\Tasks;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tags extends AbstractResource
{
    public function list(string $taskGid): array
    {
        return $this->get(sprintf('/tasks/%s/tags', $taskGid));
    }

    public function add(string $taskGid, string $tagGid): array
    {
        return $this->post(sprintf('/tasks/%s/addTag', $taskGid), [
            'data' => ['tag' => $tagGid],
        ]);
    }

    public function remove(string $taskGid, string $tagGid): array
    {
        return $this->post(sprintf('/tasks/%s/removeTag', $taskGid), [
            'data' => ['tag' => $tagGid],
        ]);
    }
}
