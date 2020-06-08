<?php


namespace Imper86\PhpInpostApi\Resource\Organizations;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Imper86\PhpInpostApi\Resource\Organizations\FileMappings\Export;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FileMappings
 * @package Imper86\PhpInpostApi\Resource\Organizations
 *
 * @method Export export()
 */
class FileMappings extends AbstractResource
{
    public function get(string $organizationId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/organizations/%s/file_mappings', $organizationId), $query);
    }
}
