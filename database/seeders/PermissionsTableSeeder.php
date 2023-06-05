<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'agent_create',
            ],
            [
                'id'    => 24,
                'title' => 'agent_edit',
            ],
            [
                'id'    => 25,
                'title' => 'agent_show',
            ],
            [
                'id'    => 26,
                'title' => 'agent_delete',
            ],
            [
                'id'    => 27,
                'title' => 'agent_access',
            ],
            [
                'id'    => 28,
                'title' => 'client_create',
            ],
            [
                'id'    => 29,
                'title' => 'client_edit',
            ],
            [
                'id'    => 30,
                'title' => 'client_show',
            ],
            [
                'id'    => 31,
                'title' => 'client_delete',
            ],
            [
                'id'    => 32,
                'title' => 'client_access',
            ],
            [
                'id'    => 33,
                'title' => 'blog_access',
            ],
            [
                'id'    => 34,
                'title' => 'post_create',
            ],
            [
                'id'    => 35,
                'title' => 'post_edit',
            ],
            [
                'id'    => 36,
                'title' => 'post_show',
            ],
            [
                'id'    => 37,
                'title' => 'post_delete',
            ],
            [
                'id'    => 38,
                'title' => 'post_access',
            ],
            [
                'id'    => 39,
                'title' => 'developer_area_access',
            ],
            [
                'id'    => 40,
                'title' => 'access_token_create',
            ],
            [
                'id'    => 41,
                'title' => 'access_token_edit',
            ],
            [
                'id'    => 42,
                'title' => 'access_token_show',
            ],
            [
                'id'    => 43,
                'title' => 'access_token_delete',
            ],
            [
                'id'    => 44,
                'title' => 'access_token_access',
            ],
            [
                'id'    => 45,
                'title' => 'agent_area_access',
            ],
            [
                'id'    => 46,
                'title' => 'quote_create',
            ],
            [
                'id'    => 47,
                'title' => 'quote_edit',
            ],
            [
                'id'    => 48,
                'title' => 'quote_show',
            ],
            [
                'id'    => 49,
                'title' => 'quote_delete',
            ],
            [
                'id'    => 50,
                'title' => 'quote_access',
            ],
            [
                'id'    => 51,
                'title' => 'customer_create',
            ],
            [
                'id'    => 52,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 53,
                'title' => 'customer_show',
            ],
            [
                'id'    => 54,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 55,
                'title' => 'customer_access',
            ],
            [
                'id'    => 56,
                'title' => 'disclaimer_group_create',
            ],
            [
                'id'    => 57,
                'title' => 'disclaimer_group_edit',
            ],
            [
                'id'    => 58,
                'title' => 'disclaimer_group_show',
            ],
            [
                'id'    => 59,
                'title' => 'disclaimer_group_delete',
            ],
            [
                'id'    => 60,
                'title' => 'disclaimer_group_access',
            ],
            [
                'id'    => 61,
                'title' => 'disclaimer_type_create',
            ],
            [
                'id'    => 62,
                'title' => 'disclaimer_type_edit',
            ],
            [
                'id'    => 63,
                'title' => 'disclaimer_type_show',
            ],
            [
                'id'    => 64,
                'title' => 'disclaimer_type_delete',
            ],
            [
                'id'    => 65,
                'title' => 'disclaimer_type_access',
            ],
            [
                'id'    => 66,
                'title' => 'disclaimer_variable_create',
            ],
            [
                'id'    => 67,
                'title' => 'disclaimer_variable_edit',
            ],
            [
                'id'    => 68,
                'title' => 'disclaimer_variable_show',
            ],
            [
                'id'    => 69,
                'title' => 'disclaimer_variable_delete',
            ],
            [
                'id'    => 70,
                'title' => 'disclaimer_variable_access',
            ],
            [
                'id'    => 71,
                'title' => 'disclaimer_access',
            ],
            [
                'id'    => 72,
                'title' => 'email_history_create',
            ],
            [
                'id'    => 73,
                'title' => 'email_history_edit',
            ],
            [
                'id'    => 74,
                'title' => 'email_history_show',
            ],
            [
                'id'    => 75,
                'title' => 'email_history_delete',
            ],
            [
                'id'    => 76,
                'title' => 'email_history_access',
            ],
            [
                'id'    => 77,
                'title' => 'keyword_create',
            ],
            [
                'id'    => 78,
                'title' => 'keyword_edit',
            ],
            [
                'id'    => 79,
                'title' => 'keyword_show',
            ],
            [
                'id'    => 80,
                'title' => 'keyword_delete',
            ],
            [
                'id'    => 81,
                'title' => 'keyword_access',
            ],
            [
                'id'    => 82,
                'title' => 'keyword_area_access',
            ],
            [
                'id'    => 83,
                'title' => 'keyword_app_create',
            ],
            [
                'id'    => 84,
                'title' => 'keyword_app_edit',
            ],
            [
                'id'    => 85,
                'title' => 'keyword_app_show',
            ],
            [
                'id'    => 86,
                'title' => 'keyword_app_delete',
            ],
            [
                'id'    => 87,
                'title' => 'keyword_app_access',
            ],
            [
                'id'    => 88,
                'title' => 'keyword_prerender_create',
            ],
            [
                'id'    => 89,
                'title' => 'keyword_prerender_edit',
            ],
            [
                'id'    => 90,
                'title' => 'keyword_prerender_show',
            ],
            [
                'id'    => 91,
                'title' => 'keyword_prerender_delete',
            ],
            [
                'id'    => 92,
                'title' => 'keyword_prerender_access',
            ],
            [
                'id'    => 93,
                'title' => 'lending_officer_create',
            ],
            [
                'id'    => 94,
                'title' => 'lending_officer_edit',
            ],
            [
                'id'    => 95,
                'title' => 'lending_officer_show',
            ],
            [
                'id'    => 96,
                'title' => 'lending_officer_delete',
            ],
            [
                'id'    => 97,
                'title' => 'lending_officer_access',
            ],
            [
                'id'    => 98,
                'title' => 'listing_create',
            ],
            [
                'id'    => 99,
                'title' => 'listing_edit',
            ],
            [
                'id'    => 100,
                'title' => 'listing_show',
            ],
            [
                'id'    => 101,
                'title' => 'listing_delete',
            ],
            [
                'id'    => 102,
                'title' => 'listing_access',
            ],
            [
                'id'    => 103,
                'title' => 'note_create',
            ],
            [
                'id'    => 104,
                'title' => 'note_edit',
            ],
            [
                'id'    => 105,
                'title' => 'note_show',
            ],
            [
                'id'    => 106,
                'title' => 'note_delete',
            ],
            [
                'id'    => 107,
                'title' => 'note_access',
            ],
            [
                'id'    => 108,
                'title' => 'listing_pocket_create',
            ],
            [
                'id'    => 109,
                'title' => 'listing_pocket_edit',
            ],
            [
                'id'    => 110,
                'title' => 'listing_pocket_show',
            ],
            [
                'id'    => 111,
                'title' => 'listing_pocket_delete',
            ],
            [
                'id'    => 112,
                'title' => 'listing_pocket_access',
            ],
            [
                'id'    => 113,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
