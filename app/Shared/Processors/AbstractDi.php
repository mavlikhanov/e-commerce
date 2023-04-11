<?php
declare(strict_types=1);

namespace App\Shared\Processors;

use Illuminate\Support\Facades\File;
use ReflectionClass;
use ReflectionException;

abstract class AbstractDi
{
    protected string $directory;
    protected string $namespace;

    /**
     * @throws ReflectionException
     */
    protected function parseProcessors(): array
    {
        $processors = [];
        $classProcessors = $this->loadClasses($this->directory);
        foreach ($classProcessors as $processor) {
            $class = sprintf($this->namespace, $processor->getFilenameWithoutExtension());
            $reflectionClass = new ReflectionClass($class);
            if ($reflectionClass->isAbstract() || $reflectionClass->isInterface()) {
                continue;
            }
            $processors[] = app($class);
        }
        return $processors;
    }

    protected function loadClasses(string $path): array
    {
        return File::allFiles(base_path($path));
    }
}
