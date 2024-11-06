<?php

namespace RustamAliHussaini\LaravelDiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use RustamAliHussaini\LaravelDiskMonitor\Models\DiskMonitorEntry;

class LaravelDiskMonitorCommand extends Command
{
    public $signature = 'laravel-disk-monitor:record-metrics';

    public $description = 'Record the metrics of a disk';

    public function handle()
    {
        $this->comment('Recording metrics...');

        $diskName = config('disk-monitor.disk_name');

        $fileCount = config(Storage::disk($diskName)->allFiles());

        DiskMonitorEntry::create([
            'disk_name' => config('disk-monitor.disk_name'),
            'file_count' => $fileCount,
        ]);

        $this->comment('All done');

    }
}
