<?php

namespace Reduvel\Admin;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reduvel:admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Reduvel Admin, included migrations, user root, and publish assets';

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
        // migrate setup_users_table
        $this->callSilent('migrate');

        // create user root
        $this->createUserRoot();

        // publish assets
        $this->publishAssets();
    }

    protected function createUserRoot()
    {
        if ($this->confirm('Apakah ingin membuat user root?')) {
            $model = config('reduvel.admin.user.model');

            $name = $this->ask('Name for root?', 'Root');
            $email = $this->ask('Email for root?', 'root@example.com');
            $password = $this->secret('Password for root?');

            try {
                $user = $model::firstOrNew(['email' => $email]);
                $user->name = $name;
                $user->password = bcrypt($password);
                $user->save();

                $this->info('Berhasil membuat user root');
            } catch (\Exception $e) {
                $this->error('Gagal membuat user root');
            }
        }
    }

    protected function publishAssets()
    {
        if ($this->confirm('Apakah akan mempublish assets?')) {
            $this->callSilent('vendor:publish', [
                '--tag' => 'public',
                '--force' => true
            ]);

            $this->info('Published!');
        }
    }
}
