@extends('layouts.frontend');
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @session('status')
             <div class="alert alert-success">
               {{session('status')}}
             </div>
            @endsession
            <div class="card">
                <div class="card-header">
                    <h4>categories List</h4>
                    <a href="{{url('category/create')}}" class="  btn btn-primary float-end">Add Category</a>
                    <div class="card-body ">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    
                                
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->status ==1? 'visible':'hidden'}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('category.edit',$item->id)}}" class="btn btn-success">edit</a>
                                        <a href="{{ route('category.show',$item->id)}}" class="btn btn-info">view</a>
                                        <form action="{{ route('category.destroy',$item->id)}} " method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>

                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection