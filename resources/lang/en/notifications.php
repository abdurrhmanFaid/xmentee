<?php

return [
    // Tickets
    'ticket_generated' => "<b>:owner</b> Has Generate a ticket to <b>join you band</b>",
    'lesson_created' => "<b>:band Instructor</b> published a new lesson: "
        ."<a href=':link'>:title</a>",
    'post_created' => "<b>:creator</b> Has Published a new post of type <b>:type</b>",
    'messaging' => [
        'post_created' => "<b>:creator</b> Has Published a new post of type <b>:type</b> <a href=':link'>:title</a>"
    ],
    'points' => [
        'increased' => 'You have got :count Point because :reason',
        'decreased' => 'You have lost :count Point because :reason',
        'posts' => [
            'created' => [
                'doer' => 'You have published a new post',
            ]
        ],
        'comments' => [
            'created' => [
                'doer' => 'You have created a new comment',
                'objectOwner' => 'You receive a new comment',
                'doerGroup' => 'A member in one of your groups has created a comment',
                'objectOwnerGroup' => 'A member in one of your groups posts a post and this post received a new comment',
            ]
        ],
        'rates' => [
            'post' => [
                'doer' => 'You have rated a post',
                'objectOwner' => 'Your post got a rate',
                'objectOwnerGroup' => 'A friend from one of your groups has got a rate for his post',
            ],
        ],
    ],

    'posts' => [
        'comments' => [
            'created' => [
                'internal' => [
                    'mentioned' => '<b>:username</b> has mentioned you in <b>:post</b>',
                    'objectOwner' => '<b>:username</b> has commented in your post <b>:post</b>',
                    'subscriber' => '<b>:username</b> has commented on post you follow'
                ],
                'external' => [
                    'objectOwner' => '<b>:username</b> Has commented in your post <b>:post</b> <pre>:comment</pre> <a href=":link">view</a>',
                    'subscriber' => '<b>:username</b> has comment on <b>:post</b> <pre>:comment</pre> <a href=":link">view</a>',
                    'mentioned' => '<b>:username</b> has mentioned you in <b>:post</b> <pre>:comment</pre> <a href=":link">view</a>',
                ]
            ]
        ],
    ],

    'payments' => [
        'late' => [
            'internal' => 'Late Payment! You have to pay :value before :date for :title',
            'external' => 'Hey :name, <pre>###### You have a late payment for :band ! ######</pre> You have to pay <b>:value</b> before <b>:date</b> for <b>:title</b><pre>:description</pre>'
        ],
        'created' => [
            'internal' => [
                'paid' => 'You have paid <b>:value</b> for <b>:title</b> at <b>:date</b>',
                'unpaid' => 'You have to pay <b>:value</b> for <b>:title</b> before <b>:date</b>',
            ],
            'external' => [
                'paid' => 'Hey :name, <pre>###### New Payment For :band #######</pre> You have paid <b>:value</b> for <b>:title</b> at <b>:date</b><pre>:description</pre>',
                'unpaid' => 'Hey :name, <pre>###### New Payment For :band ######</pre> You have to pay <b>:value</b> for <b>:title</b> at <b>:date</b><pre>:description</pre>',
            ]
        ]
    ]
];
