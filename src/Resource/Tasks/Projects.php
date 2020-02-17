<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:27
 */

namespace Imper86\AsanaApi\Resource\Tasks;

use Imper86\AsanaApi\Resource\AbstractResource;

class Projects extends AbstractResource
{
    public function list(string $taskGid): array
    {
        return $this->get(sprintf('/tasks/%s/projects', $taskGid));
    }

    public function add(string $taskGid, string $projectGid, array $params = []): array
    {
        $params['project'] = $projectGid;

        return $this->post(sprintf('/tasks/%s/addProject', $taskGid), ['data' => $params]);
    }

    public function remove(string $taskGid, string $projectGid): array
    {
        return $this->post(sprintf('/tasks/%s/removeProject', $taskGid), [
            'data' => [
                'project' => $projectGid,
            ],
        ]);
    }
}
