<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Documentation') }}
        </h2>
    </x-slot>

    <div class="py-12 h-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        @can('user')
                        <div>
                            <x-create-button href="{{ route('documentation.create') }}" />
                        </div>
                        @endcan
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}
                                </p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    Nama MataKuliah
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Nama Asisten
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Nama Dosen
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                        Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($docs as $doc)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <p>{{ $doc->course->nama }}</p>
                                    </td>
                                    <td class="hidden px-6 py-4 md:block ">
                                        @foreach ($users as $user)
                                            @if($user->id==$doc->user_id)
                                                <p>{{ $user->name }}</p>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 md:whitespace-nowrap dark:text-white">
                                        @foreach ($lectures as $lecture)
                                            @if($lecture->id==$doc->lecture_id)
                                                <p>{{ $lecture->nama }}</p>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <img src="{{ asset('fotodok/'.$doc->image)}}" alt="" style="width: 100px; ">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            {{-- Action here --}}
                                            <form action="{{ route('documentation.destroy', $doc) }}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-600 dark:text-red-400 whitespace-nowrap">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
  
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        Empty
                                    </td>
                                </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
