<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class OrganizationIdPlugin implements Plugin
{
    /**
     * @var string
     */
    private $placeholder;
    /**
     * @var string
     */
    private $organizationId;

    public function __construct(string $placeholder, string $organizationId)
    {
        $this->placeholder = $placeholder;
        $this->organizationId = $organizationId;
    }

    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();

        if (false !== strpos($uri->getPath(), $this->placeholder)) {
            $uri = $uri->withPath(str_replace($this->placeholder, $this->organizationId, $uri->getPath()));
            $request = $request->withUri($uri);
        }

        return $next($request);
    }
}
