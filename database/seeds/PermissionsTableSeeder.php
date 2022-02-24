<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'teacher_create',
            ],
            [
                'id'    => '18',
                'title' => 'teacher_edit',
            ],
            [
                'id'    => '19',
                'title' => 'teacher_show',
            ],
            [
                'id'    => '20',
                'title' => 'teacher_delete',
            ],
            [
                'id'    => '21',
                'title' => 'teacher_access',
            ],
            [
                'id'    => '27',
                'title' => 'course_create',
            ],
            [
                'id'    => '28',
                'title' => 'course_edit',
            ],
            [
                'id'    => '29',
                'title' => 'course_show',
            ],
            [
                'id'    => '30',
                'title' => 'course_delete',
            ],
            [
                'id'    => '31',
                'title' => 'course_access',
            ],
            [
                'id'    => '32',
                'title' => 'enrollment_create',
            ],
            [
                'id'    => '33',
                'title' => 'enrollment_edit',
            ],
            [
                'id'    => '34',
                'title' => 'enrollment_show',
            ],
            [
                'id'    => '35',
                'title' => 'enrollment_delete',
            ],
            [
                'id'    => '36',
                'title' => 'enrollment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
