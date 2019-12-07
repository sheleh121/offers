<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class adminAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        User::create([
            'name' => $this->argument('name')
            ,'password' => \Hash::make($this->argument('password'))
            ,'isAdmin' => true
        ]);

        $this->info('Админ создан. Логин:' . $this->argument('name'));
    }
}
