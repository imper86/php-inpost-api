<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Offers;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ShippingRates extends AbstractResource
{
    public function get(string $offerId): ResponseInterface
    {
        return $this->apiGet("/sale/offers/{$offerId}/shipping-rates", null, ContentType::VND_BETA_V1);
    }
}