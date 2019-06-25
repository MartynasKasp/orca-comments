<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Comments system</title>
    </head>
    <body>
        <div class="container mt-5">

            <div class="row">
                <div class="col-10 col-lg-8 col-offset-1">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email-input">Email address <span class="required-field">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email-input" aria-describedby="email-error" placeholder="example@email.com" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
                                    <?php
                                        if(in_array("email", $formErrors)) {
                                            echo '
                                                <small id="email-error" class="form-text text-muted validation-error">Given email address is invalid.</small>
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
                                                <small id="name-error" class="form-text text-muted validation-error">Given name is too long.</small>
                                            ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text-input">Comment <span class="required-field">*</span></label>
                            <textarea class="form-control" id="text-input" name="text" aria-describedby="text-error" placeholder="Type comment here..." rows="3" required><?php if(isset($data['text'])) echo $data['text']; ?></textarea>
                            <?php
                            if(in_array("text", $formErrors)) {
                                echo '
                                    <small id="text-error" class="form-text text-muted validation-error">Maximum length of comment is 1.000 symbols.</small>
                                ';
                            }
                            ?>
                        </div>
                        <input type="submit" class="btn btn-danger" value="Comment" name="submit">
                    </form>
                </div>
            </div>

            <hr>

            <div class="row">

                <div class="col">

                    <div id="comments-table">

                        <div id="comments-count">
                            <?php echo $elementCount ?> Comments
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>