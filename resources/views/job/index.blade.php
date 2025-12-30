<div>

    <h1>job blade</h1>
    <h2>MY name is {{ $name }}</h2>

    @foreach ($jobs as $job )
        <div> {{ $job['title'] }} : {{ 'salary' }}</div>
    
    @endforeach

</div>