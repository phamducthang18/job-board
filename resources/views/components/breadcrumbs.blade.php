<nav {{$attributes}}>
        <ul class="flex space-x-4 text-black ">
            <li>
                <a href="/">Home</a>
            </li>
            @foreach ($links as $lable => $link)
            <li>-></li>
            <li>
                <a href="{{$link}}">{{$lable}}</a>
            </li>
            @endforeach
        
        </ul>
    </nav>