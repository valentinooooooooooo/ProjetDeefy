<?php

declare(strict_types=1);

namespace loader;

class Psr4ClassLoader
{
    private string $prefix;
    private string $baseDir;

    public function __construct(string $prefix, string $baseDir)
    {
        $this->prefix = $prefix;
        $this->baseDir = rtrim($baseDir, '/') . '/';
    }

    public function loadClass(string $class): void
    {
        if (strpos($class, $this->prefix) !== 0) {
            return;
        }
        $relative = substr($class, strlen($this->prefix));
        $file = $this->baseDir . str_replace('\\', '/', $relative) . '.php';
        if (is_file($file)) {
            require_once $file;
        }
    }

    public function register(): void
    {
        spl_autoload_register([$this, 'loadClass']);
    }
}
