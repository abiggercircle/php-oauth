<?php
namespace OAuth;

use GuzzleHttp\Client;

interface ServiceInterface
{
    /**
     * Get the authorization url.
     *
     * @param  array  $options
     * @return string
     */
    public function authorizationUrl(array $options = []);

    /**
     * Get the HTTP Client
     *
     * @return GuzzleHttp\Client
     */
    public function getClient();

    /**
     * Set the HTTP Client
     *
     * @param  GuzzleHttp\Client $client
     * @return ServiceInterface
     */
    public function setClient(Client $client);

    /**
     * Set token
     *
     * @param  array  $token
     * @return ServiceInterface
     */
    public function setToken(array $token);

    /**
     * Get token
     *
     * @return array
     */
    public function getToken();

    /**
     * Set credentials
     *
     * @param  array  $credentials
     * @return ServiceInterface
     */
    public function setCredentials(array $credentials);

    /**
     * Set scope
     *
     * @param  array  $scope
     * @return ServiceInterface
     */
    public function setScopes(array $scope);

    /**
     * Get scope
     *
     * @return array
     */
    public function getScopes();

    /**
     * Set redirect uri
     *
     * @param  string $redirectUri
     * @return ServiceInterface
     */
    public function setRedirectUri($uri);

    /**
     * Get redirect uri
     *
     * @return string
     */
    public function getRedirectUri();
}
