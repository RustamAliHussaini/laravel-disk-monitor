<?php

namespace RustamAliHussaini\LaravelDiskMonitor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RustamAliHussaini\LaravelDiskMonitor\LaravelDiskMonitor
 */
class LaravelDiskMonitor extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \RustamAliHussaini\LaravelDiskMonitor\LaravelDiskMonitor::class;
    }
}
