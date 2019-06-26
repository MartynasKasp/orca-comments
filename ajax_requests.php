<?php

    include 'config.php';
    include 'utils/mysql.class.php';

    include 'libraries/comments.class.php';

    $commentsObj = new Comment();

    if(isset($_POST['comment'])) {

        $email = mysql::escape($_POST['email']);
        $name = mysql::escape($_POST['name']);
        $text = mysql::escape($_POST['text']);

        if(isset($_POST['parent_id'])) {
            $commentsObj->insertChildComment(
                $email, $name, $text, $_POST['parent_id']
            );
        } else {
            $commentsObj->insertComment(
                $email, $name, $text
            );
        }
    }

    if(isset($_POST['display'])) {

        $elementCount = $commentsObj->getCommentsCount();

        $comments = $commentsObj->getCommentsList();

        echo '
            <div class="comments-count">
                <h2>'. $elementCount .' Comments</h2>
            </div>';

            foreach($comments as $key => $val) {

                echo '
                    <div id="comment-block-'. $val['id'] .'" data-id="'. $val['id'] .'">
                        <div class="comment-parent">
                            <span class="comment-name">'. $val['name'] .'</span> &nbsp; <small><span class="comment-date">'. $val['date'] .'</span></small>
                            <span class="comment-reply"><a href="javascript:showReplyForm('. $val['id'] .')"><i class="fas fa-reply"></i> Reply</a></span>
                            <p class="comment-text">'. $val['text'] .'</p>
                        </div>   
                    </div>
                ';

                $childComments = $commentsObj->getChildComments($val['id']);

                foreach ($childComments as $key2 => $val2) {

                    echo '
                        <div id="comment-'. $val2['id'] .'" class="comment-child">
                            <span class="comment-name">'. $val2['name'] .'</span> &nbsp; <small><span class="comment-date">'. $val2['date'] .'</span></small>
                            <p class="comment-text">'. $val2['text'] .'</p>
                        </div>
                    ';
                }
            }

    }