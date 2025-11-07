@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Új előadás létrehozása</h1>

        <form method="POST" action="{{ route('scripts.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Cím *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Szerző / Producer</label>
                <input type="text" name="author" id="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror">
                @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Mentés</button>
            <a href="{{ route('scripts.index') }}" class="btn btn-secondary">Mégse</a>
        </form>
    </div>
@endsection
