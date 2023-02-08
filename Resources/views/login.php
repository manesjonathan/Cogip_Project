<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Cogip Project">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/assets/css/output.css">
    <title>Cogip Login Page</title>
</head>
<body>


<main class="flex flex-col w-full h-screen items-center justify-center bg-gray-50">

    <?php echo $message ?? null ?>

    <form action="/login" method="post" class="w-1/3 m-auto">
        <h1 class="text-3xl font-bold m-auto text-center mb-12">COGIP</h1>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" name="email"
                   class="border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="name@domain.com" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                password</label>
            <input type="password" name="password"
                   class="border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>
        <button type="submit"
                class="custom-bg focus:ring-2 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Submit
        </button>
    </form>


</main>

</body>
</html>