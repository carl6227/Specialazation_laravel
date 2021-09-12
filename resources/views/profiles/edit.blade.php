
<x-app-layout>

<div class="col-sm">
<form action="/dashboard/{{Auth::user()->id}}" method="post" enctype='multipart/form-data'>
@method('PATCH')
@csrf

        <div class="col-8 offset-2" >   

      <div class="row">
          <h1>edit Profile</h1>
      </div>
      <div class="form-group row">
         <label for="title"> Title</label>
          <input
           type="text"
           id="title"
           class="form-control @error('title') is-invalid @enderror"
           name="title"
           value="{{ Auth::user()->profile->title}}"
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
         <label for="description"> description</label>
          <textarea 
           name="description" 
           id="description" 
           cols="30"
           rows="5"
           type="text"
           class="form-control @error('description') is-invalid @enderror"
           autocomplete="description"
           autofocus>
           {{Auth::user()->profile->description}}
        </textarea> 
        
      </div>
      @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
           @enderror


           <div class="form-group row">
         <label for="url"> url</label>
          <input
           type="text"
           id="url"
           class="form-control @error('url') is-invalid @enderror"
           name="url"
           value="{{ Auth::user()->profile->url}}"
           autocomplete="url"
           autofocus
           >
        
      </div>
      @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
           @enderror

      <div class="row">

      <label for="image">Profile Image</label>
      <input type="file" name="image" id="image" class="form-control-file">
      
       
      </div>
      @error('image')
        
        <strong>{{$message}}</strong>

       @enderror
       <div class="row">


       <button type="submit" class="btn btn-primary">Update Profile</button>
       </div>
       </div>
</form>
</div>
</x-app-layout>