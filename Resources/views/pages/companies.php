<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$types = $company_service->getCompaniesTypes();

$company_id = $id ?? null;

if ($company_id) {
    $company_edit = $company_service->getCompanyById($company_id);
} else {
    $company_edit = null;
}

?>
<main class="md:ml-56 bg-gray-50 flex flex-col px-10">
    <form onsubmit="return submitForm(this, 'company')" action="/admin/add-company" method="post" class="w-full bg-white m-auto p-5 mb-14">
        <h3 class="text-lg font-bold my-6">New Company</h3>
        <hr>
        <div class="mt-12">
            <label for="name" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="name" id="name" required
                   value="<?php echo $company_edit['name'] ?? null ?>"
                   placeholder="Name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="tva" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="tva" id="tva" required
                   value="<?php echo $company_edit['tva'] ?? null ?>"
                   placeholder="TVA"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="country" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="country" id="country" required
                   value="<?php echo $company_edit['country'] ?? null ?>"
                   placeholder="Country"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>

        <div class="mt-12">
            <label for="type_id" class="block text-sm font-medium text-gray-900"></label>
            <select required name="type_id" id="type_id"
                    class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5 ">
                <option value="">---</option>
                <?php foreach ($types as $type): ?>
                    <option <?php if ($company_edit) {
                        echo ($company_edit['type_id'] == $type['id']) ? 'selected' : '';
                    } ?> value="<?php echo $type['id'] ?>"><?php echo ucfirst($type['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-12 w-full">
            <input type="hidden" name="id" value="<?php echo $company_id ?? null ?>">
            <button type="submit" name="submit_button"
                    class="text-white custom-bg hover:bg-blue-800 focus:outline-none focus:ring-blue-300 text-sm w-full px-5 py-2.5 text-left ">
                Save
            </button>
        </div>
    </form>
</main>
<script>
    function submitForm(form, content) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Your ' + content + ' will be saved',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Saved!',
                    'Your ' + content + ' has been saved.',
                    'success'
                );
                form.submit();
            }
        });
        return false;
    }
</script>