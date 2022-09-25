<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


<style>
    @import url('https://fonts.googleapis.com/css?family=VT323');

    html {
      box-sizing: border-box;
      height: 100%;
    }

    *,*::before,*::after {
      box-sizing: inherit;
      margin: 0;
      padding: 0;
    }

    body {
    background-color: #ffffff;
    /* display: table; */
    }

    .div1 {
    height: 100%;
    width: 100%;
    display: table;
    position: absolute;
    top: 0;
    left: 0;
    }

    .div2 {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
    font-family: VT323;
    font-size: 25px;
    color: #656262;
    }

    .box {
    text-align: center;
    font-size: 20px;
    font-family: VT323;
    outline: none;
    width: 250px;
    height: 35px;
    border: none;
    border-bottom: 2px solid #656262;
    }

    .confirm {
    border: none;
    font-size: 20px;
    font-family: VT323;
    margin-top: 10px;
    color: #656262;
    background-color: rgba(0, 0, 0, 0);
    cursor: pointer;
    }
</style>

<body>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" style="margin-bottom:50px; text-align:center;">
        <strong style="font-size: 15px;">{{ $message }}</strong>
        <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
    </div>
    @endif
  <div class="div1"> 
    <div class="div2">

        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <label for="password">Enter password: </label>
            </br>
            <input type="password" name="password" class="box">
            </br>
            <input type="submit" value="Submit" class="confirm" />
        </form>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html
  

  
