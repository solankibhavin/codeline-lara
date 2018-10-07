@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Films</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Rating</td>
                            <td>Date</td>
                            <td colspan="2">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td>{{$film->id}}</td>
                                <td>{{$film->name}}</td>
                                <td>{{$film->ticket_price}}</td>
                                <td>{{$film->rating}}</td>
                                <td>{{ date('m-d-Y', strtotime($film->realease_date))}}</td>
                                <td><a href="{{ route('films.edit',$film->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('films.destroy', $film->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $films->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
