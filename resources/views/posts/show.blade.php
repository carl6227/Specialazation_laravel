<x-app-layout>
    <div class="container d-flex justify-content-center">


        <div class="col-sm-8 ">
            <div class="row">
                <div class="col-sm-5">
                    <img src="/storage/{{$post->image}}" class="w-100 " alt="">

                </div>

                <div class="col-sm-7">
                    <div class=" row mt-3">
                        <div class="col-sm-8 d-flex">
                            <img class="w-10 rounded-circle" src="{{$post->user->profile->profileImage()}}"
                                alt="image ">
                            <h5 class="mt-3 ml-2 float-left">{{$post->user->username}}</h5>
                        </div>
                        <div class="col-sm-4">
                        <button class="btn btn-info">edit</button>
                            <button class="btn btn-danger ">delete</button>
                           
                        </div>
                    </div>
                         <hr class="mt-2">
                    <h1 class="font-semibold text-xl text-gray-800">
                        {{$post->title}}
                    </h1>
                    <div class="mt-4">
                        <p>{{$post->caption}}</p>
                    </div>
                </div>

                <div class="container-fluid">
                    <hr class="mt-2">
                    <div class="container-fluid d flex">
                        <h2 class="font-semibold text-xl text-gray-800">comments</h2>
                        <h2 class="font-semibold text-xl text-gray-800 ml-auto">likes</h2>
                    </div>


                    <div class="container border border-secondary" style=" overflow:scroll;height:150px">

                        @foreach($post->comments as $comment)
                        <div class="d-flex bg-white mt-2 height: p-3">
                            <p>{{$comment->user->username}}</p>

                            <p class="ml-3">{{$comment->comment}}</p>
                        </div>
                        @endforeach

                    </div>
                    <form action="{{route('comment.store',$post->id)}}" method="post">
                        @csrf
                        <div class="input-group mb-3">


                            <input type="text" id="comment" class="form-control @error('comment-') is-invalid @enderror"
                                name="comment" value="{{ old('comment')}}" autocomplete="comment" autofocus
                                placeholder="Write your comment here">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary text-light">submit</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>