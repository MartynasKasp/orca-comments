<?php

    include 'config.php';
    include 'utils/mysql.class.php';

    include 'libraries/comments.class.php';

    $commentsObj = new Comment();

    if(isset($_POST['done'])) {

        $email = mysql::escape($_POST['email']);
        $name = mysql::escape($_POST['name']);
        $text = mysql::escape($_POST['text']);
        $parentId = $_POST['parent_id'];

        $commentsObj->insertChildComment(
            $email, $name, $text, $parentId
        );
    }