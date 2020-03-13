<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\UserRatings;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Removal extends AbstractResource
{
    public function put(string $ratingId, array $body): ResponseInterface
    {
        return $this->apiPut("/sale/user-ratings/{$ratingId}/removal", $body);
    }
}