<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Nececarritys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:base';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fills Database with Basic Roles and Permissions and Tags';

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
        /*
        $admin = Role::create(['name' => 'Admin']);
        $editor = Role::create(['name' => 'Editor']);
        $reader = Role::create(['name' => 'Reader']);

        $manageRoles = Permission::create(['name' => 'manage roles']);
        $write = Permission::create(['name' => 'add notes']);
        $read = Permission::create(['name' => 'read notes']);
        $remove = Permission::create(['name' => 'remove notes']);

        $admin->givePermissionTo($manageRoles);
        $admin->givePermissionTo($write);
        $admin->givePermissionTo($read);
        $admin->givePermissionTo($remove);

        $editor->givePermissionTo($write);
        $editor->givePermissionTo($read);

        $reader->givePermissionTo($read);
        */
        $user = User::find(1);
        $user->assignRole(1);
        $user->save();
    }
}
