<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/1ef1bc7d46.js"></script>

        <title>Comments system</title>
    </head>
    <body>
        <div class="container mt-5 mb-5">

            <!-- Input form -->

            <div class="row mb-5 d-flex justify-content-center">
                <div class="col-10 col-lg-8">

                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email-input">Email address <span class="required-field">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email-input" aria-describedby="email-error" placeholder="example@email.com" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
                                    <?php
                                        if(in_array("email", $formErrors)) {
                                            echo '
                                                <small id="email-error" class="form-text validation-error">Given email address is invalid.</small>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name-input">Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name-input" aria-describedby="name-error" placeholder="John Smith" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" required>
                                    <?php
                                    if(in_array("name", $formErrors)) {
                                        echo '
                                                <small id="name-error" class="validation-error form-text text-muted">Given name is too long.</small>
                                            ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text-input">Comment <span class="required-field">*</span></label>
                            <textarea class="form-control" id="text-input" name="text" placeholder="Type comment here..." rows="3" required><?php if(isset($data['text'])) echo $data['text']; ?></textarea>
                            <div id="character-count" class="text-muted">Characters left: 1000</div>
                        </div>
                        <input type="submit" class="btn btn-danger" value="Comment" name="comment">
                    </form>

                </div>
            </div>

            <hr>

            <!-- Comments display block -->

            <div class="row mt-5">
                <div class="col">
                    <div id="comments-wrapper">

                    </div>

                </div>

            </div>

        </div>

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        -->
        <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script type="text/javascript">

            $(document).ready(function() {

                displayAllComments();

                $(document).on("click", "#reply", function() {

                    let email = $("#reply-email-input").val(),
                        name = $("#reply-name-input").val(),
                        text = $("#reply-text-input").val(),
                        parentId = $(this).attr("data-id");

                    $.ajax({
                        url: "ajax_functions.php",
                        type: "post",
                        async: true,
                        data: {
                            "done": 1,
                            "email": email,
                            "name": name,
                            "text": text,
                            "parent_id": parentId
                        },
                        success: function(){
                            hideReplyForm();
                            displayAllComments();
                        }
                    });
                });
            });

            $('textarea').keyup(function() {
                $("#comment-count").text("Characters left: " + ($(this).attr("maxlength") - $(this).val().length));
            });

            function displayAllComments(){

                $.ajax({
                    url: "ajax_functions.php",
                    type: "post",
                    async: true,
                    data: {
                        "display": 1
                    },
                    success: function(data) {
                        $("#comments-wrapper").html(data);
                    }
                });
            }

            function showReplyForm(commentId){

                hideReplyForm();

                let replyFormDiv = document.createElement("div"),
                    //divText = document.createTextNode("Reply form should appear here"),
                    elementId = "comment-block-" + commentId;

                replyFormDiv.setAttribute('id', 'reply-form');
                document.getElementById(elementId).appendChild(replyFormDiv);

                replyFormDiv = document.getElementById('reply-form');

                let divText = `
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="reply-email-input">Email address <span class="required-field">*</span></label>
                                    <input type="email" class="form-control" name="email" id="reply-email-input" aria-describedby="email-error" placeholder="example@email.com" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="reply-name-input">Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control" name="name" id="reply-name-input" aria-describedby="name-error" placeholder="John Smith" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reply-text-input">Comment <span class="required-field">*</span></label>
                            <textarea class="form-control" id="reply-text-input" name="text" placeholder="Type reply to comment here..." rows="3" required></textarea>
                            <div id="character-count" class="text-muted"></small>Characters left: 1000</small></div>
                        </div>
                        <input type="button" class="btn btn-danger" value="Reply" id="reply" data-id="${commentId}"></input>

                    </form>
                    `;

                replyFormDiv.insertAdjacentHTML('beforeend', divText);
            }

            function hideReplyForm() {

                //<input type="submit" class="btn btn-danger" value="Reply" id="reply" data-id="${commentId}">

                let searchForOpen = document.getElementById('reply-form');
                if(searchForOpen) {
                    searchForOpen.parentNode.removeChild(searchForOpen);
                }
            }
        </script>
    </body>
</html>