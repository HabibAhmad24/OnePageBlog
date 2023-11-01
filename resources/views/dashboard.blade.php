<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <style>
            #post {
              font-family: Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            #post td, #post th {
              border: 1px solid #ddd;
              padding: 8px;
            }
            
            #post tr:nth-child(even){background-color: #f2f2f2;}
            
            #post tr:hover {background-color: #ddd;}
            
            #post th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #04AA6D;
              color: white;
            }
            </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <strong>{{$message}}</strong>
                    </div>
                @endif
                @if ($message = Session::get('catagory'))
                    <div class="alert alert-success alert-block">
                      <strong >{{$message}}</strong>
                    </div>
                @endif
            
            <button class="btn btn-primary"><a href="/dashboard/create" class="">Create New Post</a></button>
            <button type="button" class="btn btn-primary bg-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Create catagory</button>
            <button class="btn btn-primary"><a href="/home" class="">View all Post</a></button>
            {{-- <button type="button" class="btn btn-primary bg-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">View all Post</button> --}}


                    <table id="post" style="text-align: center;margin-top: 20px">
                        <tr style="align-items: center">
                          <th style="text-align: center">Title</th>
                          <th style="text-align: center">Description</th>
                          <th style="text-align: center">Post Category</th>
                          <th style="text-align: center">Images</th>
                          <th colspan="2" style="text-align: center">Action</th>
                        </tr>
                      
                        @foreach ($posts as $post)
                           
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category_name}}</td>
                            <td><img src="post/{{$post->image}}" alt="Loading....." class="rounded-circle" width="50" height="50"></td>
                            {{-- <td><a href="" class="btn btn-success">Show</a></td> --}}
                            <td><a href="dashboard/{{$post->id}}/edit" class="btn btn-primary" >Edit</a></td>
                            <td><a href="dashboard/{{$post->id}}/delete" class="btn btn-danger">Delete</a></td>
                          </tr>
                          @endforeach
                        
                      </table>
                      
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Catagory" name="category">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary bg-danger text-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary bg-primary text-light">Submit</button>
          </div>
        </div>
      </div>
    </div>
    {{-- modal end--}}
    <script>const myModal = document.getElementById('myModal')
      const myInput = document.getElementById('myInput')
      
      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })</script>
</x-app-layout>
