<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Edit Typepet
                                </div>
                                <div class="card-body">
                                    
                                    <form action ="{{route('updatetypepet', $typepet->id)}}" method="POST" encrypt="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="name" class="form-label">Type pet</label>
                                          <input type="text" class="form-control" name="name" value="{{$typepet->name}}">
                                          <input type="hidden" name="id" value="{{Auth::user()->id}}">  
                                        </div>
        
                                        @error ('name')
                                            <div class="alert alert-danger my-2">
                                                {{$message}}
                                            </div>
                                        @enderror
        
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</x-app-layout>
