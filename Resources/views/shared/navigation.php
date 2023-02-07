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

<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 md:hidden">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                       aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
