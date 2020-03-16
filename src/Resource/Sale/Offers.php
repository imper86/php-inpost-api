<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\Offers\Rating;
use Imper86\PhpAllegroApi\Resource\Sale\Offers\ShippingRates as OffersShippingRates;
use Imper86\PhpAllegroApi\Resource\Sale\Offers\Tags;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Offers
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method OffersShippingRates shippingRates()
 * @method Tags tags()
 * @method Rating rating()
 */
class Offers extends AbstractResource
{
    public function get(?string $offerId = null, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offers%s', $offerId ? "/{$offerId}" : ''), $query);
    }

    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/offers', $body);
    }

    public function put(string $offerId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/offers/{$offerId}", $body);
    }

    public function delete(string $offerId): ResponseInterface
    {
        return $this->apiDelete("/sale/offers/{$offerId}");
    }
}