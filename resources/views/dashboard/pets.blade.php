@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Filter Bar (Responsive & Organized) -->
        <div class="col-md-12">
            <div class="filter-bar">
                <form method="GET" action="{{ route('pets') }}" class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <!-- Filters -->
                    <div class="filter-item">
                       <select name="category" id="category" class="form-control">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ ucfirst($category->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="filter-item">
                        <input type="text" class="form-control" id="breed" name="breed" value="{{ request('breed') }}" placeholder="Breed">
                    </div>
                    
                    <div class="filter-item">
                        <input type="number" class="form-control" id="price" name="price" value="{{ request('price') }}" placeholder="Max Price">
                    </div>

                    <div class="filter-item">
                        <input type="number" class="form-control" id="age" name="age" value="{{ request('age') }}" placeholder="Max Age">
                    </div>

                    <div class="filter-item">
                        <button type="submit" class="btnFilter">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Pets Display Section -->
    <div id="card-area" class="row mt-4">
        <div class="wrapper">
            <div class="box-area">
                @foreach($pets as $pet)
                <div class="box">
                    <a href="{{ route('pets.showPets', $pet->id) }}">
                        <img src="{{ asset('storage/'.$pet->image) }}" alt="{{ $pet->name }}">
                        <div class="overlay">
                            <h3>{{ $pet->name }}</h3>
                            <p>{{ $pet->breed }} - {{ $pet->age }} years</p>
                            <p><strong>${{ $pet->price }}</strong></p>
                            <p>Status: 
                                <span class="badge {{ $pet->status == 'available' ? 'badge-success' : 'badge-danger' }}">
                                    {{ ucfirst($pet->status) }}
                                </span>
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Filter Bar */
.filter-bar {
    background-color: #155368;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-left: 30px;
    width: 100%;
}


.filter-item {
    flex: 1;
    min-width: 160px;
}



.btnFilter {
    margin-bottom: 5px;
    padding: 7px 40px;
    border-radius: 10px;
    transition: 0.3s ease;
    text-decoration: none;
    color: white;
    background-image: linear-gradient(50deg,#9ad6e6,#136885,#b3d636);
    background-size: 200% auto;
    text-align: center;
}

.filter-bar .form-control {
    width: 100%;
}

.filter-bar .btn {
    padding: 10px 20px;
}

/* Cards */
.wrapper {
    padding: 10px 10%;
}

.box-area {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 50px;
    margin-top: 20px;
}

.box {
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
    transition: transform 0.5s;
    background: white;
}

.box img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    display: block;
    transition: transform 0.5s;
}

.overlay {
    height: 0;
    width: 100%;
    background: linear-gradient(transparent, black 58%);
    border-radius: 10px;
    position: absolute;
    left: 0;
    bottom: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 20px;
    text-align: center;
    font-size: 14px;
    color: white;
    transition: height 0.5s;
}

.overlay h3 {
    font-weight: 600;
    margin-bottom: 5px;
    margin-top: 50%;
    font-size: 24px;
    letter-spacing: 1px;
}

.overlay p {
    margin-top: 5px;
    font-size: 16px;
}

.badge-success {
    background-color: #28a745;
    padding: 3px 8px;
    border-radius: 5px;
}

.badge-danger {
    background-color: #dc3545;
    padding: 3px 8px;
    border-radius: 5px;
}

.box:hover img {
    transform: scale(1.2);
}

.box:hover .overlay {
    height: 100%;
}

/* Responsive */
@media (max-width: 768px) {
    .filter-bar form {
        flex-direction: column;
        gap: 10px;
    }

    .filter-item {
        width: 100%;
    }

    .btnFilter {
        width: 100%;
    }
}
</style>
@endsection
