@extends('layouts.app')

@section('content')
    <div class="container-iroc">
        <div class="card-iroc my-3">
            <h1>Edit Fruits</h1>
            @include('includes/message')
            <form action="{{ route('fruits.update', $fruit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group-iroc my-2">
                    <div class="form-input-iroc">
                        <input type="text" name="name" id="" class="@error('name')
                            is-invalid-iroc
                        @enderror" value="{{ $fruit->name }}">
                        <input type="submit" value="Edit">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
