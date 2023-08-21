<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editează evenimentul') }}
        </h2>

    </x-slot>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-800 p-4 rounded-lg">
                    <strong>Erori:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('eveniment.update', ['eveniment' => $eveniment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <h2
                    class="mb-4 text-xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700">
                    Detalii</h2>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nume_eveniment"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nume</label>
                        <input type="text" name="nume_eveniment" id="nume_eveniment"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required="" value="{{ $eveniment->nume_eveniment }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="notite"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalii</label>
                        <textarea id="notite" rows="3" name="notite"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           >{{ $eveniment->notite }}</textarea>

                           <div class="mt-6">
                            <label for="tip_eveniment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tip eveniment</label>
                            <select id="tip_eveniment_id" name="tip_eveniment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" disabled>Selectează tipul de eveniment</option>
                                @foreach($tipuriEvenimente as $tipEveniment)
                                    <option value="{{ $tipEveniment->id }}" @if($tipEveniment->id === $eveniment->tip_eveniment_id) selected @endif>{{ $tipEveniment->nume }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <h2
                            class="mt-6 text-xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700">
                            Programare</h2>

                    </div>

                    <div class="w-full">
                        <label for="data_eveniment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker type="text" name="data_eveniment"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4"
                                value="{{ $formattedDataEveniment }}">
                        </div>
                        <div>
                            <label for="recurenta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurență</label>
                                <select id="recurenta" name="recurenta"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="fara_recurenta" @if ($eveniment->recurenta === 'fara_recurenta') selected @endif>Fără recurență</option>
                                <option value="zilnic" @if ($eveniment->recurenta === 'zilnic') selected @endif>Zilnic</option>
                                <option value="saptamanal" @if ($eveniment->recurenta === 'saptamanal') selected @endif>Săptămânal</option>
                                <option value="anual" @if ($eveniment->recurenta === 'anual') selected @endif>Anual</option>
                            </select>
                        </div>

                    </div>
                    <div class="w-full">
                        <div class="mb-4">
                            <x-input-label for="ora_eveniment" :value="__('Oră eveniment')"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
                            <input id="ora_eveniment" name="ora_eveniment" type="time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$eveniment->ora_eveniment}}">
                        </div>

                    </div>





                </div>
                <div class="mt-20">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Salvează</button>
                    <a href="{{ route('eveniment.index') }}"
                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Anulează</a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>