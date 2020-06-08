<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:42
 */

namespace Imper86\PhpInpostApi;

use Http\Client\Common\Plugin;
use Imper86\HttpClientBuilder\Builder;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\PhpInpostApi\Plugin\AuthenticationPlugin;
use Imper86\PhpInpostApi\Plugin\ContentTypePlugin;
use Imper86\PhpInpostApi\Plugin\RequestIdPlugin;
use Imper86\PhpInpostApi\Plugin\SandboxUriPlugin;
use Imper86\PhpInpostApi\Plugin\UriPlugin;
use Imper86\PhpInpostApi\Plugin\UserAgentHeaderPlugin;
use Imper86\PhpInpostApi\Resource\AddressBooks;
use Imper86\PhpInpostApi\Resource\Batches;
use Imper86\PhpInpostApi\Resource\DispatchOrders;
use Imper86\PhpInpostApi\Resource\DispatchPoints;
use Imper86\PhpInpostApi\Resource\Mpks;
use Imper86\PhpInpostApi\Resource\Organizations;
use Imper86\PhpInpostApi\Resource\Points;
use Imper86\PhpInpostApi\Resource\ResourceInterface;
use Imper86\PhpInpostApi\Resource\SendingMethods;
use Imper86\PhpInpostApi\Resource\Services;
use Imper86\PhpInpostApi\Resource\Shipments;
use Imper86\PhpInpostApi\Resource\ShipmentTemplates;
use Imper86\PhpInpostApi\Resource\Statuses;
use Imper86\PhpInpostApi\Resource\Tracking;
use InvalidArgumentException;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Class Asana
 * @package Imper86\InpostApi
 *
 * @method AddressBooks addressBooks()
 * @method Batches batches()
 * @method DispatchOrders dispatchOrders()
 * @method DispatchPoints dispatchPoints()
 * @method Mpks mpks()
 * @method Organizations organizations()
 * @method Points points()
 * @method SendingMethods sendingMethods()
 * @method Services services()
 * @method Shipments shipments()
 * @method ShipmentTemplates shipmentTemplates()
 * @method Statuses statuses()
 * @method Tracking tracking()
 */
class InpostApi implements InpostApiInterface
{
    /**
     * @var BuilderInterface
     */
    private $builder;
    /**
     * @var string
     */
    private $token;

    public function __construct(?string $token = null, bool $sandbox = false, ?BuilderInterface $builder = null)
    {
        $this->token = $token;
        $this->builder = $builder ?: new Builder();
        $this->builder->addPlugin(new UriPlugin($this->builder->getUriFactory()));
        $this->builder->addPlugin(new ContentTypePlugin());
        $this->builder->addPlugin(new UserAgentHeaderPlugin());
        $this->builder->addPlugin(new RequestIdPlugin());

        if ($token) {
            $this->builder->addPlugin(new AuthenticationPlugin($token));
        }

        if ($sandbox) {
            $this->builder->addPlugin(new SandboxUriPlugin());
        }
    }

    public function __call($name, $arguments)
    {
        return $this->api($name);
    }

    public function api(string $resource): ResourceInterface
    {
        $className = 'Imper86\\PhpInpostApi\\Resource\\' . ucfirst($resource);

        if (class_exists($className) && is_subclass_of($className, ResourceInterface::class)) {
            return new $className($this);
        }

        throw new InvalidArgumentException(sprintf('%s resource not found', $resource));
    }

    public function getBuilder(): BuilderInterface
    {
        return $this->builder;
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->builder->addPlugin($plugin);
    }

    public function removePlugin(string $fqcn): void
    {
        $this->builder->removePlugin($fqcn);
    }

    public function addCache(CacheItemPoolInterface $cacheItemPool, array $config = []): void
    {
        $this->builder->addCache($cacheItemPool, $config);
    }

    public function removeCache(): void
    {
        $this->builder->removeCache();
    }
}
