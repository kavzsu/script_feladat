@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1>Forgatókönyv-bejegyzések</h1>

        <a href="{{ route('entries.create') }}" class="btn btn-primary mb-3">Új bejegyzés</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Előadás</th>
                <th>Sorszám</th>
                <th>Megnevezés</th>
                <th>Cselekvés</th>
                <th>Média</th>
                <th>Fény</th>
                <th>Mikrofon</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->script->title }}</td>
                    <td>{{ $entry->order_no }}</td>
                    <td>{{ $entry->name ?? '–' }}</td>
                    <td>{{ $entry->action ?? '–' }}</td>
                    <td>{{ $entry->media ?? '–' }}</td>
                    <td>{{ $entry->light ?? '–' }}</td>
                    <td>{{ $entry->microphone ?? '–' }}</td>
                    <td>
                        <a href="{{ route('entries.edit', $entry) }}" class="btn btn-sm btn-warning">Szerk.</a>
                        <form action="{{ route('entries.destroy', $entry) }}" method="POST" style="display:inline" onsubmit="return confirm('Biztosan törlöd?');">
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
