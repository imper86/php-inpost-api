<?php


namespace Imper86\PhpAllegroApi\Resource\Sale;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Imper86\PhpAllegroApi\Resource\Sale\CompatibleProducts\Groups;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CompatibleProducts
 * @package Imper86\PhpAllegroApi\Resource\Sale
 *
 * @method Groups groups()
 */
class CompatibleProducts extends AbstractResource
{
    public function get(array $query, ?array $headers = null): ResponseInterface
    {
        $uri = $this->uriFactory->createUri('/sale/compatible-products')
            ->withQuery(http_build_query($query));
        $request = $this->requestFactory->createRequest('GET', $uri);

        if ($headers) {
            foreach ($headers as $headerName => $headerValue) {
                $request = $request->withHeader($headerName, $headerValue);
            }
        }

        return $this->httpClient->sendRequest($request);
    }
}