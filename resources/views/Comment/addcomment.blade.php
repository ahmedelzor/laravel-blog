@extends('layouts.app')

@section('content')

<div class="container col-md-6">
    @if (Session::has('done'))
     <div class="alert alert-success mx-auto w-50 text-center">
          {{ Session::get('done')}}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header text-left">Comments</div>
                    <div class="card-body">
                  
                        @foreach($comment as $comm)
                        <h5>{{$comm->article_id}}</h5>
                        <p> {{$comm->comment}} </p>
                        @if (Auth::user()->role==1)
                    <a href=" {{ route('Comment.destroy' ,  $comm->id )}} "><i class="far fa-trash-alt text-danger" style ="font-size:25px"></i></a>                        
                    @endif    
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
           
    




 @endsection