<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$companies = $company_service->getLastFiveCompanies();
$contacts = array_slice($company_service->getAllContacts(false), 0, 5); //todo
$invoices = $company_service->getLastFiveInvoices();
usort($invoices, function ($a, $b) {
    return $b['created_at'] <=> $a['created_at'];
});

?>

<main class="px-5 md:ml-56 bg-gray-50 md:grid md:grid-cols-2 flex flex-col">

    <div class="my-2 flex flex-col col-start-1 col-end-1 px-5  mb-14">
        <section class="bg-white rounded-lg my-4 items-center p-4">
            <h3 class="text-lg font-bold mb-2">Statistics</h3>

            <ul class="flex text-sm text-white justify-center">
                <li class="items-center justify-center p-2 ">
                    <div class="h-20 w-20 rounded-full bg-blue-800 flex flex-col items-center justify-center text-center">
                        <p class="m-0"><?php echo count($company_service->getAllInvoices(false)) ?></p>
                        <p class="m-0">Invoices</p>
                    </div>
                </li>
                <li class="items-center justify-center p-2 ">
                    <div class="h-20 w-20 rounded-full bg-blue-200 flex flex-col items-center justify-center text-center">
                        <p class="m-0"><?php echo count($company_service->getAllContacts(false)) ?></p>
                        <p class="m-0">Contacts</p>
                    </div>
                </li>
                <li class="items-center justify-center p-2 ">
                    <div class="h-20 w-20 rounded-full bg-red-200 flex flex-col items-center justify-center text-center">
                        <p class="m-0"><?php echo count($company_service->getAllCompanies(false)) ?></p>
                        <p class="m-0">Companies</p>
                    </div>
                </li>
            </ul>
        </section>

        <section class="bg-white p-4 rounded-lg my-4">
            <div class="flex flex-col  overflow-x-auto">
                <h3 class="text-lg font-bold mb-2">Last Contacts</h3>
                <hr>
                <table class="table-auto w-full text-left">
                    <thead class="">
                    <tr>
                        <th class="px-4 py-4">Name</th>
                        <th class="px-4 py-4">Phone</th>
                        <th class="px-4 py-4">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr class="">
                            <td class="px-4 py-4 text-sm"><?php echo $contact['name']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $contact['phone']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $contact['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div class="my-2 flex flex-col col-start-2 col-end-2 px-5 mb-14">
        <section class="bg-white p-4 rounded-lg my-4 ">
            <div class="flex flex-col  overflow-x-auto">
                <h3 class="text-lg font-bold mb-2">Last Invoices</h3>
                <hr>
                <table class="table-auto w-full text-left">
                    <thead class="">
                    <tr>
                        <th class="px-4 py-4">Invoice Number</th>
                        <th class="px-4 py-4">Date</th>
                        <th class="px-4 py-4">Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr class="">
                            <td class="px-4 py-4 text-sm"><?php echo $invoice['ref']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $invoice['created_at']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $company_service->getCompanyById($invoice['id_company'])['name']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="bg-white p-4 rounded-lg my-4">
            <div class="flex flex-col  overflow-x-auto">
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
                            <td class="px-4 py-4 text-sm"><?php echo $company['name']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $company['tva']; ?></td>
                            <td class="px-4 py-4 text-sm"><?php echo $company['country']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>