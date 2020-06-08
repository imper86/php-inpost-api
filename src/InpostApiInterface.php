<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:37
 */

namespace Imper86\PhpInpostApi;

use Http\Client\Common\Plugin;
use Imper86\HttpClientBuilder\BuilderInterface;
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
use Psr\Cache\CacheItemPoolInterface;

/**
 * Interface AsanaInterface
 * @package Imper86\AllegroApi
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
interface InpostApiInterface
{
    /**
     * @param string $resource
     * @return ResourceInterface
     */
    public function api(string $resource): ResourceInterface;

    /**
     * @return BuilderInterface
     */
    public function getBuilder(): BuilderInterface;

    /**
     * @param Plugin $plugin
     */
    public function addPlugin(Plugin $plugin): void;

    /**
     * Fully qualified class name of plugin
     *
     * @param string $fqcn
     */
    public function removePlugin(string $fqcn): void;

    /**
     * @param CacheItemPoolInterface $cacheItemPool
     * @param array $config
     */
    public function addCache(CacheItemPoolInterface $cacheItemPool, array $config = []): void;

    /**
     * Removes cache plugin from http client
     */
    public function removeCache(): void;
}
