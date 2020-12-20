<?php

return [
    'index' => [
        'name' => '首页',
        'icon' => 'ftsucai-82',
        'index' => 'admin/home',
        'id' => '1'
    ],
    'store' => [
        'name' => '店铺管理',
        'icon' => 'ftsucai-82',
        'index' => 'admin/home',
        'id' => '1'
    ],
    'store1' => [
        'name' => '设计元素',
        'icon' => 'ftsucai-UI',
        'index' => 'admin/design',
        'id' => '2',
        'submenu' => [
            [
                'name' => '按钮',
                'index' => 'admin/button',
                'id' => '21',
            ],
            [
                'name' => '卡片',
                'index' => 'admin/card',
                'id' => '22'
            ],
            [
                'name' => '格栅',
                'index' => 'admin/boot',
                'id' => '23'
            ],
        ]
    ],
    'pet' => [
        'name' => '宠物属性',
        'icon' => 'ftsucai-UI',
        'index' => 'admin/pet',
        'id' => '3',
        'submenu' => [
            [
                'name' => '分类管理',
                'index' => 'admin/pet.cate/index',
                'id' => '31',
            ],
            [
                'name' => '图片上传',
                'index' => 'admin/upload',
                'id' => '32'
            ],
            [
                'name' => '格栅',
                'index' => 'admin/boot',
                'id' => '33'
            ],
        ]
    ],

];
