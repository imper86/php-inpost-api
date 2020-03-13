<?php


namespace Imper86\PhpAllegroApi\Resource\Offers;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Listing extends AbstractResource
{
    public function get(?array $query): ResponseInterface
    {
        return $this->apiGet('/offers/listing', $query);
    }
}