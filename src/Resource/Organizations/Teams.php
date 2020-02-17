<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 13:33
 */

namespace Imper86\AsanaApi\Resource\Organizations;

use Imper86\AsanaApi\Resource\AbstractResource;

class Teams extends AbstractResource
{
    public function list(string $organizationGid): array
    {
        return $this->get(sprintf('/organizations/%s/teams', $organizationGid));
    }
}
