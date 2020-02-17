<?php
/**
 * Author: Adrian Szuszkiewicz <me@imper.info>
 * Github: https://github.com/imper86
 * Date: 25.10.2019
 * Time: 16:37
 */

namespace Imper86\AsanaApi;

use Http\Client\Common\Plugin;
use Imper86\AsanaApi\Resource\Organizations;
use Imper86\AsanaApi\Resource\Projects;
use Imper86\AsanaApi\Resource\ResourceInterface;
use Imper86\AsanaApi\Resource\Sections;
use Imper86\AsanaApi\Resource\Tags;
use Imper86\AsanaApi\Resource\Tasks;
use Imper86\AsanaApi\Resource\Teams;
use Imper86\AsanaApi\Resource\Users;
use Imper86\AsanaApi\Resource\Workspaces;
use Imper86\HttpClientBuilder\BuilderInterface;
use Imper86\OauthClient\OauthClientInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Interface AsanaInterface
 * @package Imper86\AsanaApi
 *
 * @method Organizations organizations()
 * @method Projects projects()
 * @method Sections sections()
 * @method Tags tags()
 * @method Tasks tasks()
 * @method Teams teams()
 * @method Users users()
 * @method Workspaces workspaces()
 */
interface AsanaInterface
{
    /**
     * @param string $resource
     * @return ResourceInterface
     */
    public function api(string $resource): ResourceInterface;

    /**
     * @return OauthClientInterface
     */
    public function oauth2(): OauthClientInterface;

    /**
     * @return BuilderInterface
     */
    public function getHttpClientBuilder(): BuilderInterface;

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

    /**
     * @return bool
     */
    public function isAuthenticated(): bool;
}
