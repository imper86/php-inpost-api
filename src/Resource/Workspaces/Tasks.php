<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:10
 */

namespace Imper86\AsanaApi\Resource\Workspaces;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tasks extends AbstractResource
{
    public function create(string $workspaceGid, array $data): array
    {
        return $this->post(sprintf('/workspaces/%s/tasks', $workspaceGid), ['data' => $data]);
    }

    public function search(string $workspaceGid, array $params): array
    {
        return $this->get(sprintf('/workspaces/%s/tasks/search', $workspaceGid), $params);
    }
}
