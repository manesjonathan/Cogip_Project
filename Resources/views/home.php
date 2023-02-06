<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$companies = $company_service->getLastFiveCompanies();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/output.css">
    <script src="https://kit.fontawesome.com/26838d0dd7.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="">
<?php include(__ROOT__ . '/Resources/views/shared/navigation.php'); ?>
<?php include(__ROOT__ . '/Resources/views/shared/header.php'); ?>

<main class="p-10 sm:ml-56 bg-gray-50 grid grid-col-2">

    <section class="m-4 col-start-1 col-end-1 bg-white p-4 rounded-lg">
        <div class="flex flex-col ">
            <h3 class="text-lg font-bold mb-2">Last Companies</h3>
            <hr>
            <table class="table-auto w-full text-left">
                <thead class="">
                <tr>
                    <th class="px-4 py-4">Name</th>
                    <th class="px-4 py-4">TVA</th>
                    <th class="px-4 py-4">Country</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($companies as $company): ?>
                    <tr class="">
                        <td class="px-4 py-4"><?php echo $company['name']; ?></td>
                        <td class="px-4 py-4"><?php echo $company['tva']; ?></td>
                        <td class="px-4 py-4"><?php echo $company['country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>


    <section class="m-4 col-start-2 col-end-2 bg-white p-4 rounded-lg">
        <div class="flex flex-col ">
            <h3 class="text-lg font-bold mb-2">Last Companies</h3>
            <hr>
            <table class="table-auto w-full text-left">
                <thead class="">
                <tr>
                    <th class="px-4 py-4">Name</th>
                    <th class="px-4 py-4">TVA</th>
                    <th class="px-4 py-4">Country</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($companies as $company): ?>
                    <tr class="">
                        <td class="px-4 py-4"><?php echo $company['name']; ?></td>
                        <td class="px-4 py-4"><?php echo $company['tva']; ?></td>
                        <td class="px-4 py-4"><?php echo $company['country']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>