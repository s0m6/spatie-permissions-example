<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="http://127.0.0.1:8000/users" class="btn btn-success mx-1">Users</a>
            <a href="http://127.0.0.1:8000/roles" class="btn btn-warning mx-1">roles</a>
            <a href="http://127.0.0.1:8000/permissions" class="btn btn-info mx-1">permissions</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
