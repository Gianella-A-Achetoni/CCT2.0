<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'users.manage',
            'calendar.manage',
            'courses.view',
            'courses.create',
            'courses.manage_own',
            'courses.enroll_students',
            'courses.publish_news',
            'courses.upload_materials',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $teacher = Role::firstOrCreate(['name' => 'teacher']);
        $student = Role::firstOrCreate(['name' => 'student']);

        $admin->syncPermissions(Permission::all());
        $teacher->syncPermissions([
            'courses.view',
            'courses.create',
            'courses.manage_own',
            'courses.enroll_students',
            'courses.publish_news',
            'courses.upload_materials',
        ]);
        $student->syncPermissions([
            'courses.view',
        ]);
    }
}
