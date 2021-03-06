<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\ProcessUtils;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;

class ServeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server';

    /**
     * Execute the console command.
     *
     * @throws \Exception
     */
    public function handle()
    {
        chdir($this->laravel->basePath('public'));

        $this->line("<info>Lumen development server started:</info> http://{$this->host()}:{$this->port()}");

        passthru($this->serverCommand());
    }

    /**
     * Get the full server command.
     *
     * @return string
     */
    protected function serverCommand()
    {
        $base = base_path();
        if (file_exists("{$base}/server.php")) {
            $command = '%s -S %s:%s %s/server.php';
        } else {
            $command = '%s -S %s:%s -t %s/public/';
        }

        return sprintf($command,
            ProcessUtils::escapeArgument((new PhpExecutableFinder())->find(false)),
            $this->host(),
            $this->port(),
            ProcessUtils::escapeArgument($base)
        );
    }

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host()
    {
        // return $this->input->getOption('host');
        return env('APP_URL');
    }

    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port()
    {
        // return $this->input->getOption('port');
        return env('APP_PORT');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', $this->host()],

            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', $this->port()],
        ];
    }
}
