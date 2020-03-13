<?php


namespace Imper86\PhpAllegroApi\Resource;


use Psr\Http\Message\ResponseInterface;

class PointsOfService extends AbstractResource
{
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/points-of-service', $body);
    }

    public function get(?string $id, ?array $query = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/points-of-service%s', $id ? "/{$id}" : ''), $query);
    }

    public function put(string $id, array $body): ResponseInterface
    {
        return $this->apiPut("/points-of-service/{$id}", $body);
    }

    public function delete(string $id): ResponseInterface
    {
        return $this->apiDelete("/points-of-service/{$id}");
    }
}