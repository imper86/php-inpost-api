<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 11:40
 */

namespace Imper86\AsanaApi\Resource\Workspaces;

use Imper86\AsanaApi\Resource\AbstractResource;

class Projects extends AbstractResource
{
    public function list(string $workspaceGid, ?array $params = null): array
    {
        return $this->get(sprintf('/workspaces/%s/projects', $workspaceGid), $params);
    }

    public function create(string $workspaceGid, array $data): array
    {
        return $this->post(sprintf('/workspaces/%s/projects', $workspaceGid), ['data' => $data]);
    }
}
