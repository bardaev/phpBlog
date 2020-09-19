<?php

return [
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticleController::class, 'edit'],
    '~^articles/(.*)$~' => [\MyProject\Controllers\ArticleController::class, 'view'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main']
];