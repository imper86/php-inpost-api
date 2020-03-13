<?php


namespace Imper86\PhpAllegroApi\Resource\Users;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class RatingsSummary extends AbstractResource
{
    public function get(string $userId): ResponseInterface
    {
        return $this->apiGet("/users/{$userId}/ratings-summary");
    }
}