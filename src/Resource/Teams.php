<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:04
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Teams\Projects as TeamProjects;
use Imper86\AsanaApi\Resource\Teams\Users as TeamUsers;

class Teams extends AbstractResource
{
    public function list(?array $params = null): array
    {
        return $this->get('/teams', $params);
    }

    public function show(string $gid): array
    {
        return $this->get(sprintf('/teams/%s', $gid));
    }

    public function projects(): TeamProjects
    {
        return new TeamProjects($this->client);
    }

    public function users(): TeamUsers
    {
        return new TeamUsers($this->client);
    }
}
