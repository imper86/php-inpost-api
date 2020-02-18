<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:42
 */

namespace Imper86\ImmiApi;

use Http\Client\Common\Plugin;
use Http\Message\Authentication\Bearer;
use Imper86\AutoTokenPlugin\AutoTokenPlugin;
use Imper86\HttpClientBuilder\Builder;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\ImmiApi\HttpClient\Plugin\UriPreparePlugin;
use Imper86\ImmiApi\Oauth\OauthClient;
use Imper86\ImmiApi\Resource\Attributes;
use Imper86\ImmiApi\Resource\Carts;
use Imper86\ImmiApi\Resource\Commands;
use Imper86\ImmiApi\Resource\ContactRequests;
use Imper86\ImmiApi\Resource\Countries;
use Imper86\ImmiApi\Resource\Orders;
use Imper86\ImmiApi\Resource\Products;
use Imper86\ImmiApi\Resource\ResourceInterface;
use Imper86\ImmiApi\Resource\Users;
use Imper86\OauthClient\Model\CredentialsInterface;
use Imper86\OauthClient\OauthClientInterface;
use Imper86\OauthClient\Repository\TokenRepositoryInterface;
use InvalidArgumentException;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Class Asana
 * @package Imper86\ImmiApi
 *
 * @method Attributes attributes()
 * @method Carts carts()
 * @method Commands commands()
 * @method ContactRequests contactRequests()
 * @method Countries countries()
 * @method Orders orders()
 * @method Products products()
 * @method Users users()
 */
class Immi implements ImmiInterface
{
    /**
     * @var TokenRepositoryInterface|null
     */
    private $tokenRepository;
    /**
     * @var BuilderInterface
     */
    private $httpClientBuilder;
    /**
     * @var CredentialsInterface
     */
    private $credentials;
    /**
     * @var OauthClientInterface|null
     */
    private $oauthClient;

    public function __construct(
        CredentialsInterface $credentials,
        ?TokenRepositoryInterface $tokenRepository = null,
        ?BuilderInterface $httpClientBuilder = null
    )
    {
        $this->credentials = $credentials;
        $this->tokenRepository = $tokenRepository;
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder();

        $this->httpClientBuilder->addPlugin(new UriPreparePlugin($credentials, $this->httpClientBuilder->getUriFactory()));
    }

    public function __call($name, $arguments)
    {
        return $this->api($name);
    }

    public function api(string $resource): ResourceInterface
    {
        $className = 'Imper86\\ImmiApi\\Resource\\' . ucfirst($resource);

        if (class_exists($className) && is_subclass_of($className, ResourceInterface::class)) {
            return new $className($this);
        }

        throw new InvalidArgumentException(sprintf('%s resource not found', $resource));
    }

    public function getHttpClientBuilder(): BuilderInterface
    {
        return $this->httpClientBuilder;
    }

    public function oauth2(): OauthClientInterface
    {
        if (null === $this->oauthClient) {
            $this->oauthClient = new OauthClient(
                $this->credentials,
                $this->getHttpClientBuilder()->getUriFactory(),
                $this->tokenRepository
            );
        }

        return $this->oauthClient;
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->httpClientBuilder->addPlugin($plugin);
    }

    public function removePlugin(string $fqcn): void
    {
        $this->httpClientBuilder->removePlugin($fqcn);
    }

    public function addCache(CacheItemPoolInterface $cacheItemPool, array $config = []): void
    {
        $this->httpClientBuilder->addCache($cacheItemPool, $config);
    }

    public function removeCache(): void
    {
        $this->httpClientBuilder->removeCache();
    }

    public function isAuthenticated(): bool
    {
        $authPlugins = [
            Bearer::class,
            AutoTokenPlugin::class,
        ];

        foreach ($authPlugins as $authPlugin) {
            if ($this->httpClientBuilder->hasPlugin($authPlugin)) {
                return true;
            }
        }

        return false;
    }
}
