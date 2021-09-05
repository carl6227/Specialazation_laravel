
<x-app-layout>

    <div class="col-sm">
   <form action="/p" method="post" >
   @csrf
            <div class="col-8 offset-2" >   

          <div class="row">
              <h1>Add New Post</h1>
          </div>
          <div class="form-group row">
             <label for="caption"> Post Caption</label>
              <input
               type="text"
               id="caption"
               class="form-control @error('caption') is-invalid @enderror"
               name="caption"
               value="{{ old('caption')}}"
               autocomplete="caption"
               autofocus
               >
            
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