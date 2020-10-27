<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run() : void
    {
        $verySecretPassword = password_hash('verysecret', PASSWORD_DEFAULT);

        if (Role::query()->doesntExist()) {
            $this->call(RoleSeeder::class);
        }

        User::query()->insert(
            [
                [
                    'name' => 'Administrator',
                    'email' => 'admin@admin.com',
                    'role' => UserType::ADMINISTRATOR,
                    'password' => $verySecretPassword
                ],
                [
                    'name' => 'Manager',
                    'email' => 'manager@manager.com',
                    'role' => UserType::MANAGER,
                    'password' => $verySecretPassword
                ],
                [
                    'name' => 'User',
                    'email' => 'user@user.com',
                    'role' => UserType::USER,
                    'password' => $verySecretPassword
                ],

            ]
        );
    }
}
