<?php 

declare(strict_types=1);

namespace Nemanja\Ewa\ServiceModels\Http;

class Server {

    public static function get(string $key): string {
        
        return $_SERVER[$key];
    }

    public static function getAll(): array {
        
        return $_SERVER;
    }
}