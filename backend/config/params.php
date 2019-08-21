<?php
return [
    'adminEmail' => 'admin@example.com',
    'menubarAdmin' => [
        'mn_manager_product' => [
            'name' => 'Quản lý sản phẩm',
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
        ],
        'mn_manager_single-page' => [
            'name' => 'Quản lý trang đơn',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Danh sách trang đơn',
                    'link' => 'single-page/index'
                ],
            ]
        ],
        'mn_manager_banner' => [
            'name' => 'Quản lý baner',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Danh sách',
                    'link' => 'banner/index'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách danh mục',
                    'link' => 'banner-category/index'
                ],
            ]
        ],
        'mn_manager_custom' => [
            'name' => 'Quản lý giao diện',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Tùy chỉnh giao diện',
                    'link' => 'custom/update'
                ],
                'submenu_2' => [
                    'name' => 'Thiết lập menu',
                    'link' => 'menu/update'
                ],
            ]
        ],
        'mn_manager_company' => [
            'name' => 'Quản lý website',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập website',
                    'link' => 'company/update'
                ],
            ]
        ]
    ],
    # tuy chinh giao dien
    'settingTemplate' => [
        'CUSTOM_IMAGE' => [
            'slide' =>[
                'name' => 'Slide',
                'data' => 1,
                'type' => 'list',
                'note' => '',
                'limit' => 0
            ],
            'bottom_slide' =>[
                'name' => '3 banner dưới banner slide',
                'data' => 2,
                'type' => 'list',
                'note' => '',
                'limit' => 3
            ],
            'background_middle_one' =>[
                'name' => 'Background giữa trang chủ',
                'data' => 3,
                'type' => 'list',
                'note' => '',
                'limit' => 1
            ],
        ],
        'CUSTOM_SINGLE_PAGE' => [
            'one_middle_home' =>[
                'name' => 'Trang đơn giữa trang chủ',
                'data' => 1,
                'note' => '',
                'limit' => 1
            ],
        ],
        'CUSTOM_NEWS_CATEGORY' => [
            'home_kien_thuc' =>[
                'name' => 'Kiến thức nâng mũi đẹp',
                'data' => 1,
                'note' => '',
                'limit' => 4
            ],
        ],
    ],

    #menu
    'menuDefault' => [
        [
            'name' => 'Trang chủ',
            'id' => 'mn_home',
            'module' => 'home',
            'link' => 'ourhome',
        ],
        [
            'name' => 'Sản phẩm',
            'id' => 'mn_product',
            'module' => 'product',
            'link' => '/product/config',
        ],
        [
            'name' => 'Tin tức',
            'id' => 'mn_news',
            'module' => 'news',
            'link' => 'news/config'
        ],
    ],

    # setting language
    'settingLanguage' => [
        'home' => 'Trang chủ',
        'phone' => 'Gửi',
    ],
    'listLanguage' => [
        'vi' => [
            'default' => true,
            'icon' => 'images/vn.svg',
            'name' => 'Tiếng việt'
        ],
        'us' => [
            'default' => false,
            'icon' => 'images/uk.svg',
            'name' => 'Tiếng anh'
        ]
    ],

];
