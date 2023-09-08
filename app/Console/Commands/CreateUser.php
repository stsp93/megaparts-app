<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

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
        $email = $this->ask('Enter email');
        $password = $this->secret('Enter password (input is hidden)');
        $role = $this->choice('Select user role', ['admin','manager']);

        $validator = Validator::make([
            'email' => $email,
            'password' => $password,
        ], [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:3'],
        ]);

        if ($validator->fails()) {
            $this->info('Staff User not created. See error messages below:');
        
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $user = new User;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->role = $role;
        $user->save();

        $this->info('User created successfully!');
    }
}
