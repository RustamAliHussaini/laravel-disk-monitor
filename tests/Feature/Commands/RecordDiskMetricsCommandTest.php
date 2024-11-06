<?php

namespace RustamAliHussaini\LaravelDiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use RustamAliHussaini\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;
use RustamAliHussaini\LaravelDiskMonitor\Models\DiskMonitorEntry;
use RustamAliHussaini\LaravelDiskMonitor\Tests\TestCase;

class RecordDiskMetricsCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
    }

    public function it_will_record_zero_files_for_empty_disks()
    {
        Storage::disk('local')->put('test.txt','test');

        $this
            ->artisan(LaravelDiskMonitorCommand::class)
            ->assertExitCode(0);

        $this->assertCount(1, DiskMonitorEntry::get());
    }


}
