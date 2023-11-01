<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
        
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <strong style="border-radius: 10px;border:2px solid #04AA6D;margin-left: 500px;padding: 10px; background-color: #04AA6D;color: white;font-weight: 20px">{{$message}}</strong>
                    </div>
                @endif

                <form action="/dashboard/{{$post->id}}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" style="margin-left: 120px;font-weight: bold">Title</label> <br>
                        <input type="text" name="title" id="" class="form-control" value="{{old('title',$post->title)}}" style="width: 80%;border-radius: 20px;margin-left: 100px">
                        <br>
                         @if ($errors->has('title'))
                         <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('title')}}</span>
                             
                         @endif
                         <br>
                        <label for="" style="margin-left: 120px;font-weight: bold">Description</label> <br>
                        <textarea class="form-control" name="description" rows="4" style="width: 80%;border-radius: 20px;margin-left: 100px">{{old('description',$post->description)}}</textarea>
                        {{-- <input type="text" name="description" id="" class="form-control"> --}}
                        @if ($errors->has('description'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('description')}}</span>
                            
                        @endif
                        <br>
                        
                        <label for="" style="margin-left: 120px;font-weight: bold">Category</label>
                          <br>
                          <div class="dropdown" >
                          <select class="form-select" aria-label="Default select example" name="category" value= "{{old('category'),$post->category_id}}" style="width: 80%;border-radius: 20px;margin-left: 100px">
                            
                            <option selected>Select Category</option>
                            <option value="1">Technology</option>
                            <option value="2">Traveling</option>
                            <option value="3">Food</option>
                            <option value="4">Sports</option>
                            <option value="5">Novel & Drama</option>
                            <option value="6">Politics</option>
                            
                          </select>
                        </div>
                        
                        @if ($errors->has('Category'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('Category')}}</span>
                            
                        @endif
                        
                    <div class="form-group">
                        <label for="" style="margin-left: 120px;font-weight: bold">Image</label>
                        <br>
                        
                        <input type="file" name="image" class="form-control" value="{{old('image'),$post->image}}"style="width: 20%;border-radius: 0px;margin-left: 100px"/>
                        <br>
                        @if ($errors->has('image'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('image')}}</span>
                            
                        @endif
                        <br>
                        <div style="margin-left: 500px">
                        <input type="submit" value="Update" name="btn_submit" class="btn btn-success" style="background-color: #04AA6D;margin-top: 20px;padding: 10px; border-radius: 20px;font-weight: bold;color: white;text-align: center">
                        {{-- <input type="reset" value="Reset"  class="btn btn-danger" style="background-color: gray;margin-top: 20px;padding: 10px; border-radius: 20px;font-weight: bold;color: white"> --}}
                        <a href="/dashboard" class="btn btn-secondary" style="background-color: #d03521;margin-top: 20px;padding: 10px; border-radius: 20px;font-weight: bold;color: white">Cancel</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>