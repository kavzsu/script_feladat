@extends('layouts.app')

@section('title', 'Export – ' . $script->title)

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h2>🎭 {{ $script->title }}</h2>
        <button onclick="window.print()" class="btn btn-primary">🖨️ Nyomtatás</button>
    </div>

    @if($script->author)
        <p><strong>Szerző:</strong> {{ $script->author }}</p>
    @endif

    <hr>

    @foreach($entries as $entry)
        <div class="card mb-4 p-3">
            <h5>{{ $entry->order_no }}. {{ $entry->name ?? 'Névtelen bejegyzés' }}</h5>
            <small class="text-muted">
                Média: {{ $entry->media ?? '–' }} |
                Vetítés: {{ $entry->projection ?? '–' }} |
                Fény: {{ $entry->light ?? '–' }} |
                Mikrofon: {{ $entry->microphone ?? '–' }}
            </small>
            <div class="mt-2">
                <p><strong>Cselekvés:</strong> {{ $entry->action ?? '–' }}</p>
                <p><strong>Megjegyzés:</strong> {{ $entry->note ?? '–' }}</p>
                <p><strong>Tartalom:</strong> {{ $entry->content ?? '–' }}</p>
            </div>
        </div>
    @endforeach

@endsection
