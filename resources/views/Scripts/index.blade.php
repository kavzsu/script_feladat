@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Előadások</h1>

        <a href="{{ route('scripts.create') }}" class="btn btn-primary mb-3">Új előadás</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Cím</th>
                <th>Szerző</th>
                <th>Bejegyzések száma</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($scripts as $script)
                <tr>
                    <td>{{ $script->title }}</td>
                    <td>{{ $script->author ?? '–' }}</td>
                    <td>{{ $script->entries_count }}</td>
                    <td>
                        <a href="{{ route('scripts.export', $script) }}" class="btn btn-sm btn-secondary">Export</a>
                        <form action="{{ route('scripts.destroy', $script) }}" method="POST" style="display:inline" onsubmit="return confirm('Biztosan törlöd?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
