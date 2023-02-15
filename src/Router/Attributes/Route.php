<?php

declare(strict_types=1);

namespace Nemanja\Ewa\Router\Attributes;

use Attribute;

#[Attribute]
class Route {

    public function __construct(public string $routePath, public string $method = 'GET') {

    }
}

