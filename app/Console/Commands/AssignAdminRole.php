<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:admin-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Введите email пользователя, которому назначить роль admin');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('Пользователь не найден.');
            return;
        }

        $user->assignRole('admin');
        $this->info("Роль 'admin' назначена пользователю $email");
    }
}
