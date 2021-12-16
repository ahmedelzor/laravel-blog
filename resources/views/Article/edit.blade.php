@extends('layouts.app')

@section('content')

<!--  It can only be added to admins  -->


@if (Auth::user()->role==1)

@if ($errors->any())
        <div class="container col-md-6">
            
        <div class="alert alert-danger mx-auto w-50">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Article  :  {{$articles->title}} </div>

                <div class="card-body">
                    <form action="{{ route('Article.update' , $articles->id)}} "  enctype="multipart/form-data" method ="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="Title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input value="{{$articles->title}}" type="text" class="form-control" name="title" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

                            <div class="col-md-6">
                                <textarea name="body"  id="" cols="40" rows="10" >{{$articles->body}}</textarea>
                             </div>
                        </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Update Artcle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
   <img src="https://cdn4.vectorstock.com/i/1000x1000/29/48/not-authorized-rubber-stamp-vector-11512948.jpg" style="width:100%;height: 100vh;" alt="">
@endif
@endsection
