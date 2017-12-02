
# slim-boilerplate - A coding-by-convention boilerplate for Slim apps

I created a boilerplate for my future slim applications. Feel free to use it.

## Installation

There isn't much to do before you start building your own slim application:

```
# clone this repo; or alternatively downlad the zip
git clone https://github.com/GameplayJDK/slim-boilerplate.git my-slim-project

cd my-slim-project/

# install composer dependencies
composer install

# install bower dependencies
bower install

# start your php server to test if everything works
php -S localhost:8000 -t public/ ./default.php
# visit localhost:8000 to check
# this command might not work, XAMPP can be used instead
```

And you're set to go.

## Usage

Using this boilerplate is easy, as everything is already set up and only needs
some tweaking to fit your needs.

### The `app/` directory

This contains the files you'll need to modify for your own requirements:
 * `function.php`: Php helper functions go here (classes and such go into `lib/`)
 * `config.php`: Slim (and general) configuration
 * `environment.php`: Set up environment (if accessed from console)
 * `dependency.php`: Set up container and dependencies
 * `middleware.php`: Insert your global middleware into this one
 * `route.php`: Create routes here

### The `app/lib/` directory

The files here should have the namespace `\lib`, as it's aleady set up in
`composer.json`. This can be used for project-specific classes that have no
composer package.

### The `public/` and `res/` directories

These are the publicly accessible folders. Html pages and related files go into
`public/` whereas images, scripts and stylesheets shuld be places in `res/`.
That way they're distinct which means less mess. :)

*Note: The above assumes that the root directory is also the web-root. More
information below:*

`public/` can also be used as root, but that requires moving the `.htaccess`
file and creating a new `default.php` pointing to the one inside the root
folder.

### Using the `/bin/console`

It is possible to access all routes (or only some) using the command line
interface of php. To do so just execute:

```
php bin/concole help
```

The `/help` route is predefined inside of `route.php` as an example
implementation.

To make routes available only for console access (or the other way around),
wrap them into a simple if-statement that checks for the environment. It's
recommended to use the `is_sapi()` helper function:

```php
if (is_sapi('cli'))
{
    // Routes or commands for console access only
    $app->get...
}
else
{
    // Routes or commands for web access only
}
```

Another way is to use the ternary operator (`?:`) when registering routes. That
way you are able to avoid multiple definitions of the same route. This is
especially handy when the output stays the same, no matter what environment is
used. E.g. `$app->get(($console ? '/route/some-route' : '/some-route'), ...` (where `$console` is holding the `is_sapi()`
value)

Of course you can accomplish the same result by just defining a route without
checking the current environment, but then your routes could collide with
commands you might want to define for console use.

## License

This project is licensed under the MIT License - see the
[LICENSE.md](https://github.com/GameplayJDK/slim-boilerplate/blob/master/LICENSE.txt)
file for details.
