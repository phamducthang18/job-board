<x-layout>
    <nav>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            <li>-></li>
            <li>
                <a href="{{route('jobs.index')}}"></a>
                Jobs
            </li>
        </ul>
    </nav>
    <x-job-card :$job/>
</x-layout>