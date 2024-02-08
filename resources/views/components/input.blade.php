<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
      <input type="{{$type}}" class="form-control" name="{{$name}}" id="inputEmail3" placeholder="{{$placeholder}}" value="{{$value}}">
    
  <span class="text-danger mr-3">
    @error($name)
        {{$message}}
    @enderror
  </span>
</div></div>