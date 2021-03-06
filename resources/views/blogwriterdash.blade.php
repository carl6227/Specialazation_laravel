<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-400 d-flex">
                        <div class="col-sm-4">
                            <img src="{{ Auth::user()->profile->profileImage() }}" style="width:60%"
                                class="w-60 rounded-circle">
                        </div>

                        <div class="col-sm-8">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <div class="d-flex align-items-center pb-4">
                                    <h1 class="font-semibold text-xl text-gray-800">{{ Auth::user()->username }}</h1>
                                </div>
                                <a href="/p/create" class="btn btn-primary">Add new Post</a>
                            </div>

                            <a href="/dashboard/{{ Auth::user()->id }}/edit">Edit Profile</a>
                            <div class="d-flex">
                                <div> <strong>{{ Auth::user()->posts()->count() }}</strong> Blogs</div>
                                <div><strong class="ml-4">{{ Auth::user()->profile->followers->count() }}</strong>
                                    Followers</div>
                                <div><strong class="ml-4">{{ Auth::user()->following->count() }}</strong> Following
                                </div>
                            </div>
                        </div>
                    </div> <!-- endDiv for row1 -->
                </div>
            </div>

            <div class="row" style="height:800px">
                <div class="col-sm-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Following</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Your blogs post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Drafts</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                            @foreach ($followingPosts as $post)

                                @if ($loop->odd)

                                    <div class="projcard projcard-blue">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>
                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">{{ $post->caption }}</div>
                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <span><a
                                                            href="/p/{{ $post->id }}"
                                                            class="btn btn-sm btn-secondary">read more</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="projcard projcard-green">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>
                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">
                                                    {{ $post->caption }}
                                                </div>

                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <a
                                                        href="/p/{{ $post->id }}"><span>
                                                            <button class="btn btn-sm btn-secondary">read more</button>
                                                        </span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif


                            @endforeach

                            <div class="row">
                                <div class="col-sm-12 d-flex-justify-content-center">
                                    {{ $followingPosts }}
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade mt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            @foreach ($approvedPosts as $post)

                                @if ($loop->odd)

                                    <div class="projcard projcard-blue">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>
                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">{{ $post->caption }}</div>
                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <span><a
                                                            href="/p/{{ $post->id }}"
                                                            class="btn btn-sm btn-secondary">read more</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="projcard projcard-green">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>
                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">
                                                    {{ $post->caption }}
                                                </div>

                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <a
                                                        href="/p/{{ $post->id }}"><span>
                                                            <button class="btn btn-sm btn-secondary">read more</button>
                                                        </span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif


                            @endforeach

                            <div class="row">
                                <div class="col-sm-12 d-flex-justify-content-center">
                                    {{ $approvedPosts }}
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            @foreach ($pendingPosts as $post)

                                @if ($loop->odd)

                                    <div class="projcard projcard-blue">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>
                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">{{ $post->caption }}</div>
                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <span><a
                                                            href="/p/{{ $post->id }}"
                                                            class="btn btn-sm btn-secondary">read more</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="projcard projcard-green">
                                        <div class="projcard-innerbox">
                                            <img class="projcard-img" src="/storage/{{ $post->image }}" />
                                            <div class="projcard-textbox">
                                                <div class="projcard-title">{{ $post->title }}</div>

                                                <div class="projcard-subtitle"></div>
                                                <div class="projcard-bar"></div>
                                                <div class="projcard-description">
                                                    {{ $post->caption }}
                                                </div>

                                                <div class="projcard-tagbox">
                                                    <span class="projcard-tag">Comments</span>
                                                    <span class="projcard-tag">Likes</span> <a
                                                        href="/p/{{ $post->id }}"><span>
                                                            <button class="btn btn-sm btn-secondary">read more</button>
                                                        </span> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif


                            @endforeach

                            <div class="row">
                                <div class="col-sm-12 d-flex-justify-content-center">
                                    {{ $pendingPosts }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 border-left border-gray">
                    <div>
                        <nav class="navbar navbar-light bg-light">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" id="search-user" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </nav></button>
                        </form>
                    </div>

                    <div class="mt-3 dynamic-container">
                        @foreach ($blogwriters as $blogwriter)
                            <div class="d-flex">
                                <a href="/profile/{{$blogwriter->id}}">
                                    <h5>{{ $blogwriter->username }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</x-app-layout>
