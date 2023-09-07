<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    protected $signature = 'create:user';
    protected $description = 'Create a new user';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->ask('Enter username');
        $password = $this->secret('Enter password (input is hidden)');
        $role = $this->choice('Select user role', ['admin','manager']);

        $user = new User;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->role = $role;
        $user->save();

        $this->info('User created successfully!');
    }
}
