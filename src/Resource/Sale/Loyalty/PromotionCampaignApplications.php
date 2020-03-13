<?php


namespace Imper86\PhpAllegroApi\Resource\Sale\Loyalty;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class PromotionCampaignApplications extends AbstractResource
{
    public function get(string $applicationId): ResponseInterface
    {
        return $this->apiGet("/sale/loyalty/promotion-campaign-applications/{$applicationId}");
    }

    public function delete(string $applicationId): ResponseInterface
    {
        return $this->apiDelete("/sale/loyalty/promotion-campaign-applications/{$applicationId}");
    }
}