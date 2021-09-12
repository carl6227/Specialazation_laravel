<x-app-layout>
    <div class="container mt-5" align="center">
      


            @for($counter=0;$counter < count($posts);$counter++)
           
                @if($counter%2!=0)
               
                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">
                        <img class="projcard-img" src="/storage/{{$posts[$counter]->image }}" />
                        <div class="projcard-textbox">
                            <div class="projcard-title">Card Title</div>
                            <div class="projcard-subtitle">{{$usernames[$counter2]->username}}</div>
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">{{$posts[$counter]->caption}}</div>
                            <div class="projcard-tagbox">
                                <span class="projcard-tag">Comments</span>
                                <span class="projcard-tag">Likes</span> <span ><a href="/p/{{$posts[$counter]->id}}" class="btn btn-sm btn-secondary">read more</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                @else
               
                <div class="projcard projcard-green">
                    <div class="projcard-innerbox">
                    
                        <img class="projcard-img" src="/storage/{{$posts[$counter]->image }}" />
                        <div class="projcard-textbox">
                            <div class="projcard-title">That's Another Card</div>
                           
                            <div class="projcard-subtitle"></div>
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit
                                anim id est laborum.
                                </div>
                            <div class="projcard-tagbox">
                        <span class="projcard-tag">Comments</span>
                                <span class="projcard-tag">Likes</span> <a href="/p/{{$posts[$counter]->id}}" ><span> <button class="btn btn-sm btn-secondary">read more</button>
                                   </span> </a>
                                  
                            </div>
                        </div>
                    </div>
                </div>

                @endif
             
                @endfor

        </div>
    </div>

</x-app-layout>