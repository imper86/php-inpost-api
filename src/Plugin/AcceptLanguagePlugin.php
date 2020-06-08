<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class AcceptLanguagePlugin implements Plugin
{
    /**
     * @var string
     */
    private $acceptLanguage;

    public function __construct(string $acceptLanguage)
    {
        $this->acceptLanguage = $acceptLanguage;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        if (!$request->hasHeader('Accept-Language')) {
            $request = $request->withHeader('Accept-Language', $this->acceptLanguage);
        }

        return $next($request);
    }
}
