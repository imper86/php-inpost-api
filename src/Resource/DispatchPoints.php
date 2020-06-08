<?php


namespace Imper86\PhpInpostApi\Resource;


use Psr\Http\Message\ResponseInterface;

class DispatchPoints extends AbstractResource
{
    public function get(string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/v1/dispatch_points/%s', $id), $query);
    }
}
