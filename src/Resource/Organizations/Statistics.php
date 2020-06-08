<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Statistics extends AbstractResource
{
    public function get(string $organizationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/statistics', $organizationId), $query);
    }
}
