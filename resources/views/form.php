<?php view('blocks.head',[
    'title'=> $title ?? ''
]); ?>

<form action="/<?=$action ?? 'create'?>" method="post">

    <?php if($post['id'] ?? false):?>
        <input type="hidden" name="id" value="<?=$post['id']?>"/>
    <?php endif; ?>


    <div>
        <input type="text" name="title" placeholder="Ведите заголовок..." value="<?=$post['title'] ?? ''?>">
    </div>
    <div>
        <textarea name="content" placeholder="Ведите текст..."><?=$post['content'] ?? ''?></textarea>
    </div>
    <button type="submit">Download</button>
</form>
<?php view('blocks.footer') ?>
