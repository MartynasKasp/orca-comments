<?php

    setlocale(LC_ALL, 'lt_LT.UTF-8');

    include 'config.php';
    include 'utils/mysql.class.php';
    include 'libraries/comments.class.php';

    $commentsObj = new Comment();

    $elementCount = $commentsObj->getCommentsCount();

    $comments = $commentsObj->getCommentsList();

    $formErrors = [];
    $replyFormErrors = [];
    $data = [];
    $required = ['email', 'name'];
    $maxLengths = [
        'email' => 256,
        'name' => 60
    ];

    if(isset($_POST['comment'])) {

        $validations = [
            'email' => 'email',
            'name' => 'alfanum'
        ];

        include 'utils/validator.class.php';
        $validator = new validator($validations, $required, $maxLengths);

        if($validator->validate($_POST)) {

            $dataPrepared = $validator->preparePostFieldsForSQL();
            $dataPrepared['date'] = date("Y-m-d");
            $commentsObj->insertComment($dataPrepared);

            header("Location: index.php");
            die;
        }
        else {

            $formErrors = $validator->getErrorHTML();
            $data = $_POST;
        }
    }

    include 'templates/main.tpl.php';

