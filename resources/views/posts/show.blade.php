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
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Write comment here..."
                            aria-label="comment" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>