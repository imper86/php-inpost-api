<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:56
 */

namespace Imper86\AsanaApi\Resource\Projects;

use Imper86\AsanaApi\Resource\AbstractResource;

class Sections extends AbstractResource
{
    public function create(string $projectGid, string $sectionName): array
    {
        return $this->post(sprintf('/projects/%s/sections', $projectGid), [
            'data' => [
                'name' => $sectionName,
            ],
        ]);
    }

    public function list(string $projectGid): array
    {
        return $this->get(sprintf('/projects/%s/sections', $projectGid));
    }

    public function insert(string $projectGid, string $sectionGid, array $params = []): array
    {
        $params['section'] = $sectionGid;

        return $this->post(sprintf('/projects/%s/sections/insert', $projectGid), ['data' => $params]);
    }
}
