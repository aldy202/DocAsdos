<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('course.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="nama" :value="__('Nama Mata Kuliah')" />
                            <x-text-input id="nama" name="nama" type="text" class="block w-full mt-1" autofocus autocomplete="nama" :value="old('nama')" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="semester" :value="__('Semester')" />
                            <x-text-input id="semester" name="semester" type="text" class="block w-full mt-1" autofocus autocomplete="semester" :value="old('semester')" />
                            <x-input-error class="mt-2" :messages="$errors->get('semester')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="user_id" :value="__('Nama Asdos')" />
                            <x-select id="user_id" name="user_id" class="block w-full mt-1">
                                <option value="">Empty</option>
                                @foreach ($users as $category)
                                <option value="{{ $category->id }}" {{ old('user_id')==$category->id ?
                                    'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="lecture_id" :value="__('Nama Lecture')" />
                            <x-select id="lecture_id" name="lecture_id" class="block w-full mt-1">
                                <option value="">Empty</option>
                                @foreach ($lectures as $category)
                                <option value="{{ $category->id }}" {{ old('lecture_id')==$category->id ?
                                    'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-cancel-button href="{{ route('course.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>