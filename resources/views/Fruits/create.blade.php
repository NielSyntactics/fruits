@extends('layouts.app')

@section('content')
    <div class="container-iroc">
        <div class="card-iroc my-3">
            <h1>Add new Fruits</h1>
            @include('includes/message')
            <form action="{{ route('fruits.store') }}" method="POST">
                @csrf
                <div class="form-group-iroc my-2">
                    <div class="form-input-iroc">
                        <input type="text" name="name" id="" class="@error('name')
                            is-invalid-iroc
                        @enderror" value="{{ old('name') }}">
                        <input type="submit" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
