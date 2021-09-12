
<x-app-layout>

<div class="col-sm">
    <div class="row">
        <div class="col-sm-4">
            <img src="/storage/{{$post->image}}"class="w-100 " alt="">
        <div>  {{$post->user->username}}</div>
        </div>
        
        <div class="col-sm-8">
            <h1>
            {{$post->caption}}
            </h1>
        </div>
    </div>
</div>
</x-app-layout>