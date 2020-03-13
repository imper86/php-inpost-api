<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Enum\ContentType;
use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Badges extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/sale/badges', $body, ContentType::VND_BETA_V1);
    }

    public function get(?array $query = null): ResponseInterface
    {
        return $this->apiGet('/sale/badges', $query, ContentType::VND_BETA_V1);
    }
}