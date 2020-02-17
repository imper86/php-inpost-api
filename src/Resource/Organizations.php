<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:11
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Organizations\Teams as OrganizationTeams;

class Organizations extends AbstractResource
{
    public function teams(): OrganizationTeams
    {
        return new OrganizationTeams($this->client);
    }
}
