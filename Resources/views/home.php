<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/assets/css/output.css">
    <title>Document</title>
</head>
<body class="flex w-full">

<main class="flex flex-col p-4 w-full">
    <section class="flex flex-col w-full">
        <article class="flex w-full">
            <h2>Dashboard</h2>
            <img class="w-2/4 h-14 absolute top-0 right-0 z-10" src="public/assets/img/hero.webp" alt="dashboard">
        </article>


        <article class="flex flex-col custom-bg rounded p-10 text-white relative">
            <h2 class="text-3xl">Welcome back <?php echo $name ?? null ?>!</h2>
            <p>You can here add an invoice, a company and some contacts</p>
        </article>
    </section>

    <section>
        <?php

        use App\Services\CompanyService;

        $company_service = new CompanyService();
        $data = $company_service->getData();
        ?>
    </section>

</main>

</body>
</html>