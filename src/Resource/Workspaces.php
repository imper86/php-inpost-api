<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 16:34
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Workspaces\Projects as WorkspaceProjects;
use Imper86\AsanaApi\Resource\Workspaces\Tags as WorkspaceTags;
use Imper86\AsanaApi\Resource\Workspaces\Tasks as WorkspaceTasks;

class Workspaces extends AbstractResource
{
    public function list(?array $params = null): array
    {
        return $this->get('/workspaces', $params);
    }

    public function show(string $id): array
    {
        return $this->get(sprintf('/workspaces/%s', rawurlencode($id)), null);
    }

    public function projects(): WorkspaceProjects
    {
        return new WorkspaceProjects($this->client);
    }

    public function tags(): WorkspaceTags
    {
        return new WorkspaceTags($this->client);
    }

    public function tasks(): WorkspaceTasks
    {
        return new WorkspaceTasks($this->client);
    }
}
