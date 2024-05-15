<x-layout>
    <h1 class="text-center text-5xl font-medium text-slate-600 my-16 ">Sign in to your account</h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="email" >E-mail</x-label>
                <x-text-input name="email" type="email" id="email" />

            </div>
            <div class="mb-8">
                <x-label for="password" >Password</x-label>
                <x-text-input type="password" name="password" id="password" />
            </div>
            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-3">
                    <input type="checkbox" name="remember" id="remember" class="rounded-sm border border-slate-400 " />
                    <label for="remember">Remember me</label>
                </div>
                <div class="">
                    <a href="" class="text-indigo-600 hover:underline">
                        Forget Password?
                    </a>
                </div>
            </div>
            <x-button class=" w-full bg-indigo-500 text-white py-3 hover:bg-indigo-700">Login</x-button>
        </form>
    </x-card>
</x-layout>
