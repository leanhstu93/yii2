<?php
return [
    'adminEmail' => 'admin@example.com',
    'menubarAdmin' => [
        'mn_manager_product' => [
            'name' => 'Quản lý sản phẩm1',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập sản phẩm',
                    'link' => 'product/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách sản phẩm',
                    'link' => 'product/index'
                ],
                'submenu_3' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'product-category/index'
                ]
            ]
        ],
        'mn_manager_news' => [
            'name' => 'Quản lý tin tức',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập tin tức',
                    'link' => 'news/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách tin tức',
                    'link' => 'news/index'
                ],
                'submenu_3' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'news-category/index'
                ]
            ]
        ]
    ]
];
