<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:06
 */

namespace Imper86\AsanaApi\Resource\Workspaces;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tags extends AbstractResource
{
    public function create(string $workspaceGid, array $data): array
    {
        return $this->post(sprintf('/workspaces/%s/tags', $workspaceGid), ['data' => $data]);
    }

    public function list(string $workspaceGid): array
    {
        return $this->get(sprintf('/workspaces/%s/tags', $workspaceGid));
    }
}
