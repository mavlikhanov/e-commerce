<?php
declare(strict_types=1);

namespace App\Shared\Parents\Providers;

use App\Providers\RouteServiceProvider;

class AbstractRouteProvider extends RouteServiceProvider
{
    private const PATH_TEMPLATE = 'app/Modules/%s/Application/Routes/%s.php';

    protected function getRouteGroup(string $moduleName, string $fileRouteName = null): string
    {
        if (empty($fileRouteName)) {
            $fileRouteName = $moduleName;
        }

        $path = sprintf(
            self::PATH_TEMPLATE,
            $moduleName,
            $fileRouteName
        );
        return base_path($path);
    }
}
