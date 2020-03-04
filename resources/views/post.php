<?php view('blocks.head',[
    'title'=> $post['title'] ?? ''
]);
?>

<h1><?= $post['title'] ?? ''?></h1>
<p><?= $post['content'] ?? ''?></p>
<p style="color:gray">
    <small><?= $post['created_at'] ?? ''?></small>
    <?php if (\Core\Auth::check()):?>
    <a href="/update?id=<?=$post['id'] ?? 0?>">Change</a>
    <a href="/delete?id=<?=$post['id'] ?? 0?>">Delete</a>
    <?php endif?>
</p>


<?php view('blocks.footer') ?>
