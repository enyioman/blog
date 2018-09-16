@extends('layouts.app')
<style>
    .avatar {
        border-radius: 100%;
        max-width: 100px;
    }
</style>
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
                <div class="card-header">
                <div class="row justify-content-center">
                    <div class="col-md-4">Dashboard</div>
                    <div class="col-md-8">
                        <form method="POST" action='{{ url("/search") }}'>
                        {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Go!</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </div>
                </div>

                <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                    @if(!empty($profile))
                    <img src="{{ $profile->profile_pic}}" alt="" class="avatar"/>
                    @else
                    <img src="{{ url('images/jkk4.jpg')}}" alt="" class="avatar"/>
                    @endif

                    @if(!empty($profile))
                    <p class="lead">{{ $profile->name}}</p>
                    @else
                    <p></p>
                    @endif

                    @if(!empty($profile))
                    <p class="lead">{{ $profile->designation}}</p>
                    @else
                    <p></p>
                    @endif
                    
                    </div>
                    <div class="col-md-8">
                    @if(count($posts) > 0)
                        @foreach($posts->all() as $post)
                        <h4>{{ $post->post_title }}</h4>
                        <img class= "img-fluid w-25" src="{{ $post->post_image}}" alt="">
                        <p class="text-justify">{{ substr($post->post_body, 0, 199) }}</p>

                        <ul class="nav nav-pills">
                            <li role="presentation">
                              <a href='{{ url("/view/{$post->id}") }}'><span class="fas fa-eye"> View</span></a>
                            </li>
                            <li role="presentation">
                              <a href='{{ url("/edit/{$post->id}") }}'><span class="fas fa-edit ml-2 mr-2"> Edit</span></a>
                            </li>
                            <li role="presentation">
                              <a href='{{ url("/delete/{$post->id}") }}'><span class="fas fa-trash-alt"> Delete</span></a>
                            </li>
                        </ul>
                        <cite style="float:right;">Posted on: {{ date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                        <hr class="mt-5">
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
 