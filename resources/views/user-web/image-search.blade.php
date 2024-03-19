<!DOCTYPE html>
<html>
<head>
    <title>Image Search Results</title>
</head>
<body>
    <h1>Image Search Results</h1>
    
    <h2>Similar Images</h2>

     @if (is_array($responseData) && isset($responseData['similar_images']))

        <ul>
            @foreach ($responseData['similar_images'] as $result)
               
                <img src="{{ $result['thumbnail'] }}" alt="{{ $result['url'] }}">
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
    

     @if (is_array($responseData) && isset($responseData['organic']))

        <ul>
            @foreach ($responseData['organic'] as $result)
             @if (is_array($result))
                <h2>{{ $result['title'] }}</h2>
                <a href = "{{ $result['url'] }}">{{ $result['url'] }}</a>
                <br>
                <iframe src="{{ $result['url'] }}" title="{{ $result['title'] }}"  width="100%" height="200" style="border:1px solid black;"></iframe>
                <li> Description : {{ $result['description'] }}</li>
                <li> Destination : {{ $result['destination'] }}</li>
            @endif
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
    
    
</body>
</html>
