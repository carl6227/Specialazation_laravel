<x-app-layout>
    <div class="container d-flex justify-content-center">

    @foreach($posts as $post)

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
                        <form method="POST" action="{{ route('post.destroy', [$post->id]) }}">
                        <button class="btn btn-info">edit</button>
                      
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                           
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

            </div>
        </div>
    </div>

    @endforeach

    </div>
</x-app-layout>