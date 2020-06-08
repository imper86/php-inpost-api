<?php


namespace Imper86\PhpInpostApi\Resource;


use Imper86\PhpInpostApi\Resource\Tracking\ServiceHistory;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Tracking
 * @package Imper86\PhpInpostApi\Resource
 *
 * @method ServiceHistory serviceHistory()
 */
class Tracking extends AbstractResource
{
    public function get(string $trackingNumber, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/tracking/%s', $trackingNumber), $query);
    }
}
