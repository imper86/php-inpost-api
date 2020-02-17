<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:22
 */

namespace Imper86\AsanaApi\Resource\Tasks;

use Imper86\AsanaApi\Resource\AbstractResource;

class Subtasks extends AbstractResource
{
    public function list(string $taskGid): array
    {
        return $this->get(sprintf('/tasks/%s/subtasks', $taskGid));
    }

    public function create(string $taskGid, array $data): array
    {
        return $this->post(sprintf('/tasks/%s/subtasks', $taskGid), ['data' => $data]);
    }
}
