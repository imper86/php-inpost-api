<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 17:09
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\Resource\Users\Teams as UserTeams;
use Imper86\AsanaApi\Resource\Users\Workspaces as UserWorkspaces;

class Users extends AbstractResource
{
    public function workspaces(): UserWorkspaces
    {
        return new UserWorkspaces($this->client);
    }

    public function teams(): UserTeams
    {
        return new UserTeams($this->client);
    }
}
