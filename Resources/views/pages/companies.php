<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$types = $company_service->getCompaniesTypes();


?>
<main class="md:ml-56 bg-gray-50 flex flex-col px-10">
    <form action="/admin/add-company" method="post" class="w-full bg-white m-auto p-5 mb-14">
        <h3 class="text-lg font-bold my-6">New Company</h3>
        <hr>
        <div class="mt-12">
            <label for="name" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="name" id="name" required
                   placeholder="Name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="tva" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="tva" id="tva" required
                   placeholder="TVA"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="country" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="country" id="country" required
                   placeholder="Country"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>

        <div class="mt-12">
            <label for="type_id" class="block text-sm font-medium text-gray-900"></label>
            <select name="type_id" id="type_id"
                    class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5 ">
                <?php foreach ($types as $type): ?>
                    <option value="<?php echo $type['id'] ?>"><?php echo ucfirst($type['name']) ?></option>
                <?php endforeach; ?>
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