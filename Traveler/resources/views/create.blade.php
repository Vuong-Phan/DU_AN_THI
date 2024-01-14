@extends('layout')
@section('content')
 <style>
 .uper{margin-top:40px; }    
 </style>   
 <div class="card-uper">
    <div class="card-header">
        <h3>Them moi</h3>

    </div>
    <div class="card-body">@if
        
        ($error -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($error -> all() as $error)
                    <li>{{ $error}}</li>
                @endforeach 
                
            </ul>
        </div><br>
        @endif
        <form method="post" action="{{ route('books.store') }}">
            <div class="form-group">@csrf
                <label for="name"> Ten sach</label>
                <input type="text" class="form-control" name="isbn_no">

            </div>

            <div class="form-group">
                <label for="quality">Gia</label>
                <input type="text" class="form-control" name="isbn_no">

            </div>
            <button type="submit" class="btn btn-primary">them moi</button>
        </form>
            
        
    </div>
 </div>
@endsection