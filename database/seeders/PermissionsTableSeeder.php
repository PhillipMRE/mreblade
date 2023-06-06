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
                'title' => 'board_create',
            ],
            [
                'id'    => 114,
                'title' => 'board_edit',
            ],
            [
                'id'    => 115,
                'title' => 'board_show',
            ],
            [
                'id'    => 116,
                'title' => 'board_delete',
            ],
            [
                'id'    => 117,
                'title' => 'board_access',
            ],
            [
                'id'    => 118,
                'title' => 'board_area_access',
            ],
            [
                'id'    => 119,
                'title' => 'board_developer_area_access',
            ],
            [
                'id'    => 120,
                'title' => 'state_resident_create',
            ],
            [
                'id'    => 121,
                'title' => 'state_resident_edit',
            ],
            [
                'id'    => 122,
                'title' => 'state_resident_show',
            ],
            [
                'id'    => 123,
                'title' => 'state_resident_delete',
            ],
            [
                'id'    => 124,
                'title' => 'state_resident_access',
            ],
            [
                'id'    => 125,
                'title' => 'state_create',
            ],
            [
                'id'    => 126,
                'title' => 'state_edit',
            ],
            [
                'id'    => 127,
                'title' => 'state_show',
            ],
            [
                'id'    => 128,
                'title' => 'state_delete',
            ],
            [
                'id'    => 129,
                'title' => 'state_access',
            ],
            [
                'id'    => 130,
                'title' => 'status_type_create',
            ],
            [
                'id'    => 131,
                'title' => 'status_type_edit',
            ],
            [
                'id'    => 132,
                'title' => 'status_type_show',
            ],
            [
                'id'    => 133,
                'title' => 'status_type_delete',
            ],
            [
                'id'    => 134,
                'title' => 'status_type_access',
            ],
            [
                'id'    => 135,
                'title' => 'additional_section_access',
            ],
            [
                'id'    => 136,
                'title' => 'carrier_create',
            ],
            [
                'id'    => 137,
                'title' => 'carrier_edit',
            ],
            [
                'id'    => 138,
                'title' => 'carrier_show',
            ],
            [
                'id'    => 139,
                'title' => 'carrier_delete',
            ],
            [
                'id'    => 140,
                'title' => 'carrier_access',
            ],
            [
                'id'    => 141,
                'title' => 'chart_create',
            ],
            [
                'id'    => 142,
                'title' => 'chart_edit',
            ],
            [
                'id'    => 143,
                'title' => 'chart_show',
            ],
            [
                'id'    => 144,
                'title' => 'chart_delete',
            ],
            [
                'id'    => 145,
                'title' => 'chart_access',
            ],
            [
                'id'    => 146,
                'title' => 'phone_create',
            ],
            [
                'id'    => 147,
                'title' => 'phone_edit',
            ],
            [
                'id'    => 148,
                'title' => 'phone_show',
            ],
            [
                'id'    => 149,
                'title' => 'phone_delete',
            ],
            [
                'id'    => 150,
                'title' => 'phone_access',
            ],
            [
                'id'    => 151,
                'title' => 'agent_developer_area_access',
            ],
            [
                'id'    => 152,
                'title' => 'sponsor_create',
            ],
            [
                'id'    => 153,
                'title' => 'sponsor_edit',
            ],
            [
                'id'    => 154,
                'title' => 'sponsor_show',
            ],
            [
                'id'    => 155,
                'title' => 'sponsor_delete',
            ],
            [
                'id'    => 156,
                'title' => 'sponsor_access',
            ],
            [
                'id'    => 157,
                'title' => 'sms_template_create',
            ],
            [
                'id'    => 158,
                'title' => 'sms_template_edit',
            ],
            [
                'id'    => 159,
                'title' => 'sms_template_show',
            ],
            [
                'id'    => 160,
                'title' => 'sms_template_delete',
            ],
            [
                'id'    => 161,
                'title' => 'sms_template_access',
            ],
            [
                'id'    => 162,
                'title' => 'sms_template_default_create',
            ],
            [
                'id'    => 163,
                'title' => 'sms_template_default_edit',
            ],
            [
                'id'    => 164,
                'title' => 'sms_template_default_show',
            ],
            [
                'id'    => 165,
                'title' => 'sms_template_default_delete',
            ],
            [
                'id'    => 166,
                'title' => 'sms_template_default_access',
            ],
            [
                'id'    => 167,
                'title' => 'sponsor_area_access',
            ],
            [
                'id'    => 168,
                'title' => 'listings_area_access',
            ],
            [
                'id'    => 169,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
