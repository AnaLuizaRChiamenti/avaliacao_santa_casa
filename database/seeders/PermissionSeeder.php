<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'Módulo Financeiro', 'slug' => 'financeiro'],
            ['name' => 'Módulo Estoque', 'slug' => 'estoque'],
            ['name' => 'Módulo Relatórios', 'slug' => 'relatorios'],
            ['name' => 'Módulo Configurações', 'slug' => 'configuracoes'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['slug' => $permission['slug']],
                ['name' => $permission['name']]
            );
        }
    }
}
