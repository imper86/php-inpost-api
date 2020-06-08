<?php


namespace Imper86\PhpInpostApi\Resource\Organizations\DispatchOrders;


use Imper86\PhpInpostApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Comment extends AbstractResource
{
    public function post(string $organizationId, string $dispatchOrderId, array $body): ResponseInterface
    {
        return $this->apiPost(
            sprintf('/v1/organizations/%s/dispatch_orders/%s/comment', $organizationId, $dispatchOrderId),
            $body
        );
    }

    public function put(string $organizationId, string $dispatchOrderId, array $body): ResponseInterface
    {
        return $this->apiPut(
            sprintf('/v1/organizations/%s/dispatch_orders/%s/comment', $organizationId, $dispatchOrderId),
            $body
        );
    }

    public function delete(string $organizationId, string $dispatchOrderId, array $body): ResponseInterface
    {
        $uri = $this->uriFactory->createUri(
            sprintf('/v1/organizations/%s/dispatch_orders/%s/comment', $organizationId, $dispatchOrderId)
        );
        $request = $this->requestFactory->createRequest('DELETE', $uri)
            ->withBody($this->streamFactory->createStream(json_encode($body)));

        return $this->httpClient->sendRequest($request);
    }
}
