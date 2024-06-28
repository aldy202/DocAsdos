<x-app-layout class="bg-white dark:bg-gray-800">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

<div class="py-12 min-h-screen">
      <!-- about -->
      <section class="bg-white dark:bg-gray-800 ">
        <div class="mx-auto max-w-5xl px-6 py-16 text-center">
          <div class="flex flex-col items-center justify-center">
            <img class="mb-12 h-60 w-full rounded-md object-cover object-center shadow" src="{{ ('./images/docasdos.jpg') }}" />
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">Tentang DocAsdos</h2>
            <div class="w-24 border-b-4 border-yellow-400"></div>
          </div>
          <p class="mt-4 text-gray-600 dark:text-gray-200">Aplikasi ini tentang pencatatan dokumentasi asisten dosen. tujuan dibuatnya aplikasi ini adalah untuk mempermudah asisten dosen untuk melaporkan hasil asdos nya kepada Tata Usaha.</p>
        </div>

        <div class="mb-12 flex flex-col items-center justify-center">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 ">Tim Kami</h2>
            <div class="w-24 border-b-4 border-yellow-400"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-200">Kami adalah kelompok 7 di UCP 2 di Mata Kuliah Pemprograman Web Framework.</p>
          </div>
          <div class="grid gap-2 md:grid-cols-5">
            <div class="mb-12 relative mx-6">
              <div class="rounded-lg bg-white shadow-md bg-white dark:bg-gray-900">
                <div class="p-6">
                  <h2 class="text-center mb-2 text-xl font-medium text-gray-800 dark:text-gray-200">Abian Fikri</h2>
                  <h2 class="text-center mb-2 text-sm font-medium text-gray-800 dark:text-gray-200">20200140130</h2>
                </div>
              </div>
            </div>
            <div class="relative mx-6">
                <div class="rounded-lg bg-white shadow-md bg-white dark:bg-gray-900">
                  <div class="p-6">
                    <h2 class="text-center mb-2 text-xl font-medium text-gray-800 dark:text-gray-200">Aldy Ahmad Fauzi</h2>
                    <h2 class="text-center mb-2 text-sm font-medium text-gray-800 dark:text-gray-200">20200140043</h2>
                  </div>
                </div>
                </div>
                <div class="relative mx-6">
                <div class="rounded-lg bg-white shadow-md bg-white dark:bg-gray-900">
                  <div class="p-6">
                    <h2 class="text-center mb-2 text-xl font-medium text-gray-800 dark:text-gray-200">Andi Fahreza</h2>
                    <h2 class="text-center mb-2 text-sm font-medium text-gray-800 dark:text-gray-200">20200140050</h2>
                  </div>
                </div>
                </div>
                <div class="relative mx-6">
                  <div class="rounded-lg bg-white shadow-md bg-white dark:bg-gray-900">
                    <div class="p-6">
                      <h2 class="text-center mb-2 text-xl font-medium text-gray-800 dark:text-gray-200">Belinda Merlansyah</h2>
                      <h2 class="text-center mb-2 text-sm font-medium text-gray-800 dark:text-gray-200">20200140023</h2>
                    </div>
                  </div>
                </div>
                <div class="relative mx-6">
                    <div class="rounded-lg bg-white shadow-md bg-white dark:bg-gray-900">
                      <div class="p-6">
                        <h2 class="text-center mb-2 text-xl font-medium text-gray-800 dark:text-gray-200">Zahran Rafif</h2>
                        <h2 class="text-center mb-2 text-sm font-medium text-gray-800 dark:text-gray-200">20200140073</h2>
                      </div>
                    </div>
                </div>
      </section>
</div>

</x-app-layout>
