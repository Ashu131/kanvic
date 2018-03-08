 



<form action="{{route('admin.register')}}" method="post">
      @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('failure'))
            <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
            @endif
<div align="center">
        <fieldset>
            <div class="animate2 bounceIn">

    
                                                     
    
      
    <div class="animate1 bounceIn">
        
<label class="sr-only" for="email"></label>
    <input type="text" name="email" placeholder="email">
{{$errors->first('email')}}
    </div>
            </div>
  
    <div class="animate3 bounceIn">
<label class="sr-only" for="password"></label>    
<input type="text" name="password" placeholder="password">
    {{$errors->first('password')}}
    </div>
                   <input type="hidden" name="_token" value="{{Session('_token')}}">
              <button type="submit" class="btn">Register</button> 
    </div>
    </form>
    
