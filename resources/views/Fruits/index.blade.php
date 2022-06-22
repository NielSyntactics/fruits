@extends('layouts.app')

@section('content')
    <div class="container-iroc">
        @include('includes/message')
        <div class="header-iroc">
            <form action="{{ route('fruits.search') }}" method="GET">
                @csrf
                <div class="form-group-iroc my-3">
                    <label for="searchInput">Search Fruits</label>
                    <div class="form-input-iroc">
                        <input type="text" name="name" id="">
                        <input type="submit" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <div class="main-iroc">
            <div class="container my-2">
                <a href="{{route('fruits.create')}}" class="add-button-iroc">Add</a>
            </div>
            <table class="table-iroc">
                <thead>
                    <tr>
                        <th>Fruit Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($fruits->isEmpty())
                        <td>Fruit List is Empty</td>
                    @else
                        @foreach ($fruits as $fruit)
                            <tr>
                                <td>{{$fruit->name}}</td>
                                <td>
                                    <div class="dropdown-iroc">
                                        <button class="dropbtn-iroc">Action</button>
                                        <div class="dropdown-content-iroc">
                                            <a href="{{ route('fruits.edit', $fruit->id) }}">Edit</a>
                                            <form action="{{ route('fruits.destroy', $fruit->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
