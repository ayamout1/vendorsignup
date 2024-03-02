<!DOCTYPE html>
<html>
<head>
    <title>Geocode Address</title>
</head>
<body>
    <h1>Geocode an Address</h1>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('geocode') }}" method="POST">
        @csrf
        <input type="text" name="address" placeholder="Enter an address" value="{{ old('address') }}" required>
        <button type="submit">Geocode</button>
    </form>

    @if(session('data'))
        <h2>Results</h2>
        <p><strong>Address:</strong> {{ session('data')['formatted_address'] }}</p>
        <p><strong>Latitude:</strong> {{ session('data')['geometry']['location']['lat'] }}</p>
        <p><strong>Longitude:</strong> {{ session('data')['geometry']['location']['lng'] }}</p>
    @endif
</body>
</html>
