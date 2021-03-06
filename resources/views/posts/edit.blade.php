<x-app-layout>

  <div class="col-sm">
  <form action="/p/update/{{$post->id}}" method="post" enctype='multipart/form-data'>
  @method('PATCH')
  @csrf
  
          <div class="col-8 offset-2" >   
  
        <div class="row">
            <h1>edit Post</h1>
        </div>
       
        <div class="form-group row">
           <label for="title"> Title</label>
            <input
             type="text"
             
             class="form-control @error('title') is-invalid @enderror"
             name="title"
             value="{{ $post->title}}"
             autocomplete="title"
             autofocus
             >
       
        </div>
        @error('title')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
             @enderror
  
             
        <div class="form-group row">
           <label for="caption">caption</label>
            <textarea 
             name="caption" 
             id="caption" 
             cols="30"
             rows="5"
             type="text"
             class="form-control @error('caption') is-invalid @enderror"
             autocomplete="caption"
             autofocus>
             {{$post->caption}}
          </textarea> 
          
        </div>
        @error('caption')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
             @enderror
  
  
        <div class="row">
  
        <label for="image">Post Image</label>
        <input type="file" name="image" id="image"  class="form-control-file">
        
         
        </div>
        @error('image')
          
          <strong>{{$message}}</strong>
  
         @enderror
         <div class="row">
  
  
         <button type="submit" class="btn btn-primary mt-3">Update Post</button>
         </div>
         </div>
  </form>
  </div>
  </x-app-layout>