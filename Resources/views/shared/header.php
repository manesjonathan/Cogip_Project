<header class=" sm:ml-56 bg-gray-50">
    <div class="container grid grid-row-4 grid-col-4 gap-0 p-10">
        <div class="col-start-1 col-end-4 row-start-1">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                    <p class="">dashboard/</p>
            </div>
        </div>

        <div class="custom-bg rounded-lg p-12 row-start-2 row-end-3 col-start-1 col-end-4 mt-14">
            <div class="px-6 py-6 bg-custom-bg text-white col-start-1 col-end-2">
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold">Welcome back <?php echo $name ?? null ?>!</h2>
                    <p class="w-1/3">You can here add an invoice, a company and some contacts</p>
                </div>
            </div>
        </div>
        <div class="col-start-3 col-end-4 row-start-1 row-end-3">
            <div class="">
                <img src="/assets/img/hero.svg" alt="hero" class="w-72 h-72">
            </div>
        </div>
    </div>
</header>
