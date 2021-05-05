<?php
    return [
        'games.index' => "juegos",
        'games.show' => "juegos/{game}",
        'games.categoryFilter' => '/juegos/categoria/{name}',
        'games.filter' => 'filtro',
        'games.admin.list' => 'administrar/juegos',
        'games.admin.create' => 'administrar/juegos/crear',
        'games.admin.edit' => 'administrar/juegos/{game}/editar',

        'categories' => 'categorias',
        'categories.admin.list' => 'administrar/categorias',
        'categories.admin.create' => 'administrar/categorias/crear',
        'categories.admin.edit' => 'administrar/categorias/{category}/editar',

        'plataforms' => 'plataformas',
        'plataforms.admin.list' => 'administrar/plataformas',
        'plataforms.admin.create' => 'administrar/plataformas/crear',
        'plataforms.admin.edit' => 'administrar/plataformas/{plataforma}/editar',

        'payments.index' => 'pago/{gameId}/{userId}',
        'payments.store' => 'pago/{paymentId}/{gameId}/{userId}'
    ];
