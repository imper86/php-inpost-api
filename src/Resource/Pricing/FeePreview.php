<?php


namespace Imper86\PhpAllegroApi\Resource\Pricing;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class FeePreview extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/pricing/fee-preview', $body);
    }
}