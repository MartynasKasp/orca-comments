$(document).ready(function() {

    displayAllComments();

    $(document).on("click", "#reply", function() {

        let email = $("#reply-email-input").val(),
            name = $("#reply-name-input").val(),
            text = $("#reply-text-input").val(),
            parentId = $(this).attr("data-id"),
            validationError = false;

        if(!email) {
            $("#reply-email-error").html("This field cannot be empty!");
            validationError = true;
        }
        else if(!isEmail(email)) {
            $("#reply-email-error").html("Please enter a valid email address.");
            validationError = true;
        }
        else {
            $("#reply-email-error").html("");
        }

        if(!name) {
            $("#reply-name-error").html("This field cannot be empty!");
            validationError = true;
        }
        else if(name.length > 60) {
            $("#reply-name-error").html("Maximum number of characters is 60.");
            validationError = true;
        }
        else {
            $("#reply-name-error").html("");
        }

        if(!text) {
            $("#reply-text-error").html("You must write a message!");
            validationError = true;
        }
        else {
            $("#reply-text-error").html("");
        }

        if(!validationError) {

            $("#reply-email-error").html("");
            $("#reply-name-error").html("");
            $("#reply-text-error").html("");

            $.ajax({
                url: "ajax_requests.php",
                type: "post",
                async: true,
                data: {
                    "comment": 1,
                    "email": email,
                    "name": name,
                    "text": text,
                    "parent_id": parentId
                },
                success: function () {
                    hideReplyForm();
                    displayAllComments();
                }
            });
        }
    });

    $("#comment").click(function() {

        let email = $("#email-input").val(),
            name = $("#name-input").val(),
            text = $("#text-input").val(),
            validationError = false;

        if(!email) {
            $("#email-error").html("This field cannot be empty!");
            validationError = true;
        }
        else if(!isEmail(email)) {
            $("#email-error").html("Please enter a valid email address.");
            validationError = true;
        }
        else {
            $("#email-error").html("");
        }

        if(!name) {
            $("#name-error").html("This field cannot be empty!");
            validationError = true;
        }
        else if(name.length > 60) {
            $("#name-error").html("Maximum number of characters is 60.");
            validationError = true;
        }
        else {
            $("#name-error").html("");
        }

        if(!text) {
            $("#text-error").html("You must write a message!");
            validationError = true;
        }

        if(!validationError) {

            $("#email-error").html("");
            $("#name-error").html("");
            $("#text-error").html("");

            $.ajax({
                url: "ajax_requests.php",
                type: "post",
                async: true,
                data: {
                    "comment": 1,
                    "email": email,
                    "name": name,
                    "text": text
                },
                success: function () {
                    displayAllComments();
                    $("#email-input").val('');
                    $("#name-input").val('');
                    $("#text-input").val('');
                }
            });
        }
    });

    $(document).on("keyup", "#text-input", function() {
        $("#character-count").text("Characters left: " + ($(this).attr("maxlength") - $(this).val().length));
    });

    $(document).on("keyup", "#reply-text-input", function() {
        $("#reply-character-count").text("Characters left: " + ($(this).attr("maxlength") - $(this).val().length));
    });
});

function displayAllComments(){

    $.ajax({
        url: "ajax_requests.php",
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
                                    <input type="email" class="form-control" name="email" id="reply-email-input" aria-describedby="email-error" placeholder="example@email.com">
                                    <small id="reply-email-error" class="form-text validation-error"></small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="reply-name-input">Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control" name="name" id="reply-name-input" aria-describedby="name-error" placeholder="John Smith">
                                    <small id="reply-name-error" class="validation-error form-text"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reply-text-input">Comment <span class="required-field">*</span></label>
                            <textarea class="form-control" id="reply-text-input" name="text" placeholder="Type reply to comment here..." rows="3" maxlength="1000"></textarea>
                            <small id="reply-text-error" class="validation-error form-text float-left"></small>
                            <span id="reply-character-count" class="text-muted comment-length">Characters left: 1000</span>
                        </div>
                        <br><input type="button" class="btn btn-danger" value="Reply" id="reply" data-id="${commentId}">

                    </form>
                    `;

    replyFormDiv.insertAdjacentHTML('beforeend', divText);
}

function hideReplyForm() {

    let searchForOpen = document.getElementById('reply-form');
    if(searchForOpen) {
        searchForOpen.parentNode.removeChild(searchForOpen);
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}