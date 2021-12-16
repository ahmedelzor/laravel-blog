@extends('layouts.app')

@section('content')

<h1 class="text-center my-3">Total Article </h1>

<div class="container col-md-6">
    @if (Session::has('done'))
     <div class="alert alert-success mx-auto w-50 text-center">
          {{ Session::get('done')}}
    </div>
    @endif
            <div class="card">
                <div class="card-body">
                    <table class=" table table-dark ">
                    <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan=3>Action</th>
                </tr>
                 @foreach($articles as $article)

                <tr>
                    <th> {{ $article->id}} </th>
                    <th> {{ $article->title}} </th>
                    <th><a href=" {{ route('Article.show' ,  $article->id )}} "><i class="fas fa-eye text-info" style ="font-size:25px"></i></a></th>
                   
                    <!-- These icons can only be shown by admins -->
                    @if (Auth::user()->role==1)
                    <th><a href=" {{ route('Article.edit' ,  $article->id )}} "><i class="far fa-edit text-success" style ="font-size:25px"></i></a></th>
                    <th><a href=" {{ route('Article.destroy' ,  $article->id )}} "><i class="far fa-trash-alt text-danger" style ="font-size:25px"></i></a></th>
                    @endif
                </tr>
                @endforeach 

                    </table>
                </div>
            </div>
</div>



@endsection

