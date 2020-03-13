<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ClassifiedsPackages extends AbstractResource
{
    public function get(?string $packageId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/classifieds-packages%s', $packageId ? "/{$packageId}" : ''), $query);
    }
}