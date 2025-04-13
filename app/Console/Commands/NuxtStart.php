<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Process;
use Symfony\Component\Process\Process;

class NuxtStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nuxt:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Nuxt server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $process = new Process(['node', '--experimental-wasm-modules', base_path('nuxt/.output/server/index.mjs')]);
        $process->setTimeout(null);
        $process->start();

        if (extension_loaded('pcntl')) {
            $stop = function () use ($process) {
                $process->stop();
            };
            pcntl_async_signals(true);
            pcntl_signal(SIGINT, $stop);
            pcntl_signal(SIGQUIT, $stop);
            pcntl_signal(SIGTERM, $stop);
        }

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                $this->info(trim($data));
            } else {
                $this->error(trim($data));
                // report(new SsrException($data));
            }
        }

        return self::SUCCESS;
    }
}
