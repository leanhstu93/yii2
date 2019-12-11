<?php
use frontend\models\ConfigPage;


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
                ],
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
            'name' => 'Quản lý banner',
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
        'mn_manager_order' => [
            'name' => 'Quản lý đơn hàng',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Danh sách',
                    'link' => 'bill/index'
                ],
            ]
        ],
        'mn_manager_gallery_image' => [
            'name' => 'Quản lý thư viện hình ảnh',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Thiết lập thư viện hình ảnh',
                    'link' => 'gallery-image/config'
                ],
                'submenu_2' => [
                    'name' => 'Danh sách',
                    'link' => 'gallery-image/index'
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
        ],
        'mn_manager_language' => [
            'name' => 'Quản lý ngôn ngữ',
            'link' => 'javascript:void(0)',
            'icon' => '<i class="site-menu-icon wb-layout" aria-hidden="true"></i>',
            'submenu' => [
                'submenu_1' => [
                    'name' => 'Tùy chĩnh ngôn ngữ',
                    'link' => 'custom/custom-language'
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
            'list_banner_service' =>[
                'name' => 'Danh sách banner dịch vụ',
                'data' => 9,
                'type' => 'list',
                'note' => '',
                'limit' => 6
            ],
            'one_banner_top_service' =>[
                'name' => 'Banner top dịch vụ',
                'data' => 11,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ],
            'one_banner_logo_footer' =>[
                'name' => 'Logo footer',
                'data' => 10,
                'type' => 'one',
                'note' => '',
                'limit' => 1
            ],
            'background_middle_one' =>[
                'name' => 'Background giữa trang chủ',
                'data' => 3,
                'type' => 'list',
                'note' => '',
                'limit' => 1
            ],
            'list_customer' =>[
                'name' => 'Danh sách cảm nhận khách hàng',
                'data' => 4,
                'type' => 'list',
                'note' => '',
                'limit' => 0
            ],
            'one_before_footer' =>[
                'name' => 'Hình ảnh nằm trên footer',
                'data' => 5,
                'type' => 'list',
                'note' => '',
                'limit' => 1
            ],
            'list_image_project_footer' =>[
                'name' => 'Danh sách hình ảnh dự án footer',
                'data' => 6,
                'type' => 'list',
                'note' => '',
                'limit' => 8
            ],
            'one_page_title' =>[
                'name' => 'Hình ảnh đầu trang con',
                'data' => 6,
                'type' => 'list',
                'note' => '',
                'limit' => 1
            ],
            'list_instagram_feed' =>[
                'name' => 'Hình ảnh Instagram Feed',
                'data' => 7,
                'type' => 'list',
                'note' => '',
                'limit' => 6
            ],
            'list_banner_single_page_left' =>[
                'name' => 'Danh sách banner trái trang đơn',
                'data' => 8,
                'type' => 'list',
                'note' => '',
                'limit' => 2
            ],
        ],
        'CUSTOM_SINGLE_PAGE' => [
            'one_middle_home' =>[
                'name' => 'Trang đơn giữa trang chủ',
                'data' => 1,
                'note' => '',
                'limit' => 1
            ],
            'tree_middle_home' =>[
                'name' => '3 trang đơn giữa trang chủ',
                'data' => 2,
                'note' => '',
                'limit' => 3
            ],
            'footer_list_col_link_1' =>[
                'name' => 'Danh sách trang đơn footer cột liên kết 1',
                'data' => 3,
                'note' => '',
                'limit' => 5
            ],
            'footer_list_col_link_2' =>[
                'name' => 'Danh sách trang đơn footer cột liên kết 2',
                'data' => 4,
                'note' => '',
                'limit' => 5
            ],
            'one_page_about' =>[
                'name' => 'Trang giới thiệu',
                'data' => 1,
                'note' => '',
                'limit' => 1
            ],
        ],
        'CUSTOM_NEWS_CATEGORY' => [
            'home_news' =>[
                'name' => 'Danh sách tin tức trang chủ',
                'data' => 1,
                'note' => '',
                'limit' => 3
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
            'type' => ConfigPage::TYPE_HOME,
        ],
        [
            'name' => 'Sản phẩm',
            'id' => 'mn_product',
            'module' => 'product',
            'link' => '/product/config',
            'type' => ConfigPage::TYPE_PRODUCT
        ],
        [
            'name' => 'Tin tức',
            'id' => 'mn_news',
            'module' => 'news',
            'link' => 'news/config',
            'type' => ConfigPage::TYPE_NEWS
        ],
        [
            'name' => 'Liên hệ',
            'id' => 'mn_contact',
            'module' => 'contact',
            'link' => 'javascrip:;',
            'type' => ConfigPage::TYPE_CONTACT
        ],
        [
            'name' => 'Thư viện hình ảnh',
            'id' => 'mn_gallery-image',
            'module' => 'gallery-image',
            'link' => 'gallery-image/config',
            'type' => ConfigPage::TYPE_GALLERY_IMAGE
        ],
    ],

    # setting language
    'settingLanguage' => [
        'home' => 'Trang chủ',
        'phone' => 'Gửi',
        'newsletter_subscription' => 'Đăng ký nhận bản tin',
        'enter_email' => 'Nhập địa chỉ email',
        'add_to_cart' => 'Thêm vào giỏ hàng',
        'cart' => 'Giỏ hàng',
        'contact' => 'Liên hệ',
        'news' => 'Tin tức',
        'latest' => 'Mới nhất',
        'see_more_projects' => 'Xem thêm dự án',
        'all' => 'Tất cả',
        'creation' => 'Sáng tạo',
        'professional_design' => 'Thiết kế chuyên nghiệp',
        'extend_1' => 'Các chi nhánh hoat động của Hdesign',
        'extend_2' => 'Mở rộng 2',
        'extend_3' => 'Mở rộng 3',
        'extend_4' => 'Mở rộng 4',
        'extend_5' => 'Mở rộng 5',
        'extend_6' => 'Mở rộng 6',
        'extend_7' => 'Mở rộng 7',
        'extend_8' => 'Mở rộng 8',

    ],
    'listLanguage' => [
        'vi' => [
            'default' => true,
            'icon' => 'images/vn.svg',
            'name' => 'VN',
        ],
        'en' => [
            'default' => false,
            'icon' => 'images/uk.svg',
            'name' => 'EN'
        ]
    ],

];
