<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Comments system</title>
    </head>
    <body>
        <div class="container mt-5">

            <form>
                <div class="form-group">
                    <label for="emailInput">Email address <span class="requiredField">*</span></label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailError" placeholder="example@email.com">
                </div>
                <div class="form-group">
                    <label for="nameInput">Name <span class="requiredField">*</span></label>
                    <input type="text" class="form-control" id="nameInput" aria-describedby="nameError" placeholder="John Smith">
                </div>
                <div class="form-group">
                    <label for="textInput">Comment <span class="requiredField">*</span></label>
                    <textarea class="form-control" id="nameInput" aria-describedby="nameError" placeholder="Type comment here..." rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>

            <hr>

            <div class="row">

                <div class="col">

                    <div id="commentsTable">

                        <?php

                            include 'controls/comments_list.php';

                        ?>

                    </div>

                </div>

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>