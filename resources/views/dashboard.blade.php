@php
use App\Models\EvenimentUser;


@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="">

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
                <div class="  rounded-lg py-8  mb-8 md:pl-0">

                    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2"><span
                            class="wave">👋</span> Salut!</h1>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mt-12">Bun venit în TeamApp, locul
                        unde organizarea devine o experiență mai plăcută și eficientă pentru echipa ta! </p>

                </div>
                <div class="grid  grid-flow-row-dense grid-cols-3 grid-rows-3 gap-8 ">
                    <div class="profil_card">
                        <div class="bg-gray-50 dark:bg-gray-800  rounded-lg p-8 md:p-12">

                            <img class="w-50 h-50 mb-8 bg-gray-900 rounded-full"
                                src="{{url('/img/peeps-avatar-alpha.png')}}" alt="Neil image">
                            <div href="#"
                                class="border border-gray-500  text-gray-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md  dark:text-gray-500 mb-2">
                                <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                </svg>
                                {{ $user->role->name }}
                            </div>
                            <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-6">{{ $user->name }}</h2>
                            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">
                            </h5>

                            <dl
                                class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Email</dt>
                                    <dd class="text-md font-semibold">{{ $user->email }}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Telefon</dt>
                                    <dd class="text-md font-semibold">{{ $user->telefon }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-md dark:text-gray-400">Posturi</dt>
                                    <div class="flex flex-wrap">
                                        @foreach ($posturiUtilizator as $post)
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 mb-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">{{ $post->nume }} </span>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </dl>

                            <a href="/profile"
                                class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-md mt-6 inline-flex items-center">Datele
                                mele
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>

                        {{-- <div class="utilizatori mt-8">
                            <div class="bg-gray-50 dark:bg-gray-800  rounded-lg p-8 md:p-12">
                                <div
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <svg class="w-3 h-3 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                                    </svg>
                                    Echipa
                                </div>
                                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Utilizatori</h2>
                                <ul role="list" class="max-w-sm divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="w-9 h-9 rounded-full"
                                                    src="{{url('/img/peeps-avatar-alpha.png')}}" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold text-gray-900 truncate dark:text-white">
                                                    Neil Sims
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    email@flowbite.com
                                                </p>
                                            </div>
                                            <span
                                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                Available
                                            </span>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="w-9 h-9 rounded-full"
                                                    src="{{url('/img/peeps-avatar-alpha.png')}}" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold text-gray-900 truncate dark:text-white">
                                                    Bonnie Green
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    email@flowbite.com
                                                </p>
                                            </div>
                                            <span
                                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                                Unavailable
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#"
                                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-md mt-6 inline-flex items-center">Toți
                                    utilizatorii
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="  col-span-2">
                        <div class="urmatoarele_evenimente mb-6 ">
                            <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-8">Urmatorul eveniment
                            </h2>
                            {{-- eveniment 1 --}}
                            @if (Auth::check() && Auth::user()->role->name === 'Admin')

                            @foreach ($evenimente as $eveniment)
                            @php
                            $data_eveniment = strtotime($eveniment->data_eveniment);
                            $data_eveniment_formatata = date('d F Y', $data_eveniment);
                            $data_curenta = strtotime('now');
                            $data_curenta_formatata = date('d F Y', $data_curenta);

                            @endphp
                            @if ($data_eveniment_formatata >= $data_curenta_formatata)

                           
                            <div class=" rounded-lg p-3 border border-gray-700 p-6 rounded-lg">
                                <div class=" ">
                                    <div
                                        class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                                        <dl>
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                                @php
                                                $data_eveniment_formatata = date('d F Y',strtotime($eveniment->data_eveniment));

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
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
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
                                                            <ul class="grid grid-cols-3 ">
                                                                @foreach ($post->users->sortByDesc(function ($user) use
                                                                ($eveniment) {$evenimentUser =
                                                                EvenimentUser::where('eveniment_id',
                                                                $eveniment->id)->where('user_id', $user->id)->first();
                                                                if ($evenimentUser)
                                                                {return $evenimentUser->confirmare_disponibilitate ? 2 :
                                                                1;}
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
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Confirmat</span>';
                                                                } else {
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 ">Indisponibil</span>';
                                                                $userClass = ' pointer-events-none opacity-50';
                                                                }
                                                                } else {
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">În
                                                                    așteptare</span>';
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
                                    <a href="{{ route('eveniment.index', ['eveniment' => $eveniment->id]) }}"
                                        class="  mr-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Vezi toate evenimentele
                                    </a>
                                    

                                   

                                </div>
                            </div>
                            @endif
                            @endforeach
                            @else
                           
                            @foreach ($evenimente as $eveniment)
                          
                            <div class=" rounded-lg mt-6 p-3 border border-gray-700 p-6 rounded-lg">
                                <div class=" ">
                                    <div
                                        class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                                        <dl>
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                                @php
                                                $data_eveniment_formatata = date('d F Y',strtotime($eveniment->data_eveniment));

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
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                                                </svg>
                                                Toate posturile sunt acoperite
                                            </span>
                                        </div> --}}
                                    </div>
                                    <div class="grid grid-cols-1 py-3 gap-3">

                                        @foreach ($eveniment->tipEveniment->departamente as $departament)
                                        @php
                                        $assignedFunctions = Auth::user()->functions->pluck('id')->toArray();
                                        $functionsInDepartament = $departament->functions->pluck('id')->toArray();
                                        $commonFunctions = array_intersect($assignedFunctions, $functionsInDepartament);
                                    @endphp
                                    @if (count($commonFunctions) > 0)
                                        <div class="departament dep_{{ $departament->nume }}">
                                            <div class="departament dep_audio  mb-5">
                                                <div class="w-full   p-3   ">
                                                    <div class="flex items-center mb-3">
                                                        <p
                                                            class="leading-none text-md font-bold flex items-center  w-full pt-0 pb-3 font-medium text-left border-b border-gray-200 dark:border-gray-600  text-gray-900 dark:text-white">
                                                            Poți să ne confirmi dacă ești disponibil la acest eveniment?</p>
                                                    </div>

                                                    
                                                    <div class="posturi_list mb-3">
                                                        
                                                        <div class="flow-root">
                                                            <ul class="grid grid-cols-1 ">
                                                              

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
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-green-100 text-green-800 text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Disponibil</span>';
                                                                } else {
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-red-100 text-red-800 text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 ">Indisponibil</span>';
                                                                $userClass = ' pointer-events-none opacity-50';
                                                                }
                                                                } else {
                                                                $confirmare_disponibilitate = '<span
                                                                    class="bg-gray-100 text-gray-800 text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">În
                                                                    așteptare</span>';
                                                                }
                                                                @endphp
                                                                @if ($user->status_id == 1)

                                                                <div>
                                                                    <p class="text-base font-bold text-gray-500 dark:text-gray-400 pb-1 text-sm">
                                                                        Ai ales:</p>
                                                                        {!! $confirmare_disponibilitate !!}
                                                                </div>
                                                                



                                                                
                                                                    <div class="block mt-5 flex-column items-center p-2 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-150 group hover:shadow dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white ">


                                                                        <div class="flex items-center space-x-2">
                                                                            
                                                                            <div class="flex-1 min-w-0">
                                                                                <p
                                                                                    class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                   Disponibilitatea mea
                                                                                </p>
                                                                            </div>

                                                                        </div>
                                                                       
                                                                        <div class="flex items-center space-x-2">
                                                                            <form action="{{ route('confirmare.disponibilitate', [$eveniment->id, 'true']) }}" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-2">Disponibil</button>
                                                                            </form>
                                                                            <form action="{{ route('confirmare.disponibilitate', [$eveniment->id, 'false']) }}" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 mt-2">Indisponibil</button>
                                                                            </form>
                                                                        </div>
                                                                    </a>
                                                                
                                                                @endif


                                                            </ul>
                                                        </div>
                                                    </div>
                                                    

                                                </div>

                                            </div>
                                        </div>
                                        @endif
                                        @endforeach





                                        {{-- END EVENIMENT --}}
                                    </div>
                                  
                                    

                                   

                                </div>
                            </div>
                          
                            @endforeach
                            @endif
                        </div>


                       
                    </div>
        </section>

       
    </div>
</x-app-layout>