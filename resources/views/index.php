<?php

view('blocks.head',[
    'title' => $title ?? ''
]);
foreach($posts ??[] as $post){
    view('blocks.post_preview',[
        'posts' => $post
    ]);
}

view('blocks.footer');