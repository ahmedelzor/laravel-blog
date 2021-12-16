@extends('layouts.app')

@section('content')
               @if ($errors->any())
                   <div class="container col-md-6">            
                        <div class="alert alert-danger mx-auto w-50">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                   
 <div class="container col-md-6 text-center">
    <div class="card">
         <div class="card-header text-left"> {{ $articles->title}} </div>
                <div class="media my-5">
                    <div class="media-body mt-4">
                            <h5 class="mt-0"> {{ $articles->title}} </h5>
                            <p> {{ $articles->body}} </p>

                                <!-- These icons can only be shown by admins -->
                                @if (Auth::user()->role==1)
                                    <th><a href=" {{ route('Article.edit' ,  $articles->id )}} "><i class="far fa-edit text-success" style ="font-size:25px"></i></a></th>
                                    <th><a href=" {{ route('Article.destroy' ,  $articles->id )}} "><i class="far fa-trash-alt text-danger" style ="font-size:25px"></i></a></th>
                                    @endif
                    </div>
                </div>
         </div>
    </div>
 </div>

                    <!--  comments -->
          
        <div class="container col-md-6 text-center">
             <div class="card">
                <div class="card-header text-left">Comments</div>

                <!-- Comments can only be written by users -->

                @if (Auth::user()->role==0)
                   <div class="card-body">
                      <form method="POST" action=" {{ route ('Comment.store') }} "  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-md-2 col-form-label text-md-right">Add Comment</label>

                            <div class="col-md-4">
                                <textarea name="comment" id="" cols="70" rows="3" required></textarea>
                                <input  type="hidden" value="{{ $articles->id}}" class="form-control" name="article_id">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Add Comment
                                </button>
                                @endif
                                <a class="dropdown-item my-3" href=" {{ route('Comment.addcomment') }} ">  All Comment</a>
                              
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
 </div>

@endsection
