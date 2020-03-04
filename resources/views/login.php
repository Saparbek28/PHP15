<?php view('blocks.head',[
    'title' => $login ?? ''
])?>

<h1><?=$title ?? ' '?></h1>
<form action="/login" method="post">

    <div>
        <input type="text"
               name="username"
               paceholder="username"
               value="<?=$username ?? ''?>">
    </div>

    <div>
        <input type="password"
               name="password"
               placeholder="Password">
    </div>
    <button type="submit">Sig in</button>

</form>

<?php ?>
