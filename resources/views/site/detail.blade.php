@extends('layouts.master')

@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="/"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Downtimes</li>
    </ol>
</nav>

<h1>Detail Page</h1>
<h3>{{ $site->url }}</h3>

<table class="table">
    <thead>
        <th>#</th>
        <th>Started At</th>
        <th>Ended At</th>
    </thead>
    <tbody>
        @foreach($site->downtimes()->orderBy('started_at', 'desc')->get() as $downtime)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $downtime->started_at->format('D, M d, Y \| G:i:s') }}</td>
            <td>{{ optional($downtime->ended_at)->format('D, M d, Y \| G:i:s') ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection