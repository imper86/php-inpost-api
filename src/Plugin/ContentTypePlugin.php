<?php


namespace Imper86\PhpAllegroApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpAllegroApi\Enum\ContentType;
use Psr\Http\Message\RequestInterface;

class ContentTypePlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('Content-Type')) {
            $request = $request->withHeader('Content-Type', ContentType::VND_PUBLIC_V1);
        }

        if (!$request->hasHeader('Accept')) {
            $request = $request->withHeader('Accept', ContentType::VND_PUBLIC_V1);
        }

        return $next($request);
    }
}