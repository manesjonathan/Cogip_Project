<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Cogip Project">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cogip Login Page</title>
</head>
<body>


<main>

    <?php echo $message ?? null ?>

    <form action="/login" method="post">
        <label for="email">Email
            <input type="email" required name="email">
        </label>

        <label for="password">Password
            <input type="password" required name="password">
        </label>

        <button type="submit" class="submit-button">Submit</button>
    </form>
</main>

</body>
</html>