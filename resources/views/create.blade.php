<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
        
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <strong style="text-align: center">{{$message}}</strong>
                    </div>
                @endif

                <form action="/dashboard/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" style="margin-left: 120px;font-weight: bold">Title</label> <br>
                        <input type="text" name="title" id="" class="form-control" value="{{old('title')}}" style="width: 80%;border-radius: 20px;margin-left: 100px">
                    
                         @if ($errors->has('title'))
                         <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('title')}}</span>
                             
                         @endif
                         <br>
                        <label for="" style="margin-left: 120px;font-weight: bold">Description</label> <br>
                        <textarea class="form-control" name="description" rows="4" style="width: 80%;border-radius: 20px;margin-left: 100px">{{old('description')}}</textarea>
                        {{-- <input type="text" name="description" id="" class="form-control"> --}}
                        @if ($errors->has('description'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('description')}}</span>
                            
                        @endif
                        <br>
                        
                        <label for="" style="margin-left: 120px;font-weight: bold">Category</label>
                          <br>
                          <div class="dropdown" >
                          <select class="form-select" aria-label="Default select example" name="category" value= "{{old('category')}}" style="width: 80%;border-radius: 20px;margin-left: 100px">
                            
                            <option selected>Select Category</option>
                            <option value="Technology">Technology</option>
                            <option value="Traveling">Traveling</option>
                            <option value="Food">Food</option>
                            <option value="Sports">Sports</option>
                            <option value="Novel/Drama">Novel & Drama</option>
                            <option value="Politics">Politics</option>
                            
                          </select>
                        </div>
                        
                        @if ($errors->has('Category'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('Category')}}</span>
                            
                        @endif
                        
                    <div class="form-group">
                        <label for="" style="margin-left: 120px;font-weight: bold">Image</label>
                        <br>
                        
                        <input type="file" name="image" class="form-control" value="{{old('image')}}"style="width: 20%;border-radius: 0px;margin-left: 100px"/>
                        <br>
                        @if ($errors->has('image'))
                        <span class="text-danger" style="margin-left: 120px;color: #d03521">{{$errors->first('image')}}</span>
                            
                        @endif
                        <br>
                        <div class="text-center">
                        <input type="submit" value="Submit" name="btn_submit" class="btn btn-success bg-primary" >
                        <input type="reset" value="Reset"  class="btn btn-danger bg-danger" ></input>
                        <a href="/dashboard" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>