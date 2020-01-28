@extends('master.main')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-header">Add New Category</div>
                    <div class="card-body">
                        @if (session()->has("cat"))
                            <div class="alert  alert-success">
                                {{-- {{session()->get("msg")}} --}}
                                Category {{session()->get("cat")->id}} Inserted Successfully
                            </div>

                        @endif
                        <form method="POST" action="/category/add">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                            <input type="text" name="name" @if (session()->has("cat"))   value='{{session()->get("cat")->name}}' @endif class="form-control form-control-sm"/>
                            </div>
                            <div class="form-group">

                                <input type="submit" value="Save" class="btn btn-sm btn-block btn-secondary"/>
                            </div>

                        </form>



                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-4 ">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-header">All Categories</div>
                    <div class="card-body">
                        <div class="list-group">
                            @forelse (\App\Category::all() as $data)
                            <div title="Create At: {{$data->created_at}}" class="list-group-item list-group-item-action">{{ $data->name}}
                            <button data-toggle="modal" data-target="#exampleModal{{$data->id}}" class="float-right btn btn-sm btn-danger">Delete</button>
                            </div>
                            @component('my_components.modal' , ["row" =>$data])

                            @endcomponent
                            @empty
                            <a  class="list-group-item list-group-item-action">No categories Yet</a>
                            @endforelse


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
