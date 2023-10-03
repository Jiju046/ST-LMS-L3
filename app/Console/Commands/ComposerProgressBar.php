<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ComposerProgressBar extends Command
{
    protected $signature = 'composer:progress-bar';

    protected $description = 'Run Composer with a progress bar';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Create a new Symfony Process for Composer Update
        $process = new Process(['composer', 'update']);
        $process->setTty(true);

        // Start the process
        $process->start();

        // Initialize the progress bar
        $this->output->progressStart(100);

        while ($process->isRunning()) {
            $this->output->progressAdvance();
            usleep(100000); // Sleep for 100ms to avoid excessive CPU usage
        }

        // Complete the progress bar
        $this->output->progressFinish();

        // Display a completion message
        $this->info('Composers updated completed.');
    }
}