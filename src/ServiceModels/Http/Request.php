<?php 

declare(strict_types=1);

namespace Nemanja\Ewa\ServiceModels\Http;

class Request {

    /**
     * Request method return
     *
     */
    public static function method(): string {

        return Server::get('REQUEST_METHOD');
    }

    /**
     * Get value from GET request
     *
     */
    public static function get(string $key): string|null {

        return self::value($key, $_GET);
    }

    /**
     * Get value from POST request
     *
     */
    public static function post(string $key): string|null {
        
        return self::value($key, $_POST);
    }

    /**
     * Check that the request has the key
     *
     */
    public static function has(array $type, string $key): string|bool {

        return array_key_exists($key, $type);
    }

    /**
     * Get the value from the request
     *
     */
    public static function value(string $key, array $type = null): string|null {

        $type = isset($type) ? $type : Server::getAll();
        return self::has($type, $key) ? $type[$key] : null;
    }
}