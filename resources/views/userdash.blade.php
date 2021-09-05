<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 d-flex">
                   
                        <div class="col-sm-4">
                            <img src="/img/logo.png" style="width:100%" class="w-100 rounded-circle">
                        </div>
                        <div class="col-sm-8">
                           <div  class="d-flex justify-content-between align-items-baseline">
                           <div class="d-flex align-items-center pb-4"><h1>{{ Auth::user()->username}}</h1></div>
                            <a href="/p/create" class="btn btn-primary">Add new Post</a>
                           </div>

                           
                            <div class="d-flex">
                                <div> <strong>1.5k</strong> Blogs</div>
                                <div><strong>500</strong> Followers</div>
                                <div><strong>400</strong> Following</div>
                            </div>

                            <div class="pt-4 font-wieght-bold">{{ Auth::user()->profile->title }}</div>
                            <div>{{ Auth::user()->profile->description }}</div>
                            <div><a href="#" style="color: #17a2b8;">YourBLog.com</a></div>
                        </div>
                     </div>  <!-- endDiv for row1 -->
            
            </div>
            <div class="row mt-3" style="border-radius:5px;">
               @foreach(Auth::user()->posts as $post)

                        <div class="col-4">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                        </div>
                       
              @endforeach
        </div>
    </div>
</x-app-layout>