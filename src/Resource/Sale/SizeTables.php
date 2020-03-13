<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class SizeTables extends AbstractResource
{
    public function get(?string $tableId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/size-tables%s', $tableId ? "/{$tableId}" : ''), $query);
    }
}