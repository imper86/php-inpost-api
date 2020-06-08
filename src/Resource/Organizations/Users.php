<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Users extends AbstractResource
{
    public function get(string $organizationId, ?string $userId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/v1/organizations/%s/users%s', $organizationId, $userId ? "/{$userId}" : ''),
            $query
        );
    }
}
