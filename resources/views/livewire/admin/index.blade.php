<section class="py-1 overflow-auto bg-blueGray-50">

    <x-alerts.success message="Student Added Successful"/>

    <div x-data="{ Open: false}"
         x-on:close-modal.window="Open = false">

        <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-24">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">

                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                            <h3 class="font-semibold text-base text-blueGray-700">Students</h3>

                        </div>

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">

                            <button wire:click.prevent="newStudent"
                                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3
                        py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">Add New Student
                            </button>

                        </div>

                    </div>

                </div>

                <div class="block w-full overflow-x-auto">

                    <table class="items-center bg-transparent w-full border-collapse ">

                        <thead>

                        <tr>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                Students Name

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                Date of Birth

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                Contact Numbers

                            </th>

                        </tr>
                        </thead>

                        <tbody>

                        @forelse($listStudents as $student)
                            <tr>

                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">

                                    {{ $student->name }}

                                </th>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    {{ $student->dob }}

                                </td>

                                <td class="border-t-0 px-6 space-x-2 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    <a href="#" wire:click.prevent="addContact({{ $student }})"
                                       class="text-white font-bold py-1 shadow px-3 rounded text-xs bg-green-500 hover:bg-green-600">

                                        Add Contact

                                    </a>

                                    <a href="#" wire:click.prevent="droplist({{ $student }})"
                                       class="text-white font-bold py-1 px-3 shadow rounded text-xs bg-blue-500 hover:bg-blue-600">

                                        View

                                    </a>

                                    <a href="#" wire:click.prevent="editStudent({{ $student }})"
                                       class="text-white font-bold py-1 px-3 shadow rounded text-xs bg-pink-500 hover:bg-pink-600">

                                        Edit

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td class="border-t-0 px-6 text-center align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    No Students Found

                                </td>

                            </tr>

                        @endforelse

                        </tbody>


                    </table>

                    <div class="p-7">
                        {{ $listStudents->links() }}
                    </div>

                </div>

            </div>

        </div>

        <div x-show="Open"
             x-on:show-modal.window="Open=true"
             class="fixed w-full flex items-center justify-center h-screen left-0 top-0 bg-black bg-opacity-75 ">


            <section @click.away="Open = false"
                     class="w-9/12 my-auto p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">

                @if($newContact)
                    <h2 class="text-2xl font-semibold text-gray-700 w-full text-center mb-8 capitalize dark:text-white">Add Student Phone
                        Number</h2>

                    <h1 class="text-lg font-semibold text-gray-700 text-center my-2 capitalize dark:text-white"> Student: {{ $name }} </h1>
                @elseif($editContact)
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Student Info</h2>
                @else
                    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">New Student</h2>
                @endif

                <form wire:submit.prevent="@if($newContact) storeContact @elseif($editContact) storeEdit @else store @endif">

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                        @if(!$newContact)

                            <div>

                                <label class="text-gray-700 dark:text-gray-200" for="name">Name:</label>

                                <input wire:model.lazy="name"
                                       id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border
                           border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                           focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                                <div>

                                    @error('name')

                                    <div class="text-red-600 my-2 text-xs italic ml-2">
                                        {{ $message }}
                                    </div>

                                    @enderror

                                </div>

                            </div>

                            <div>

                                <label class="text-gray-700 dark:text-gray-200" for="dob">Date of Birth</label>

                                <input wire:model="dob" @if($newContact) disabled @endif
                                id="dob" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border
                            border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                                <div>

                                    @error('dob')

                                    <div class="text-red-600 my-2 text-xs italic ml-2">

                                        {{ $message }}

                                    </div>

                                    @enderror

                                </div>

                            </div>

                        @endif

                        @if($newContact)
                            <div>

                                <label class="text-gray-700 dark:text-gray-200" for="phone_nbr">Phone Number</label>

                                <input wire:model="phone_nbr"
                                       id="phone_nbr" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                            border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                             focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                                <div>

                                    @error('phone_nbr')

                                    <div class="text-red-600 my-2 text-xs italic ml-2">

                                        {{ $message }}

                                    </div>

                                    @enderror

                                </div>

                            </div>
                        @endif

                    </div>

                    <div class="flex justify-end mt-6">

                        <button type="submit"
                                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700
                        rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                            Save

                        </button>

                    </div>

                </form>

            </section>

        </div>

    </div>


    <div x-data="{Dropdown: false }">

        <div x-show="Dropdown"
             x-on:dropdown-modal.window="Dropdown=true"
             class="fixed w-full flex items-center justify-center h-screen left-0 top-0 bg-black bg-opacity-75 ">

            <section @click.away="Dropdown=false"
                     class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">{{ $name }}</h2>

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">Date of Birth</label>
                        <div type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            {{ $dob }}
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Contact Numbers</label>
                        <select
                            id="passwordConfirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                            <option selected disabled> lists of Contacts </option>

                            @forelse($lists as $list)

                                <option> {{ $list->phone_nbr }} </option>

                            @empty

                                <option> No Contact Found </option>

                            @endforelse

                        </select>

                    </div>
                </div>

            </section>
        </div>


    </div>

</section>
