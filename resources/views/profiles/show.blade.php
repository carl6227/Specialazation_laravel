<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-400 d-flex">

                    <div class="col-sm-4">
                        <img src="{{$user->profile->profileImage()}}" style="width:50%"
                            class="w-70 rounded-circle">
                    </div>
                    <div class="col-sm-8">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <div class="d-flex align-items-center pb-4">
                                <h1 class="text-xl ">{{$user->username}}</h1>
                                <!-- <a href="#" class="btn btn-primary ml-3">Follow</a> -->
                                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            </div>
                          
                        </div>

                       
                        <div class="d-flex">
                             <div> <strong>{{$user->posts()->count()}}</strong> Blogs</div> 
                            <div><strong class="ml-4">{{ $user->profile->followers->count() }}</strong> Followers</div>
                            <div><strong class="ml-4">{{ $user->following->count() }}</strong> Following</div>
                        </div>

                        <div class="pt-4 font-wieght-bold">{{ $user->profile->title }}</div>
                        <div>{{$user->profile->description }}</div>
                        <div><a href="#" style="color: #17a2b8;">{{ $user->profile->url}}</a></div>

                    </div> <!-- endDiv for row1 -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>