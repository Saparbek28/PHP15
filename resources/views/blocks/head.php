<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title ?? '' ?> | <?=config('app.site.name') ?></title>
</head>
<body>

<div>
    <?php if (\Core\Auth::check()): ?>
    <?= \Core\Auth::getUser()['username']?>
        <a href="/create">Создать запись</a>
        <a href="/logout">Выйти</a>
    <?php else:?>
        <a href="/login">Войти</a>
    <?php endif;?>
</div>
