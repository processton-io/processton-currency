<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'base_path' => 'currencies',
    'menu_items' => [
        [
            "label" => "Currencies",
            "slug" => "currencies",
            "icon" => "dollar-sign",
            "permission" => [],
            "hidden_links" => [
            ]
        ]
    ],
    'interactions' => [
        [
            "slug" => "currencies",
            'title' => 'Currencies',
            'subtitle' => '',
            'icon' => 'dollar-sign',
            "schema" => [
                'breadcrumbs' => [
                    [
                        'label' => 'Currencies',
                        'slug' => 'currencies',
                        'icon' => 'list'
                    ]
                ],
                'filters' => [

                ],
                'elements' => [
                    [
                        'type' => 'row',
                        'width' => [
                            'xxxs' => 12,
                            'xxs' => 12,
                            'xs' => 12,
                            'sm' => 12,
                            'md' => 12,
                            'lg' => 12,
                            'xl' => 12,
                            'xxl' => 12,
                            'xxxl' => 12,
                        ],
                        'elements' => [
                            [
                                'type' => 'data_table',
                                'title' => '',
                                'srcOfData' => [
                                    'api_endpoint' => '/currencies/list',
                                ],
                                'width' => [
                                    'xxxs' => 12,
                                    'xxs' => 12,
                                    'xs' => 12,
                                    'sm' => 12,
                                    'md' => 12,
                                    'lg' => 12,
                                    'xl' => 12,
                                    'xxl' => 12,
                                    'xxxl' => 12,
                                ],
                            ]
                        ]
                    ],
                ],
            ]
        ],

    ],

    'resolver' => [
        'profile' => null,
        'edit_profile' => null,
        'update_profile' => null,
        'delete_profile' => null,
        'administrators' => null,
        'transfer_org' => null,
        'licences' => null,
        'add_licences' => null,
        'remove_licences' => null,
    ]
];