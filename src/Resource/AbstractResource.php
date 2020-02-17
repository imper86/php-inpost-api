<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 20.10.2019
 * Time: 14:40
 */

namespace Imper86\AsanaApi\Resource;

use Imper86\AsanaApi\AsanaInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

abstract class AbstractResource implements ResourceInterface
{
    /**
     * @var AsanaInterface
     */
    private $asana;
    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;
    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;
    /**
     * @var HttpClientInterface
     */
    private $httpClient;
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;


    public function __construct(AsanaInterface $asana)
    {
        $this->asana = $asana;
        $this->requestFactory = $asana->getHttpClientBuilder()->getRequestFactory();
        $this->uriFactory = $asana->getHttpClientBuilder()->getUriFactory();
        $this->streamFactory = $asana->getHttpClientBuilder()->getStreamFactory();
        $this->httpClient = $asana->getHttpClientBuilder()->getHttpClient();
    }

    protected function get(string $uri, ?array $query = null): array
    {
        $uri = $this->uriFactory->createUri($uri);

        if ($query) {
            $uri = $uri->withQuery(http_build_query($query));
        }

        $request = $this->requestFactory->createRequest('GET', $uri);
        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function post(string $uri, ?array $body = null): array
    {
        $request = $this->requestFactory->createRequest('POST', $uri);

        if ($body) {
            $stream = $this->streamFactory->createStream(json_encode($body));
            $request = $request->withBody($stream);
        }

        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function put(string $uri, ?array $body = null): array
    {
        $request = $this->requestFactory->createRequest('PUT', $uri);

        if ($body) {
            $stream = $this->streamFactory->createStream(json_encode($body));
            $request = $request->withBody($stream);
        }

        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    protected function delete(string $uri): array
    {
        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $response = $this->httpClient->sendRequest($request);

        return $this->transformResponse($response);
    }

    private function transformResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->__toString(), true);
    }
}
