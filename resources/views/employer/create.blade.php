<x-layout>
    <x-card>
        <form action="{{route('employer.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true" class="mb-2 block text-sm font-medium text-slate-900">Company Name</x-label>
                <x-text-input name="company_name"/>
            </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>