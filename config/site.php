<?php

return [

    'name' => env('APP_NAME', 'XMentee'),
    'email' => 'promentee@gmail.com',
    'description' => 'XMentee is an online management system created for advanced teams, If you are an instructor you can manage your team easily using XMentee',
    'motto' => 'If you want to lift your level up, lift up someone else',
    'keywords' => 'team, group, management, education, lessons, posts, tasks, groups, categories, points, entertainment',
    'logo' => "/images/logo.png",
    'mid_icon' => "/images/logo.png",
    'icon' => '/images/logo.png',
    'social_links' => [
        'facebook' => 'facebook.com',
        'twitter' => 'twitter.com',
        'instagram' => 'instagram.com',
    ],

    'admins_emails' => [
        'abdurrhmanfaid@gmail.com',
    ],

    'settings' => [
        'theme' => [
            'css' => '/theme1/css/',
            'js' => '/theme1/js/',
            'plugins' => '/theme1/plugins/',
            'images' => '/theme1/images/',
        ],
        'notifications' => [
            'open' => true,
            'comments' => true,
            'tickets' => true,
            'lessons' => true,
            'posts' => true,
            'points' => true,
            'rates' => true,
            'payments' => true,
        ]
    ],

    'notifications_icons' => [
        'tickets' => 'fa fa-ticket-alt',
        'posts' => 'fa fa-edit',
        'comments' => 'fa fa-comment',
        'rates' => 'fa fa-star',
        'points_up' => 'fa fa-hand-point-up',
        'points_down' => 'fa fa-hand-point-down',
        'payments' => 'fa fa-money-bill-wave',
    ],

    'rate_system' => [
        'max_rate' => 5,
        'min_rate' => 1,
        'points_per_rate' => 2,
        'rateable' => [
            \App\Models\Post::class,
            \App\Models\Task::class,
        ]
    ],

    'points_system' => [
        'max_rate' => 5,
        'min_rate' => 1,
        'points_per_rate' => 2,

        'posts' => [
            'created' => [
                'doer'             => 15,
                'objectOwner'      => 0,
                'doerGroup'        => 0,
                'objectOwnerGroup' => 0,
            ],
        ],

        'comments' => [
            'created' => [
                'doer'             => 5,
                'objectOwner'      => 0,
                'doerGroup'        => 0,
                'objectOwnerGroup' => 0,
            ],
        ],

        'rates' => [
            'post' => [
                'doer' => 0,
                'objectOwner' => 1,
                'doerGroup' => 0,
                'objectOwnerGroup' => 0,
            ]
        ],

    ]
];
