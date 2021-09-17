<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard For Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Blog writers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Pending Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Approved Posts</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogwriters as $writer)
                                    <tr>
                                        <td>{{$writer->username}}</td>
                                        <td>{{$writer->email}}</td>
                                        <td>
                                        <form method="POST" action="{{ route('user.destroy', [$writer->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">Title</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingPost as $post)
                                    <tr>
                                        <td>{{$post->title}}
                                            
                                        </td>
                                        <td>{{$post->caption}}</td>
                                        <td> <img src="/storage/{{$post->image}}" style="width:200px" alt=""></td>
                                        <td>
                                            <a type="button" href="/p/edit/{{$post->id}}"
                                                class="btn btn-info">Approve</a>

                                                <form method="POST" action="{{ route('post.destroy', [$post->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">Title</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedPost as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->caption}}</td>
                                        <td> <img src="/storage/{{$post->image}}" style="width:200px" alt=""></td>
                                        <td>
                                            <form method="POST" action="{{ route('post.destroy', [$post->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>