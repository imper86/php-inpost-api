<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class ProductProposals extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/product-proposals', $body);
    }
}