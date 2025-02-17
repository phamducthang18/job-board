<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Sign in to your account</h1>
    <x-card class="py-10 px-20">
        <form action="{{route('auth.store')}}" method="POST">
            @csrf 
            <div class="mb-8">
                <x-label for="email" class="mb-2 block tetx-sm font-medium text-slate-900" :required="true">
                    E-mail</x-label>
                <x-text-input name="email"/>
            </div>
            <div class="mb-8" >
                <x-label for="password" class="mb-2 block text-sm font-medium text-slate-900" :required="true">Password</x-label>
                <x-text-input name="password" type="password" />
            </div>
        
            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="rounded-sm border border-slate-400" name="remember" id="">
                        <label for="remember" class="">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Forget password?
                    </a>
                </div>
            </div>

            <x-button class="w-full bg-green-50">Login</x-button>
        </form>
    </x-card>
</x-layout>
