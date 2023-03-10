<header class="md:ml-56 bg-gray-50 flex flex-col">
    <div class="container grid grid-row-4 grid-col-4 gap-0 p-10">
        <div class="col-start-1 col-end-4 row-start-1">
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold"><?php echo ucfirst($view ?? null) ?></h1>
                <p class="">dashboard/<?php echo ucfirst($view ?? null) ?></p>
            </div>
        </div>

        <div class="custom-bg rounded-lg p-8 row-start-2 row-end-3 col-start-1 col-end-4 mt-14 w-full">
            <div class="px-6 py-6 bg-custom-bg text-white col-start-1 col-end-2 ">
                <div class="flex flex-col">
                    <h2 class="text-3xl font-bold">Welcome back <?php echo $name ?? null ?>!</h2>
                    <p class=" md:w-2/3">You can here add an invoice, a company and some contacts</p>
                </div>
            </div>
        </div>
        <div class="col-start-3 col-end-4 row-start-1 row-end-3 hidden lg:flex  ">
                <img src="/public/assets/img/hero.svg" alt="hero" class="w-72 h-72 ">
        </div>
    </div>
</header>
