<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LatihanCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("BERHASIL " . date('Y-m-d H:i:s'));
        // return Command::SUCCESS;
    }
}
