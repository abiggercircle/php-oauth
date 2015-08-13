<?php
namespace OAuth\Support;

use Illuminate\Container\Container;

class Manager
{
    /**
     * @var  Illuminate\Container\Container
     */
    protected $app;

    /**
     * Public constructor with DI
     *
     * @param  Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Build and return a ServiceInterface object.
     *
     * @param  string $service
     * @param  string $redirectUri
     * @param  array $scopes
     * @return OAuth\ServiceInterface
     */
    public function consumer($service, $redirectUri = null, $scopes = null)
    {
        // use scope from config if not provided
        if (is_null($scopes)) {
            $scopes = config('soda-oauth.consumers.'. $service. ".scopes", []);
        }

        // Default redirect URI.
        $redirectUri = $redirectUri ?: $this->app['url']->current();

        // Get the credentials.

        $credentials = array_only(
            config('soda-oauth.consumers.'. $service),
            ['client_id', 'client_secret']
        );

        // Generate class name.
        $class = 'OAuth\Services\\'. ucfirst($service);

        // Create configured consumer object.
        return $this->app->make($class)
            ->setScopes($scopes)
            ->setRedirectUri($redirectUri)
            ->setCredentials($credentials);
    }
}
