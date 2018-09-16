@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-md-12">
        @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class= "alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                 @if (session('response'))
                        <div class="alert alert-success" role="alert">
                            {{ session('response') }}
                        </div>
                    @endif
       
            <div class="card">
                <div class="card-header">Post View</div>

                <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    <ul class="list-group">
                    @if(count($categories) > 0)
                        @foreach($categories->all() as $category)
                        <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category->category}}</a></li>
                        @endforeach
                    @else
                        <p>No Category Found!</p>
                    @endif 
                    </ul>
                
                    </div>
                    <div class="col-md-8"> 
                    @if(count($posts) > 0)
                        @foreach($posts->all() as $post)
                        <h4>{{ $post->post_title }}</h4>
                        <img class= "img-fluid w-25" src="{{ $post->post_image}}" alt="">
                        <p class="text-justify">{{$post->post_body}}</p>

                        <ul class="nav nav-pills">
                            <li role="presentation">
                              <a href='{{ url("/like/{$post->id}") }}'><span class="fas fa-thumbs-up"> Like ({{$likeCtr}})</span></a>
                            </li>
                            <li role="presentation">
                              <a href='{{ url("/dislike/{$post->id}") }}'><span class="fas fa-thumbs-down ml-2 mr-2"> Dislike ({{$dislikeCtr}})</span></a>
                            </li>
                            <li role="presentation">
                              <a href='{{ url("/comment/{$post->id}") }}'><span class="fas fa-comments"> Comment</span></a>
                            </li>
                        </ul>
                        
                        @endforeach
                        
                    @else
                    <p>No More Posts Available</p>
                    @endif

                    <form method="POST" action='{{ url("/comment/{$post->id}") }}'>
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea id="comment" rows="6" class="form-control" name="comment" required autofocus></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Post Comment</button>
                    </div>
                    </form>

                    <h2>Comments</h2>
                    @if(count($comments) > 0)
                        @foreach($comments->all() as $comment)
                            <p style="font-size:20px;">{{ $comment->comment }}</p>
                            <small id="" class="form-text text-muted">Posted by: {{ $comment->name }}</small>
                        @endforeach
                    @else
                        <p>No More Posts Available</p>
                    @endif
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
