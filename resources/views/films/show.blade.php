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
                            <tr>
                                <td class="btn btn-primary">
                                    <h1>{{$films->name}}</h1>
                                    <p>Price : {{$films->ticket_price}}</p>
                                    <p>Rating : {{$films->rating}}</p>
                                    <p>Release Date: {{ date('m-d-Y', strtotime($films->realease_date))}}</p>
                                    <p>
                                        <img src="{{ Storage::url("{$films->photo}") }}" class="img-responsive img-thumbnail"/>
                                    </p>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                    {{ Form::open(array('id'=>'comments' )) }}
                    <div class="form-group" >
                        <h3>Add Comment</h3>
                    </div>
                    <div class="form-group" >
                        {{ Form::label('name',' ')  }}
                        {{ Form::text('name',null,['placeholder'=>'Add a name','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group" >
                        {{ Form::label('description',' ')  }}
                        {{ Form::textarea('description',null,['placeholder'=>'Add a description...','class' => 'form-control', 'rows'=>'2','required']) }}
                    </div>
                    {{ Form::hidden('film_id', $films->id, ['id'=>'film_id']) }}
                    <div class="form-group buttoncomment">
                        {{ Form::submit('Comment',['class'=>'send btn btn-danger']) }}
                    </div>
                    {{ Form::close() }}


                    <div class="col-md-12">
                        <hr>
                        <h3><small class="float-right">@if (count($films->comments)) {{ count($films->comments) }} @else {{ '0' }} @endif comments</small> Comments </h3>
                        <hr>
                    </div>
                    <div class="comments-list">
                        @if (count($films->comments))
                            @foreach($films->comments as $comment)
                                <div class="  col-md-12">
                                    <p class="float-right"><small>{{ $comment->created_at }}</small></p>

                                    <div class="">

                                        <h4 class="user_name">{{ $comment->name }}</h4>
                                        {{ $comment->description }}

                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            No comments Found
                        @endif


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>

<script>
    $(document).ready(function(){
        $('#comments').submit(function(e){
            e.preventDefault();
            var names = $(this).find('#name').val();
            var description = $(this).find('#description').val();
            var film_id = $(this).find('#film_id').val();
            $.ajax({
                url: '{{ URL::route('comments.store') }}',
                type: "POST",
                data: {'name':names,'description':description,'film_id':film_id, '_token': $('input[name=_token]').val()},
                success: function(response){
                    alert('works');
                }
            });
        });
    });
</script>
