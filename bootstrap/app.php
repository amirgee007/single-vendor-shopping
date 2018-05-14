<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
	realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
	'Illuminate\Contracts\Http\Kernel',
	'App\Http\Kernel'
);

$app->singleton(
	'Illuminate\Contracts\Console\Kernel',
	'App\Console\Kernel'
);

$app->singleton(
	'Illuminate\Contracts\Debug\ExceptionHandler',
	'App\Exceptions\Handler'
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

/*DISABLING THE ERROR ADDED BY NAGOOR */
$app->afterBootstrapping(
    'Illuminate\Foundation\Bootstrap\HandleExceptions',
    function ($app) {
        set_error_handler(function ($level, $message, $file = '', $line = 0, $context = []) {
            // Check if this error level is handled by error reporting
            if (error_reporting() & $level) {
                // Return false for any error levels that should
                // be handled by the built in PHP error handler.
                if ($level & (E_WARNING | E_NOTICE | E_DEPRECATED)) {
                    return false;
                }

                // Throw an exception to be handled by Laravel for all other errors.
                throw new ErrorException($message, 0, $level, $file, $line);
            }
        });
    }
);

return $app;
