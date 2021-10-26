<div class="w-full  max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">

    <div class="px-6 py-4">

        <h2 class="text-3xl font-bold text-center border-b border-gray-500 p-3 mb-8 text-gray-700 dark:text-white">
            Information Center</h2>

        <form wire:submit.prevent="store">

            <div class="w-full mt-4">

                <label> Email
                    <input wire:model="email" type="text"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-md
                    dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 dark:focus:border-blue-500
                    focus:outline-none focus:ring" placeholder="Email Address"/>
                </label>

                <div>

                    @error('email')

                    <div class="text-red-600 my-2 text-xs italic ml-2">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

            </div>

            <div class="w-full mt-4">

                <label> Password

                    <input wire:model="password"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-md
                    dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500
                    dark:focus:border-blue-500 focus:outline-none focus:ring" type="password" placeholder="Password"/>

                </label>

                <div>

                    @error('password')

                    <div class="text-red-600 my-2 text-xs italic ml-2">
                        {{ $message }}
                    </div>

                    @enderror

                </div>

            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="" class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-500"></a>

                <button class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700
                rounded hover:bg-gray-600 focus:outline-none" type="submit">
                    Login
                </button>
            </div>
        </form>
    </div>


</div>
