<aside class="fixed bottom-0 left-0 z-40 w-56 h-screen">
    <div class="h-full px-3 py-4 overflow-y-auto text-black">
        <div class="flex flex-col items-center mb-5">
            <img src="/assets/img/jeff.jpg" class="h-24 mr-3 mb-3 rounded-full" alt="profile"/>
            <h2 class="text-2xl font-bold"><?php echo $name ?? null ?></h2>
        </div>
        <hr>
        <ul class="custom-h flex-1 overflow-y-auto space-y-2 m-4">
            <li>
                <a href="#"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-solid fa-table-columns w-6 text-gray-500"></i>
                    <p class="ml-3">Dashboard</p>
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-regular fa-file-lines w-6 text-gray-500"></i>
                    <p class="ml-3">Invoices</p>
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex p-2 px-6 text-base font-normal rounded-lg hover:bg-gray-100 hover:font-bold items-center">
                    <i class="fa-regular fa-building w-6 text-gray-500"></i>
                    <p class="ml-3">Companies</p>
                </a>
            </li>
            <li>
                <a href="#"
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
            <a href="#" class="font-normal text-base hover:underline mr-3">Logout</a>
        </div>
    </div>
</aside>
