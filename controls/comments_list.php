<?php

include 'libraries/comments.class.php';
$commentsObj = new Comment();

$elementCount = $commentsObj->getCommentsCount();

include 'templates/comments.tpl.php';