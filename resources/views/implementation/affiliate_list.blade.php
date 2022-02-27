@extends('templates.list')

@section('titles')
    <td>Affiliate Id</td>
    <td>Affiliate Name</td>
    <td>Latitude</td>
    <td>Longitude</td>
    <td>Distance from centre</td>
@endsection

@section('table-entry')
    @foreach($collection as $index => $entry)
        <tr>
            <td>{{$entry->getAffiliateId()}}</td>
            <td>{{$entry->getName()}}</td>
            <td>{{$entry->getLatitude()}}</td>
            <td>{{$entry->getLongitude()}}</td>
            <td>{{$entry->getDistance()}}</td>
        </tr>
    @endforeach
@endsection
