<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class BadgeCampaigns extends AbstractResource
{
    public function get(): ResponseInterface
    {
        return $this->apiGet('/sale/badge-campaigns', null, ContentType::VND_BETA_V1);
    }
}