<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Error 404</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <section class="container  my-5" style="min-height: 100svh;">
            <div class="border d-flex flex-column rounded px-auto justify-content-center align-items-center">
                <h1>Error 404</h1>
                <p>
                    <?php echo $_GET['error_message'] ?? "There's seem to be a problem with your request";?>
                </p>
            </div>
        </section>
    </body>
</html>