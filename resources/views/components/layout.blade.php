<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>Laravel Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-200 from-10% via-sky-200 via-30% to-emerald-200 text-slate-700">

    <nav class="">
        <div class="items-center mb-8 text-lg font-medium flex justify-between">
            @auth
                <ul>
                    <li>
                        {{ auth()->user()->name ?? 'Anynomus' }}
                    </li>


                </ul>
                <ul class="flex justify-between space-x-4 items-center ">
                    <li>
                        {{-- <a href="{{ route('jobs.index') }}" class="hover:underline">Home</a> --}}
                        <a href="{{ route('jobs.index') }}" class=" relative group">
                            <p class="transition ease-in-out delay-150 hover:scale-110 hover:translate-y-0 duration-300">
                                Home
                            </p>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-slate-500 origin-top left-0 transform scale-x-0 group-hover:scale-x-110 transition-transform duration-300"></span>
                        </a>


                    </li>
                    <li>
                        <a href="{{ route('my-job-applications.index') }}" class="relative group">
                            <p class="transition ease-in-out delay-150 hover:scale-110 hover:translate-y-0 duration-300">
                                Applications
                            </p>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-slate-500 origin-top left-0 transform scale-x-0 group-hover:scale-x-110 transition-transform duration-300"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my-jobs.index') }}" class="relative group">
                            <p class="transition ease-in-out delay-150 hover:scale-110 hover:translate-y-0 duration-300">
                                My Jobs
                            </p>
                            <span
                                class="absolute inset-x-0 bottom-0 h-0.5 bg-slate-500 origin-top left-0 transform scale-x-0 group-hover:scale-x-110 transition-transform duration-300"></span>
                        </a>
                    </li>
                    <li>
                    <li>
                        @auth
                            <form action="{{ route('auth.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button class="bg-red-600 text-white hover:bg-red-500">Logout</x-button>
                            </form>
                        @else
                            <a href="{{ route('auth.create') }}">Login</a>
                        @endauth
                    </li>
                    </li>
                </ul>
            @endauth
        </div>

    </nav>

    @if (session('success'))
        <div class="bg-green-100 my-8 rounded-md border-l-4 border-green-300 p-4 text-green-700 opcaity-75">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 my-8 rounded-md border-l-4 border-red-300 p-4 text-red-700 opcaity-75">
            <p class="font-bold">Failure</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
