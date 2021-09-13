<x-app-layout>
    <div class="container d-flex justify-content-center">


        <div class="col-sm-8 ">
            <div class="row">
                <div class="col-sm-5">
                    <img src="/storage/{{$post->image}}" class="w-100 " alt="">

                </div>

                <div class="col-sm-7">
                    <div class="d-flex">
                        <img class="w-10 rounded-circle" src="{{$post->user->profile->profileImage()}}" alt="image ">
                        <h5 class="mt-3 ml-2">{{$post->user->username}}</h5>

                    </div>

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


                    <div class="container border border-secondary" style="height:150px"></div>
                    <form action="p/comments/{{Auth::user()->id}}" method="get">

                        @csrf
                        <div class="input-group mb-3">


                            <input type="text" id="comment" class="form-control @error('comment-') is-invalid @enderror"
                                name="comment" value="{{ old('comment')}}" autocomplete="comment"
                                autofocus placeholder="Write your comment here">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append">
                                <button type="submit" href="" class="btn btn-primary text-light">submit</a>

                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>