<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\OfferPublicationCommands;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Tasks extends AbstractResource
{
    public function get(string $commandId, ?array $query = null): ResponseInterface
    {
        return $this->apiGet("/sale/offer-publication-commands/{$commandId}/tasks", $query);
    }
}