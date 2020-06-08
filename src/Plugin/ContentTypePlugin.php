<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpInpostApi\Enum\ContentType;
use Psr\Http\Message\RequestInterface;

class ContentTypePlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('Content-Type')) {
            $request = $request->withHeader('Content-Type', ContentType::JSON);
        }

        if (!$request->hasHeader('Accept')) {
            $request = $request->withHeader('Accept', ContentType::JSON);
        }

        return $next($request);
    }
}
