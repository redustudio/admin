<?php

namespace Reduvel\Admin\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reduvel:admin:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish assets Reduvel Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // publish migrations
        $this->publishMigrations();

        // publish config
        $this->publishConfig();

        // publish views
        $this->publishViews();

        // publish assets
        $this->publishAssets();
    }

    protected function publishMigrations()
    {
        if ($this->confirm('Apakah ingin mempublish migrations?')) {
            $this->call('vendor:publish', [
                '--provider' => 'Reduvel\Admin\ServiceProvider',
                '--tag' => 'migrations'
            ]);
        }
    }

    protected function publishConfig()
    {
        if ($this->confirm('Apakah ingin mempublish configuration?')) {
            $this->call('vendor:publish', [
                '--provider' => 'Reduvel\Admin\ServiceProvider',
                '--tag' => 'config'
            ]);
        }
    }

    protected function publishViews()
    {
        if ($this->confirm('Apakah ingin mempublish views?')) {
            $this->call('vendor:publish', [
                '--provider' => 'Reduvel\Admin\ServiceProvider',
                '--tag' => 'views'
            ]);
        }
    }

    protected function publishAssets()
    {
        if ($this->confirm('Apakah ingin mempublish assets?')) {
            $this->call('vendor:publish', [
                '--provider' => 'Reduvel\Admin\ServiceProvider',
                '--tag' => 'public',
                '--force' => true
            ]);
        }
    }
}
