<?php

# Place "require" or "use" statements below, e.g.
# use \some_namespace\SomeClass as SomeAlias;

$container = $app->getContainer();

# Allow access to application settings using "$this->config"
$container['config'] = function ($container)
{
    return $container->settings;
};

# Place container configuration below, e.g.
# $container['some_dependency'] = function ($container) use ($app)
# {
#     return new SomeAlias();
# };
