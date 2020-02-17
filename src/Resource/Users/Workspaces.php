<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 17:10
 */

namespace Imper86\AsanaApi\Resource\Users;

use Imper86\AsanaApi\Resource\AbstractResource;

class Workspaces extends AbstractResource
{
    public function list(?string $userGid = null, ?array $params = null): array
    {
        return $this->get(sprintf('/users/%s/workspaces', rawurlencode($userGid ?? 'me')), $params);
    }
}
