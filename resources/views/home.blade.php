@extends('layouts.master')

@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>

<h1>Web Ping</h1>

<div>
    <form method="POST" action="/site" class="form-inline">
        @csrf
        <input type="url" name="url" class="form-control mb-2 mr-sm-2" placeholder="Enter URL here" value="{{ old('url') }}" required>
        <button type="submit" class="btn btn-outline-primary mb-2">Add</button>
    </form>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(count($sites) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>URL</th>
                <th class="text-right">Total Downtimes</th>
                <th class="text-right">Last Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
            <tr class="text-{{ $site->css_color }}">
                <td>{{ $site->id }}</td>
                <td>{{ $site->status_word }}</td>
                <td>
                    <a href="{{ $site->url }}">{{ $site->url }}</a>
                    <a href="/site/{{ $site->id }}">(Show details)</a>
                </td>
                <td class="text-right">{{ $site->downtimes_count }}</td>
                <td class="text-right">{{ optional($site->updated_at)->format('D, M d, Y \| G:i:s') }}</td>
                <td>
                    <form action="/site/{{ $site->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection