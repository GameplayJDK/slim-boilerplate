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

    if ((count($path_info) === 1) && (str_starts_with(current($path_info), '/')))
    {
        # Assume the argument is a fully qualified path, e.g.
        # /some/fully/qualified/path
        $path_info = current($path_info);
    }
    else
    {
        $path_info = '/' . implode('/', $path_info);
    }

    $environment = [
        'environment' => Environment::mock([
            'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'],
            'REQUEST_URI' => $path_info,
        ]),
    ];

    # Build new configuration
    $config = array_merge($config, $environment);
}
