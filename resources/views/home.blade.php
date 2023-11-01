<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 20px;">
        <div class="container">
          <a class="navbar-brand text-light" href="{{ url('/') }}">Blogger</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto"> <!-- Centered alignment -->
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{ url('/home') }}">Home</a>
              </li>
              @if (Route::has('login'))
                @auth
                  <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link active text-light">Dashboard</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-light">Log in</a>
                  </li>
                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a href="{{ route('register') }}" class="nav-link text-light">Register</a>
                    </li>
                  @endif
                @endauth
              @endif
            </ul>
          </div>
        </div>
      </nav>
      <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner" style="width: 100%; height:800px;">
              <div class="carousel-item active">
                <img src="{{ asset('assets/slider4.jpg') }}" class="d-block w-100" alt="Loading" >
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/slider2.jpg')}}" class="d-block w-100" alt="Loading">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/slider5.jpg')}}" class="d-block w-100" alt="Loading">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="heading" style="padding: 20px;text-align: center">
            <h1>Recent Posts</h1>
          </div>
      </section>

      {{-- <div class="Parent" style="display: flex; flex-direction: row;"> 
        <div class="child1" style="width: 50%;height: 100vh;text-align: right;background-color: whitesmoke; border-radius: 20px;margin: 10px "> 
            @foreach ($posts as $post)
                
            <center> 
                <h1>Post Image</h1> 
                <h1><img src="post/{{$post->image}}" alt="" srcset="" width="50%"></h1> 
            </center> 
        </div> 
        <div class="child2" style="width: 50%; height: 100vh; background-color: whitesmoke ;border-radius: 20px;margin: 10px"> 
            <center> 
                <h5>{{$post->title}}</h5> 
                <p>{{$post->description}}</p> 
            </center> 
        </div> 
        @endforeach
    </div>  --}}
    
   <div class="container" style="width: 70%; background-color: whitesmoke; padding: 20px; border-radius: 20px">
    @foreach ($posts as $post)
    <h4 style="text-align: center">{{$post->title}}</h3>
    <p style="text-align: center"></p>
    <h4 style="text-align: center">{{$post->category_name}}</h4>
    <p style="text-align: center"></p>

    <p style="text-align: center">{{$post->description}}</p>
    <img src="post/{{$post->image}}" alt="Loading" srcset="" style="align-items: center; justify-content: center; width: 30%;margin-left: 400px; border-radius: 10px">
    @endforeach


   </div>

   <h1 style="padding: 20px;text-align: center">Feedback</h1>



   <div class="container" style="width: 70%; background-color: whitesmoke; padding: 20px; border-radius: 20px;margin-top: 20px">
    <form action="/home/save" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
        </div>
    <div class="form-floating">
        <input type="text" class="form-control" id="floatingtext" placeholder="Feedback" name="feedback">
        <label for="floatingtext">Feedback</label>

    </div>
    <br>
    <div class="text-center">
    <button type="submit" value="Submit" name="btn_submit" class="btn btn-primary">Submit</button>
    <button type="submit" value="reset" name="btn_submit" class="btn btn-danger">Reset</button>

    </div>

</form>
   </div>
        



    





   
    <!-- Remove the container if you want to extend the Footer to full width. -->


    <footer class="bg-dark text-center text-lg-start text-white">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>Home</a>
              </li>
              <li>
                <a href="{{ route('login') }}" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>Login</a>
              </li>
              <li>
                <a href="{{ route('register') }}" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Register</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Feedback</h5>
  
            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>About Us</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-backspace fa-fw fa-sm me-2"></i>Cantact Us</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Feedback</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Privacy policy</a>
              </li>
            </ul>
          </div>
          
  
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Join Us</h5>
  
            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Facebook</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Linkedin</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>X</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright:
        <a class="text-white" href="developer360">Developer360</a>
      </div>
      <!-- Copyright -->
    </footer>
  
  
  <!-- End of .container -->
   
   
      
      

    
</body>
</html>