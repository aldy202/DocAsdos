<x-app-layout class="bg-white dark:bg-gray-800">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12 min-h-screen">
        <section class="bg-white dark:bg-gray-800 ">
        <div class="mx-auto max-w-5xl px-6 py-16 text-center">
          <div class="flex flex-col items-center justify-center">
            <img class="mb-12 h-80 w-auto rounded-md object-cover object-center" src="{{ ('./images/doc1.png') }}" />
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">Hai, Selamat Datang di Website DocAsdos!</h2>
            <div class="w-24 border-b-4 border-yellow-400"></div>
          </div>
        </div>
    </div>
</x-app-layout>
