<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$companies = $company_service->getAllCompanies(false);
usort($companies, function ($a, $b) {
    return $a['name'] <=> $b['name'];
});

$invoice_id = $id ?? null;

if ($invoice_id) {
    $invoice_edit = $company_service->getInvoiceById($invoice_id);
} else {
    $invoice_edit = null;
}

?>

<main class="md:ml-56 bg-gray-50 flex flex-col px-10">
    <form onsubmit="return submitForm(this, 'invoice')" action="/admin/add-invoice" method="post"
          class="w-full bg-white m-auto p-5 mb-14">
        <h3 class="text-lg font-bold my-6">New Invoice</h3>
        <hr>
        <div class="mt-12">
            <label for="ref" class="block text-sm font-medium gray-900"></label>
            <input type="text" name="ref" id="ref" required
                   value="<?php echo $invoice_edit['ref'] ?? null ?>"
                   placeholder="Reference"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mt-12">
            <label for="price" class="block text-sm font-medium gray-900"></label>
            <input type="number" name="price" id="price" required min="0" step=".01"
                   value="<?php echo $invoice_edit['price'] ?? null ?>"
                   placeholder="Price"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>

        <div class="mt-12">
            <label for="company_id" class="block text-sm font-medium text-gray-900"></label>
            <select required name="company_id" id="company_id"
                    class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5 ">
                <option value="">---</option>
                <?php foreach ($companies as $company): ?>
                    <option <?php if ($invoice_edit) {
                        echo ($invoice_edit['id_company'] == $company['id']) ? 'selected' : '';
                    } ?>
                            value="<?php echo $company['id'] ?>"><?php echo ucfirst($company['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-12 w-full">
            <input type="hidden" name="id" value="<?php echo $invoice_id ?? null ?>">
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