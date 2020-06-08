<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\FileMappings;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Export extends AbstractResource
{
    public function post(string $organizationId, array $body): ResponseInterface
    {
        return $this->apiPost(sprintf('/v1/organizations/%s/file_mappings/export', $organizationId), $body);
    }

    public function get(string $organizationId, string $exportId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(
            sprintf('/v1/organizations/%s/file_mappings/export/%s', $organizationId, $exportId),
            $query
        );
    }
}
