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




<!-- formulaire de alex. a revoir. -->

{{--
<div class="cellier-create">

    <form method="POST">
        @csrf
        <div class="">
            <label for="cellierTitle">Title</label>
            <input type="text" name="cellierTitle" id="cellierTitle" class="">
        </div>

        <div class="control-group col-12">
            <label for="cellierDescription">Description</label>
            <input type="text" name="cellierDescription" id="cellierDescription" class=""></input>
        </div>

        <div class="">
            <input type="submit" value="send" name="saveCellier" class="">
        </div>
    </form>
</div>
--}}