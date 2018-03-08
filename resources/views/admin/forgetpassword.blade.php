

<html>
<head>

	<link rel="stylesheet" type="text/css" href="{{url('assets/loginn.css')}}">
    </head>
    <body>
        
<div class = "testbox">
    
        
       
        <h1> Forgot password?</h1>
                <br>
               
<form action="{{route('getpassword.page')}}" method="post"> 
    
    <div align="center">
        
  
    <input type="text" name="email" placeholder="email">
            {{$errors->first('email')}}
            </div>  
    <br>
        <div align ="center">
            <div class="inputwrapper animate2 bounceIn">
            <label class="sr only" for="password"></label>
    <input type="text" name="password" placeholder="New password">
            {{$errors->first('password')}}
            </div>
            <div align="center">
        
  
        
        <div align="center">
              <input type="hidden" name="_token" value="{{Session('_token')}}">
        
    <button type="submit" class="btn" >Submit</button>
              </div>
    </div>
    </div>
    
    </form>
  
    
    
    </body>
</html>
