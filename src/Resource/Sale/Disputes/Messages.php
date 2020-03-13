<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Disputes;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Messages extends AbstractResource
{
    public function get(string $disputeId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet("/sale/disputes/{$disputeId}/messages", $query);
    }

    public function post(string $disputeId, array $body): ResponseInterface
    {
        return $this->apiPost("/sale/disputes/{$disputeId}/messages", $body);
    }
}