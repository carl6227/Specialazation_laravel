
<x-app-layout>

    <div class="col-sm">
   <form action="/p" method="post" enctype='multipart/form-data'>
   @csrf
            <div class="col-8 offset-2" >   

          <div class="row">
              <h1>Add New Post</h1>
          </div>
          <div class="form-group row">
             <label for="title"> Post Title</label>
              <input
               type="text"
               id="title"
               class="form-control @error('title-') is-invalid @enderror"
               name="title"
               value="{{ old('title')}}"
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
             <label for="caption"> Post Caption</label>
              <textarea
               type="text"
               id="caption"
               class="form-control @error('caption') is-invalid @enderror"
               name="caption"
               autocomplete="caption"
               autofocus
               >
               {{ old('caption')}}
              </textarea>
          </div>
          @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
               @enderror



          <div class="row">

          <label for="image"></label>
          <input type="file" name="image" id="image" class="form-control-file">
          
           
          </div>
          @error('image')
            
            <strong>{{$message}}</strong>

           @enderror
           <div class="row">


           <button type="submit" class="btn btn-primary"> Add New Post</button>
           </div>
           </div>
  </form>
  </div>
</x-app-layout>