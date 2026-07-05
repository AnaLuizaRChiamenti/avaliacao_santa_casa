<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'Setores Hospitalares', 'slug' => 'setores-hospitalares'],
            ['name' => 'Especialidades Médicas', 'slug' => 'especialidades-medicas'],
            ['name' => 'Equipamentos', 'slug' => 'equipamentos'],
            ['name' => 'Unidades Assistenciais', 'slug' => 'unidades-assistenciais'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['slug' => $permission['slug']],
                ['name' => $permission['name']]
            );
        }
    }
}
