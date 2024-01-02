<?php

namespace App\Console\Commands;

use App\Mail\Gmail2;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:GmailTest';

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
        Mail::to('mhdghozali2@gmail.com')->send(new Gmail2());
        return Command::SUCCESS;
    }
}
