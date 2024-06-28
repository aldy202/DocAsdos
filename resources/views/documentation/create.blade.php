<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Documentation') }}
        </h2>
    </x-slot>

    <div class="sm:py-12 min-h-screen">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('documentation.store') }}" class="" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" name="image" type="file" class="block w-full mt-1" autofocus autocomplete="image" :value="old('image')" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        <div class="mb-6">
                        <x-input-label for="user_id" :value="__('Matakuliah')" />
                            <x-select id="course_id" name="course_id" class="block w-full mt-1">
                                <option value="">Empty</option>
                                @foreach ($courses as $category)
                                <option value="{{ $category->id }}" {{ old('course_id')==$category->id ?
                                    'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
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
                            <x-cancel-button href="{{ route('documentation.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>