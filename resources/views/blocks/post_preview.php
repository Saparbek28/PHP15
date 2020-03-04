<div>
    <h2><?= $posts['title']?? '' ?></h2>
    <div>
        <?=
        mb_strimwidth($posts['content'], 0, 100, "...");

        ?>
    </div>

    <a href="/post?id=<?=$posts['id']?>"> Подробнее... </a>

</div>