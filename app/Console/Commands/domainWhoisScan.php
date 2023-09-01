<?php

namespace App\Console\Commands;

use App\Http\Controllers\Domain\WhoisController;
use App\Http\Controllers\TelegramController;
use Illuminate\Console\Command;

class domainWhoisScan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:domain-whois-scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(WhoisController $whc, TelegramController $tele)
    {

        $this->info('Сканирование whois информации о доменах');

        try {
            $e = $whc->whoisUpdate(10, 'array');
            $msg = 'скан доменов ';
            foreach ($e as $domain) {
                $this->success($domain);
                $msg .= ' '.$domain;
            }
            $tele::send($msg);
        } catch (\Exception $ex) {
            $this->error('нет доменов для сканироваиня');
            $tele::send('нет доменов для сканироваиня');
        }

    }
}
