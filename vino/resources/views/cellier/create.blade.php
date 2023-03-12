@extends('layouts.app')
@section('title', 'Creer un cellier')
@section('content') 

<form action="{{ route('cellier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Cellar Name:</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <div >
        <label for="description">Cellier Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn">Create Cellier</button>
</form>


@endsection