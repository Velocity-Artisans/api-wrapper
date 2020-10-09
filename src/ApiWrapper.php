<?php

namespace VelocityArtisans\ApiWrapper;

use Exception;
use Illuminate\Support\Facades\Http;
use VelocityArtisans\ApiWrapper\Exceptions\InvalidKeyException;
use VelocityArtisans\ApiWrapper\Exceptions\InvalidUrlException;

class ApiWrapper
{
    /**
     * API version
     *
     * @var string
     */
    public const VERSION = 'v1';

    public function __construct()
    {
        if (!config('api-wrapper.url')) {
            throw new InvalidUrlException('You must provide an api url, otherwise we cannot connect to the system.');
        }

        if (!config('api-wrapper.key')) {
            throw new InvalidKeyException('You must provide an api key, otherwise we cannot connect to the system.');
        }
    }

    /**
     * Make an API call
     *
     * @param string $method
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return array
     */
    public function call(string $method, string $path, array $data = [], array $headers = []): array
    {
        try {
            $response = Http::withToken(config('api-wrapper.key'))
                ->withHeaders($headers)
                ->withOptions([
                    'verify' => !app()->isLocal()
                ])
                ->{$method}(
                    $this->url($path),
                    $data
                );

            if ($response->successful()) {
                return $response->json();
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Gets the api endpoint
     *
     * @param string $path
     * @return string
     */
    public function url(string $path = '/'): string
    {
        return trim(config('api-wrapper.url'), '/') . '/api/' . self::VERSION . '/' . trim($path, '/');
    }
}
