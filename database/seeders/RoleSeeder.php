<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run() : void
    {
        Role::query()
            ->insert(
                collect(UserType::getInstances())
                    ->map(
                        static function (UserType $userType) {
                            return [
                                'role_name' => $userType->description,
                                'id' => $userType->value,
                                'created_at' => now(),
                            ];
                        }
                    )
                    ->toArray()
            );
    }
}
