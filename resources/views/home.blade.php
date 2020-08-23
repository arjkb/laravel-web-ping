@extends('layouts.master')

@section('container')
<h1>Web Ping</h1>

<div>
    <form method="POST" action="/site" class="form-inline">
        @csrf
        <input type="text" name="url" class="form-control mb-2 mr-sm-2" placeholder="Enter URL here">
        <button type="submit" class="btn btn-outline-primary mb-2">Add</button>
    </form>
</div>

@if(count($sites) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>URL</th>
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