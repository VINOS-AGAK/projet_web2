@extends('layouts.app')
@section('content')

<!-- Cellier form creatin -->
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
@endsection