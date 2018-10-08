@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Film</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    {{ Form::open(array('route' => 'films.store', 'enctype' => 'multipart/form-data')) }}
                    @csrf
                        {{ Form::hidden('id', $films->id ,['class' => 'form-control','required']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name',$films->name,['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description',$films->description,['class' => 'form-control', 'rows'=>'2','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('realease_date', 'Release Date') }}
                        {{ Form::date('realease_date',date('m/d/Y',strtotime($films->realease_date)),['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('rating', 'Rating') }}
                        {{ Form::select('rating', array(''=>'--- Select Rating ---','1' => '1 Star', '2' => '2 Star','3' => '3 Star', '4' => '4 Star', '5' => '5 Star'),$films->rating,['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('genre_id', 'Genre') }}
                        {{ Form::select('genre_id[]', [''=>'--- Select Genre ---']+$genres,$selectedGenres,['class' => 'form-control','required','multiple'=>'multiple']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('country', 'Country') }}
                        {{ Form::text('country',$films->country,['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('ticket_price', 'Ticket Price') }}
                        {{ Form::text('ticket_price',$films->ticket_price,['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('photo', 'Photo') }}
                        {{ Form::file('photo',['class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Save',['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
