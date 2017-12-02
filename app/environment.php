<?php

use \Slim\Http\Environment as Environment;

# Only change the environment if accessed from console
if (is_sapi('cli'))
{
    $argv = $GLOBALS['argv'];
    array_shift($argv);

    $path_info = $argv;

    if (empty($path_info))
    {
        # This requires a "/help" route to be defined
        $path_info = [
            'help'
        ];
    }

    $path_info = '/' . implode('/', $argv);

    $environment = [
        'environment' => Environment::mock([
            'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'],
            'REQUEST_URI' => $path_info,
        ]),
    ];

    # Build new configuration
    $config = array_merge($config, $environment);
}
