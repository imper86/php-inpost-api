<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:18
 */

namespace Imper86\AsanaApi\Resource\Sections;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tasks extends AbstractResource
{
    public function list(string $sectionId): array
    {
        return $this->get(sprintf('/sections/%s/tasks', $sectionId));
    }
}
