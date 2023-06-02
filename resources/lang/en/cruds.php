<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
            'slug'                         => 'Slug',
            'slug_helper'                  => ' ',
            'avatar'                       => 'Avatar',
            'avatar_helper'                => 'Please use square images',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'agent' => [
        'title'          => 'Agents',
        'title_singular' => 'Agent',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'display_name'               => 'Display Name',
            'display_name_helper'        => ' ',
            'user'                       => 'User',
            'user_helper'                => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'first_name'                 => 'First Name',
            'first_name_helper'          => ' ',
            'last_name'                  => 'Last Name',
            'last_name_helper'           => ' ',
            'notify_phone'               => 'Notify Phone',
            'notify_phone_helper'        => ' ',
            'contact_phone'              => 'Contact Phone',
            'contact_phone_helper'       => ' ',
            'timezone'                   => 'Timezone',
            'timezone_helper'            => ' ',
            'call_line'                  => 'Call Line',
            'call_line_helper'           => ' ',
            'biography'                  => 'Biography',
            'biography_helper'           => ' ',
            'license'                    => 'License',
            'license_helper'             => ' ',
            'website'                    => 'Website',
            'website_helper'             => ' ',
            'facebook'                   => 'Facebook',
            'facebook_helper'            => ' ',
            'youtube'                    => 'Youtube',
            'youtube_helper'             => ' ',
            'linkedin'                   => 'Linked In',
            'linkedin_helper'            => ' ',
            'twitter'                    => 'Twitter',
            'twitter_helper'             => ' ',
            'instagram'                  => 'Instagram',
            'instagram_helper'           => ' ',
            'settings'                   => 'Settings',
            'settings_helper'            => ' ',
            'office'                     => 'Office',
            'office_helper'              => ' ',
            'template'                   => 'Template',
            'template_helper'            => ' ',
            'is_vetted'                  => 'Is Vetted',
            'is_vetted_helper'           => ' ',
            'vetting_data'               => 'Vetting Data',
            'vetting_data_helper'        => ' ',
            'user_confirmed_info'        => 'User Confirmed Info',
            'user_confirmed_info_helper' => ' ',
            'demo'                       => 'Demo',
            'demo_helper'                => ' ',
            'published'                  => 'Published',
            'published_helper'           => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'agents'            => 'Agents',
            'agents_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'blog' => [
        'title'          => 'Blog',
        'title_singular' => 'Blog',
    ],
    'post' => [
        'title'          => 'Post',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'published'             => 'Published',
            'published_helper'      => ' ',
            'sticky'                => 'Sticky',
            'sticky_helper'         => ' ',
            'for'                   => 'For',
            'for_helper'            => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'content'               => 'Content',
            'content_helper'        => ' ',
            'author'                => 'Author',
            'author_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'slug'                  => 'Slug',
            'slug_helper'           => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
        ],
    ],

];