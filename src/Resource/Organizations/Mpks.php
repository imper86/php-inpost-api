<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Mpks extends AbstractResource
{
    public function get(string $organizationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/mpks', $organizationId), $query);
    }

    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/admin/v1/organizations/%s/mpks', $organizationId), $body);
    }
}
