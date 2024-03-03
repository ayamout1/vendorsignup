<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendors List</title>
</head>
<body>
<h1>Vendors</h1>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendors as $vendor)
        <tr>
            <td>{{ $vendor->name }}</td>
            <td>{{ $vendor->latitude_c }}</td>
            <td>{{ $vendor->longitude_c }}</td>
            <td>
                @if(empty($vendor->latitude_c) || empty($vendor->longitude_c))
                    <form action="{{ route('geocode.vendor', ['vendorID' => $vendor->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Geocode</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</body>
</html>
