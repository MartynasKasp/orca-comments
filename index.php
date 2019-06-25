<?php

    setlocale(LC_ALL, 'lt_LT.UTF-8');

    include 'config.php';
    include 'utils/mysql.class.php';
    include 'libraries/comments.class.php';

    $commentsObj = new Comment();

    $elementCount = $commentsObj->getCommentsCount();

    $comments = $commentsObj->getCommentsList();

    $formErrors = [];
    $data = [];
    $required = ['email', 'name', 'text'];
    $maxLengths = [
        'email' => 256,
        'name' => 60,
        'text' => 1000
    ];

    if(isset($_POST['submit'])) {

        $validations = [
            'email' => 'email',
            'name' => 'alfanum',
            'text' => 'alfanum'
        ];

        include 'utils/validator.class.php';
        $validator = new validator($validations, $required, $maxLengths);

        if($validator->validate($_POST)) {

            $dataPrepared = $validator->preparePostFieldsForSQL();
            $dataPrepared['date'] = date("Y-m-d");
            $dataPrepared['level'] = 1;
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

