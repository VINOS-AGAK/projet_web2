<form action="{{ route('cellar.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Cellar Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Cellar</button>
</form>


//to add to bouteille as cellier
<!-- <form action="{{ route('cellar.addBottle', $cellar) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="bottle_id">Select a bottle from the catalog:</label>
        <select name="bottle_id" id="bottle_id" class="form-control">
            @foreach($catalog as $bottle)
                <option value="{{ $bottle->id }}">{{ $bottle->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Bottle</button>
</form> -->
