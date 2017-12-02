<?php

$app->get('/help', function ($request, $response, $params)
{
    # Required by the console implementation, you might want wrap this route
    # inside an if statement with an "is_sapi()" check for "cli"

    $n = "\n";

    echo("** slim-boilerplate console ** " . $n);
    echo("" . $n);

    # Insert your help message here

    return $response->withStatus(200);
});

# Place your routing logic below, e.g.
# $app->get('/some-route', function ($request, $response, $params)
# {
#     return $response->withStatus(200);
# });
