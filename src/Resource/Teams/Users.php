<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 21.10.2019
 * Time: 12:07
 */

namespace Imper86\AsanaApi\Resource\Teams;

use Imper86\AsanaApi\Resource\AbstractResource;

class Users extends AbstractResource
{
    public function list(string $teamGid): array
    {
        return $this->get(sprintf('/teams/%s/users', $teamGid));
    }

    public function add(string $teamGid, string $userIdentifier): array
    {
        return $this->post(sprintf('/teams/%s/addUser', $teamGid), [
            'data' => ['user' => $userIdentifier],
        ]);
    }

    public function remove(string $teamGid, string $userIdentifier): array
    {
        return $this->post(sprintf('/teams/%s/removeUser', $teamGid), [
            'data' => ['user' => $userIdentifier],
        ]);
    }
}
