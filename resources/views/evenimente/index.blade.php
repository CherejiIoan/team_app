@php
use App\Models\EvenimentUser;


@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evenimente') }}
        </h2>

    </x-slot>

    <div class="">

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
                <div class="  rounded-lg p-8 dark:bg-gray-800 mb-8  flex flex-row justify-between">

                    <h1 class="text-gray-900 dark:text-white text-2xl md:text-2xl font-extrabold mb-2">Listă evenimente
                    </h1>
                    <a href="{{ route('eveniment.create') }}"
                        class="  block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                        Crează eveniment
                    </a>
                </div>
                <div class="grid  grid-flow-row-dense grid-cols-3 grid-rows-3 gap-8 ">

                    {{-- EVENIMENT --}}


                    @foreach ($evenimente as $eveniment)


                    <div class=" bg-gray-50 dark:bg-gray-800 p-6 rounded-lg">
                        <div class=" ">
                            <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                                <dl>
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                        @php
                                        $data_eveniment_formatata = date('d F Y',
                                        strtotime($eveniment->data_eveniment));

                                        @endphp
                                        {{$data_eveniment_formatata}}</dt>
                                    <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">
                                        <a href=""> {{$eveniment->nume_eveniment}} </a>
                                    </dd>
                                </dl>
                                {{-- <div>
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">

                                        <svg class="w-3 h-3 mr-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                                        </svg>
                                        Toate posturile sunt acoperite
                                    </span>
                                </div> --}}
                            </div>
                            <div class="grid grid-cols-1 py-3 gap-3">

                                @foreach ($eveniment->tipEveniment->departamente as $departament)
                                <div class="departament dep_{{ $departament->nume }}">
                                    <div class="departament dep_audio  mb-5">
                                        <div class="w-full   rounded-lg p-3 border border-gray-700    ">
                                            <div class="flex items-center mb-3">
                                                <p
                                                    class="leading-none text-md font-bold flex items-center  w-full pt-0 pb-3 font-medium text-left border-b border-gray-200 dark:border-gray-600  text-gray-900 dark:text-white">
                                                    {{ $departament->nume }}</p>
                                            </div>

                                            @foreach ($departament->functions as $post)
                                            <div class="posturi_list mb-3">
                                                <p
                                                    class="text-base font-bold text-gray-500 dark:text-gray-400 pb-1 text-sm">
                                                    {{$post->nume}}</p>
                                                <div class="flow-root">
                                                    <ul class="grid grid-cols-1 ">
                                                        @foreach ($post->users->sortByDesc(function ($user) use
                                                        ($eveniment) {$evenimentUser =
                                                        EvenimentUser::where('eveniment_id',
                                                        $eveniment->id)->where('user_id', $user->id)->first();
                                                        if ($evenimentUser)
                                                        {return $evenimentUser->confirmare_disponibilitate ? 2 : 1;}
                                                        else
                                                        {return 0;}}) as $user)

                                                        @php
                                                        $evenimentUser = EvenimentUser::where('eveniment_id',
                                                        $eveniment->id)
                                                        ->where('user_id', $user->id)
                                                        ->first();
                                                        @endphp
                                                         @php
                                                         $confirmare_disponibilitate = '';
                                                         $userClass = '';
                                                         if ($evenimentUser) {
                                                             if ($evenimentUser->confirmare_disponibilitate) {
                                                                 $confirmare_disponibilitate = '<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Confirmat</span>';
                                                             } else {
                                                                 $confirmare_disponibilitate = '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 ">Indisponibil</span>';
                                                                 $userClass = ' pointer-events-none opacity-50';
                                                             }
                                                         } else {
                                                             $confirmare_disponibilitate = '<span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">În așteptare</span>';
                                                         }
                                                         @endphp
                                                        @if ($user->status_id == 1)


                                                        {{-- Afisarea starii utilizatorului --}}




                                                        <li class="p-1 {{ $userClass }}">
                                                            <a href="#"
                                                                class="flex items-center p-1 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-150 group hover:shadow dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white justify-between">


                                                                <div class="flex items-center space-x-2">
                                                                    <div class="flex-shrink-0">
                                                                        <img class="w-4 h-4 rounded-full"
                                                                            src="{{url('/img/peeps-avatar-alpha.png')}}"
                                                                            alt="Neil image">
                                                                    </div>
                                                                    <div class="flex-1 min-w-0">
                                                                        <p
                                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                            {{$user->name}}
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                                {!! $confirmare_disponibilitate !!}
                                                               
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @endforeach


                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                                @endforeach





                                {{-- END EVENIMENT --}}
                            </div>
                            <a href="{{ route('eveniment.edit', ['eveniment' => $eveniment->id]) }}"
                        class="  mr-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Edit
                    </a>
                            <a href="#" data-modal-target="deleteUserModal{{ $eveniment->id }}" data-modal-toggle="deleteUserModal{{ $eveniment->id }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-1.5 text-center mr-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Șterge</a>

                            <div id="deleteUserModal{{ $eveniment->id }}" tabindex="-1" class="flex items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteUserModal{{ $eveniment->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Ești sigur că dorești să ștergi acest eveniment?</h3>
                                            <div class="p-6 text-center"> 
                                            <form method="POST" action="{{ route('eveniment.destroy', $eveniment->id) }}" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Da!
                                                </button>
                                            </form>
                                            <button data-modal-hide="deleteUserModal{{ $eveniment->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Nu, anulează</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach

        </section>


    </div>
</x-app-layout>