@extends('layouts.master')

@section('container')
<h1>Web Ping</h1>

@if(count($sites) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>URL</th>
                <th class="text-right">Last Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
            <tr class="text-{{ $site->css_color }}">
                <td>{{ $site->id }}</td>
                <td>{{ $site->status_word }}</td>
                <td><a href="{{ $site->url }}">{{ $site->url }}</a></td>
                <td class="text-right">{{ optional($site->updated_at)->format('D, M d, Y \| G:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection