<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$companies = $company_service->getLastFiveCompanies();
$contacts = $company_service->getAllContacts(); //todo
$invoices = $company_service->getLastFiveInvoicesByCompany(1); //todo

?>

<main class="md:ml-56 bg-gray-50 flex flex-col p-10">
    <form action="" class="w-full bg-white m-auto p-5">
        <h3 class="text-lg font-bold my-6">New Invoice</h3>
        <hr>
        <div class="mt-12">
            <label for="reference" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="reference" id="reference"
                   placeholder="Reference"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="price" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="price" id="price"
                   placeholder="Price"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>

        <div class="mt-12">
            <label for="company" class="block text-sm font-medium text-gray-900"></label>
            <select name="company" id="company"
                    class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5 ">
                <option>Cogip</option>

            </select>
        </div>

        <div class="mt-12 w-full">
            <button type="submit" name="submit_button"
                    class="text-white custom-bg hover:bg-blue-800 focus:outline-none focus:ring-blue-300 text-sm w-full px-5 py-2.5 text-left ">
                Save
            </button>
        </div>

    </form>

</main>