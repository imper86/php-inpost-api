<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Rating extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/sale/offers/{$offerId}/rating");
    }
}