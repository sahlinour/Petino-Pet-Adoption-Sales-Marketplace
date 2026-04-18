@extends('layouts.layoutDashboard')

@section('content')

   <h1>Ajouter une Annonce</h1>
   <form method="POST" action="{{ route('dashboard.seller.store-annonce') }}">
    @csrf
  <div class="form-row">
        <div class="mb-3">
            <select name="pet_id" class="form-control @error('pet_id') is-invalid @enderror" required>
                <option value="">Choose Pet</option>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}" {{ old('pet_id') == $pet->id ? 'selected' : '' }}>{{ $pet->name }}</option>
                @endforeach
            </select>
            @error('pet_id')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
    </div>
   
    <div class="form-row">
        <div class="mb-3">
            <input
                type="text"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                placeholder="Listing title"
                value="{{ old('title') }}"
                required
            >
            @error('title')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
    </div>
     <div class="form-row">
        <div class="mb-3">
            <textarea
                name="description"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Description"
                rows="4"
            >{{ old('description') }}</textarea>
            @error('description')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <input
                type="number"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                placeholder="Price"
                value="{{ old('price') }}"
            >
            @error('price')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="mb-3">
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">Status</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                <option value="expired" {{ old('status') == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
            @error('status')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <input
                type="text"
                name="location"
                class="form-control @error('location') is-invalid @enderror"
                placeholder="Location"
                value="{{ old('location') }}"
            >
            @error('location')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>
    </div>
  
    <div class="form-row">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add Listing</button>
        </div>
    </div>
</form>
   @endsection

