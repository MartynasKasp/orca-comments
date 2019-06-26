<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>

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
                                    <input type="email" class="form-control" name="email" id="email-input" aria-describedby="email-error" placeholder="example@email.com">
                                    <small id="email-error" class="form-text validation-error"></small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name-input">Name <span class="required-field">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name-input" aria-describedby="name-error" placeholder="Enter a name">
                                    <small id="name-error" class="validation-error form-text"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text-input">Comment <span class="required-field">*</span></label>
                            <textarea class="form-control" id="text-input" name="text" placeholder="Type comment here..." rows="3" maxlength="1000"></textarea>
                            <small id="text-error" class="validation-error form-text float-left"></small>
                            <span id="character-count" class="text-muted comment-length">Characters left: 1000</span>
                        </div>
                        <br><input type="button" class="btn btn-danger" value="Comment" id="comment"><br>
                    </form>

                </div>
            </div>

            <hr>

            <!-- Comments display block -->

            <div class="row mt-5">
                <div class="col">
                    <div id="comments-wrapper"></div>
                </div>

            </div>

        </div>

        <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script type="text/javascript" src="scripts/main.js"></script>
    </body>
</html>