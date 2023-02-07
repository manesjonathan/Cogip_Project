<aside class="hidden fixed bottom-0 left-0 z-40 w-56 h-screen md:block">
    <div class="h-full px-3 py-4 overflow-y-auto text-black">
        <div class="flex flex-col items-center mb-5">
            <img src="/assets/img/jeff.jpg" class="h-24 mr-3 mb-3 rounded-full" alt="profile"/>
            <h2 class="text-2xl font-bold"><?php echo $name ?? null ?></h2>
        </div>
        <hr>
        <ul class="custom-h flex-1 overflow-y-auto space-y-2 m-4">
            <li>
                <a href="/admin/dashboard"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-solid fa-table-columns w-6 text-gray-500"></i>
                    <p class="ml-3">Dashboard</p>
                </a>
            </li>
            <li>
                <a href="/admin/invoices"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-regular fa-file-lines w-6 text-gray-500"></i>
                    <p class="ml-3">Invoices</p>
                </a>
            </li>
            <li>
                <a href="/admin/companies"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-regular fa-building w-6 text-gray-500"></i>
                    <p class="ml-3">Companies</p>
                </a>
            </li>
            <li>
                <a href="/admin/contacts"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-regular fa-id-badge w-6 text-gray-500"></i>
                    <p class="ml-3">Contacts</p>
                </a>
            </li>
        </ul>
        <hr>
        <div id="bottom" class="flex items-center p-4 bottom-0 flex-1 absolute w-full">
            <div class="w-full">
                <img src="/assets/img/jeff.jpg" class="h-12 mr-3 rounded-full" alt="profile"/>

            </div>
            <a href="/logout" class="font-normal text-base hover:underline mr-3">Logout</a>
        </div>
    </div>
</aside>

<div class="md:hidden flex items-center p-4 bg-gray-50">
    <button class="outline-none mobile-menu-button">
        <svg class=" w-6 h-6 text-gray-500 hover:text-custom-bg "
             fill="none"
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="2"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</div>
<nav class="mobile-menu hidden flex flex-col ">
    <ul class="">
        <li class="active"><a href="/admin/dashboard"
                              class="block text-sm px-2 py-4 text-white custom-bg font-semi-bold">Dashboard</a>
        </li>
        <li><a href="/admin/invoices"
               class="block text-sm px-2 py-4 hover:custom-bg transition duration-300">Invoices</a>
        </li>
        <li><a href="/admin/companies"
               class="block text-sm px-2 py-4 hover:custom-bg transition duration-300">Companies</a>
        </li>
        <li><a href="/admin/contacts"
               class="block text-sm px-2 py-4 hover:custom-bg transition duration-300">Contacts</a>
        </li>
    </ul>
</nav>

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>