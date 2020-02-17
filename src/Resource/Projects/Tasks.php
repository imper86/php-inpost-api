<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:27
 */

namespace Imper86\AsanaApi\Resource\Projects;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tasks extends AbstractResource
{
    public function list(string $projectGid): array
    {
        return $this->get(sprintf('/projects/%s/tasks', $projectGid));
    }
}
