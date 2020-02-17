<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:13
 */

namespace Imper86\AsanaApi\Resource\Tags;

use Imper86\AsanaApi\Resource\AbstractResource;

class Tasks extends AbstractResource
{
    public function list(string $tagGid): array
    {
        return $this->get(sprintf('/tags/%s/tasks', $tagGid));
    }
}
