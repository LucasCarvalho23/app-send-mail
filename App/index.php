<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>App Mail Send</title>
</head>
<body>
    
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">

                <h2 class = "display-5 mt-5 text-primary">App Send Email</h2>

                <form action="send-mail.php" method="post">
                    <div class = "mt-5">

                        <label for="sendto-id">To</label>
                        <input class="form-control"  type="text" name ="sendto" id="sendto-id">

                        <label for="subject-id" class = "mt-3">Subject</label>
                        <input class="form-control"  type="text" name ="subject" id="subject-id">

                        <label for="messege-id" class = "mt-3">Messege</label>
                        <textarea class="form-control" rows="5" type="text" name ="messege" id="messege-id"></textarea>

                        <button type="submit" class = "mt-5 btn btn-primary">Send</button>

                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>