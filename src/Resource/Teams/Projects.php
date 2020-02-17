<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:24
 */

namespace Imper86\AsanaApi\Resource\Teams;

use Imper86\AsanaApi\Resource\AbstractResource;

class Projects extends AbstractResource
{
    public function create(string $teamGid, array $data): array
    {
        return $this->post(sprintf('/teams/%s/projects', $teamGid), ['data' => $data]);
    }

    public function list(string $teamGid, ?array $params = null): array
    {
        return $this->get(sprintf('/teams/%s/projects', $teamGid), $params);
    }
}
