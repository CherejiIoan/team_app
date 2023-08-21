<!-- resources/views/utilizatori/index.blade.php -->




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Utilizatori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        @if(session('success'))
            
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('success') }}</span> 
                </div>
                </div>
        @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="flex flex-row">
                        <div class="basis-1/2"><h1>Lista utilizatorilor</h1></div>
                        <div class="basis-1/2 flex grid justify-items-end">
                            
                            <!-- Modal toggle -->
                          <button data-modal-target="addUserModal" data-modal-toggle="addUserModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                                Adaugă utilizator
                            </button>

                            <!-- Main modal - Adaugă utilizator -->
                            <div id="addUserModal" tabindex="-1" aria-hidden="true" class="flex items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-xl max-h-full">
                                    <!-- Modal content -->
                                    <form autocomplete="off" action="{{ route('utilizatori.store') }}" method="POST" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        @csrf
                                        <!-- Modal header -->
                                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Adaugă utilizator
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addUserModal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <div class="space-y-6">
                                             <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                @foreach ($statuses as $status)
                                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                    <div class="flex items-center pl-3">
                                                        <input id="horizontal-list-radio-{{ $status->id }}" type="radio" value="{{ $status->id }}" name="status_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" @if ($loop->first) checked @endif>
                                                        <label for="horizontal-list-radio-{{ $status->id }}" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $status->nume }}</label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                                <div>
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nume și Prenume</label>
                                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nume Prenume" required>
                                                </div>
                                                <div>
                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                    <input type="email" name="email" value="" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                                                </div>
                                                <div>
                                                    <label for="telefon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefon</label>
                                                    <input type="number" name="telefon"  id="telefon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                                </div>
                                                 <div class="mt-4">
                                                    <x-input-label for="zi_de_nastere" :value="__('Data nașterii')" />
                                                        <div class="relative ">
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                            </svg>
                                                        </div>
                                                        <input value="zz/ll/aaaa"  name="zi_de_nastere" required datepicker type="text" class="pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Data nașterii">
                                                            @if ($errors->has('zi_de_nastere'))
                                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('zi_de_nastere') }}</p>
                                                             @endif
                                                        </div>
                                                    </div>
                                                      <div class="mt-4">
                                        
                                            <x-input-label for="user_role" :value="__('Selecteaza rolul')" />
                                            <select id="user_role" name="user_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="1" >Utilizator  </option>
                                                <option value="2" >Administrator</option>
                                            </select>
                                            
                                        </div>
                                         <div class="mt-4">
                                        
                                            <x-input-label for="zi_de_nastere" :value="__('Funcțiile utilizatorului')" />
                                            <ul class="grid w-full gap-2 md:grid-cols-3">
                                              @foreach($allFunctions as $function)
                                                <li>
                                                    <div>
                                                    <input type="checkbox" name="functions[]" id="function-{{ $function->id }}" value="{{ $function->id }}" class="hidden peer" >
                                                    <label for="function-{{ $function->id }}" class="cursor-pointer inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                                        <div class="block">
                                                            <div class="w-full text-lg font-semibold">{{ $function->nume }}</div>
                                                            {{-- <div class="w-full text-sm">Audio</div> --}}
                                                        </div>
                                                    </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>

                                                
                                                  
                                                
                                                    
                                               
                                        </div>
                                                <div>
                                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parolă</label>
                                                    <input type="password" name="password" value="" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                </div>
                                                <div>
                                                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verifică parola</label>
                                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                </div>
                                                <div>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adaugă utilizator</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                        
                        
                        
                        
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                            <div>
                                {{-- <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                    <span class="sr-only">Action button</span>
                                    Action
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button> --}}
                                <!-- Dropdown menu -->
                                {{-- <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <label for="table-search" class="sr-only">Search</label> --}}
                            {{-- <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                            </div> --}}
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        {{-- <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div> --}}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nume și Prenume
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Posturi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rol
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="{{url('/img/peeps-avatar-alpha.png')}}" alt="Jese image">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">{{ $user->name }}</div>
                                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4">
                                    <div class="flex flex-wrap">
                                        @foreach  ($user->functions as $function)
                                           <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-1 mb-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $function->nume }}</span>
                                            
                                        @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">

                                        <div class="flex items-center">
                                        @if ($user->status)
                                            @if ($user->status->nume === "Activ")
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $user->status->nume }}</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $user->status->nume }}</span>
                                            @endif
                                        @else
                                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Fără status</span>
                                        @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if (isset($user->role->name))
                                            {{ $user->role->name }}
                                                
                                            @endif
                                                
                                            
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <!-- Modal toggle -->
                                        <a href="#" type="" data-modal-show="editUserModal{{ $user->id }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center mr-2  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">Edit</a>
                                        <a href="#" data-modal-target="deleteUserModal{{ $user->id }}" data-modal-toggle="deleteUserModal{{ $user->id }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center mr-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Șterge</a>

                                        <div id="deleteUserModal{{ $user->id }}" tabindex="-1" class="flex items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteUserModal{{ $user->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Ești sigur că dorești să ștergi acest utilizator?</h3>
                                                        <div class="p-6 text-center"> 
                                                        <form method="POST" action="{{ route('utilizatori.destroy', $user->id) }}" class="inline-flex">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                Da!
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="deleteUserModal{{ $user->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Nu, anulează</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @foreach ($users as $user)
                        
                        <div id="editUserModal{{ $user->id }}" class="flex items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Conținutul modalului -->
                                <form method="POST" action="{{ route('utilizatori.update', $user->id) }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    @csrf
                                    @method('PUT')
                                     <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Editează utilizatorul
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserModal{{ $user->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="p-6 space-y-6">
                                       
                                        <!-- Câmpuri pentru modificare -->
                                       <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                @foreach ($statuses as $status)
                                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                    <div class="flex items-center pl-3">
                                                        <input id="horizontal-list-radio-{{ $status->id }}" type="radio" value="{{ $status->id }}" name="status_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $user->status_id == $status->id ? 'checked' : '' }}>
                                                        <label for="horizontal-list-radio-{{ $status->id }}" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $status->nume }}</label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nume și Prenume</label>
                                            <input type="text" name="name" value="{{ $user->name }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @if ($errors->has('name'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @if ($errors->has('email'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($errors->has('password'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <label for="password_confirmation">Confirm New Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if ($errors->has('password_confirmation'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password_confirmation') }}</p>
                                            @endif
                                        </div>
                                               <!-- Telefon -->
                                        <div class="mt-4">
                                            <x-input-label for="telefon" :value="__('Telefon')" />
                                            <x-text-input id="telefon" class="block mt-1 w-full" type="number" name="telefon" value="{{ $user->telefon }}" required autocomplete="telefon" />
                                            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
                                        @if ($errors->has('telefon'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('telefon') }}</p>
                                            @endif
                                        </div> 

                                        <!-- Data nasterii -->
                                        <div class="mt-4">
                                        <x-input-label for="zi_de_nastere" :value="__('Data nașterii')" />
                                            <div class="relative ">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input value="{{ $user->formatted_zi_de_nastere }}" name="zi_de_nastere" required datepicker type="text" class="pl-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" placeholder="Data nașterii">
                                        @if ($errors->has('zi_de_nastere'))
                                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('zi_de_nastere') }}</p>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                        
                                            <x-input-label for="user_role" :value="__('Selecteaza rolul')" />
                                            <select id="user_role" name="user_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="1" {{ $user->user_role == 1 ? 'selected' : '' }}>Utilizator</option>
                                                <option value="2" {{ $user->user_role == 2 ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            
                                        </div>
                                         <div class="mt-4">
                                        
                                            <x-input-label for="functii" :value="__('Funcțiile utilizatorului')" />
                                            <ul class="grid w-full gap-2 md:grid-cols-3">
                                              @foreach($allFunctions as $function)
                                                <li>
                                                    <div>
                                                    <input type="checkbox" name="functions[]" id="function-{{ $function->id }}" value="{{ $function->id }}" class=" peer" {{ in_array($function->id, $user->functions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    <label for="function-{{ $function->id }}" class="cursor-pointer inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                                        <div class="block">
                                                            <div class="w-full text-lg font-semibold">{{ $function->nume }}</div>
                                                            {{-- <div class="w-full text-sm">Audio</div> --}}
                                                        </div>
                                                    </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>

                                                
                                                  
                                                
                                                    
                                               
                                        </div>
                                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                        </div>    
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    @endforeach
                    
            </div>
        </div>
    </div>
</x-app-layout>


