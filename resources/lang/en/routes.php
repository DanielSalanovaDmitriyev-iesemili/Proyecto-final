<?php
    return [
        'games.index' => "games",
        'games.show' => "games/{game}",
        'games.categoryFilter' => 'games/category/{name}',
        'games.filter' => 'filter',
        'games.admin.list' => 'admin/games',
        'games.admin.create' => 'admin/games/create',
        'games.admin.edit' => 'admin/games/{game}/edit',

        'categories' => 'categories',
        'categories.admin.list' => 'admin/categories',
        'categories.admin.create' => 'admin/categories/create',
        'categories.admin.edit' => 'admin/categories/{category}/edit',

        'plataforms' => 'plataforms',
        'plataforms.admin.list' => 'admin/plataforms',
        'plataforms.admin.create' => 'admin/plataforms/create',
        'plataforms.admin.edit' => 'admin/plataforms/{plataform}/edit',

        'payments.index' => 'payment/{game}/{user}',
        'payments.store' => 'payment/{game}/{user}/store',

        'chat.list' => 'chat/list',
        'chat.index' => 'chat/{user}',

        'mail.index' => 'contact',
        'mail.store' => 'contact/store',

    ];
