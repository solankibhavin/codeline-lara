@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Films</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>

                        @foreach($films as $film)
                            <tr>
                                <td>
                                    <a href="{{ url('films',$film->slug)}}" class="btn btn-primary">
                                        <h1>{{$film->name}}</h1>
                                        <img src="{{ Storage::url("{$film->photo}") }}" class="img-responsive img-thumbnail"/>
                                    </a>
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
