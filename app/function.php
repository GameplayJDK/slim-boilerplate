<?php

function str_starts_with($haystack, $needle, $strict = false)
{

    return ($strict ? strpos($haystack, $needle) : stripos($haystack, $needle)) === 0;
}

function str_ends_with($haystack, $needle, $strict = false)
{

    return ($strict ? strrpos($haystack, $needle) : strripos($haystack, $needle)) === (strlen($haystack) - strlen($needle));
}

# Special function to check the current environment
function is_sapi($name = 'cli')
{
    return (php_sapi_name() === $name);
}

# Place your php helper functions below; classes and such things go into the
# "lib/" directory.
