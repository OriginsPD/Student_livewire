<div x-data="{ isOpen: false }">

    <nav class="bg-white shadow dark:bg-gray-800 border-b border-gray-500">

        <div class="container px-6 py-3 mx-auto">

            <div class="flex flex-col md:flex-row md:justify-between md:items-center">

                <div class="flex items-center justify-between">

                    <div class="flex items-center">

                        <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300" href="#">Student Info</a>

                    </div>


                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="items-center md:flex">

                    <div class="flex items-center py-2 -mx-1 md:mx-0">

                        <a @click="isOpen = !isOpen"
                            class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white
                                transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600
                                md:mx-2 md:w-auto"
                           href="#">Login</a>

                    </div>


                </div>

            </div>

        </div>

    </nav>

    <div x-show="isOpen"

        class="fixed h-screen w-screen top-0 bottom-0 bg-black bg-opacity-75">

       <div x-show="isOpen" x-transition.duration.300ms.origin.top
            @click.away="isOpen = false"
           class="flex items-center p-3 justify-center">

           @livewire('auth.login')

       </div>

    </div>

</div>
