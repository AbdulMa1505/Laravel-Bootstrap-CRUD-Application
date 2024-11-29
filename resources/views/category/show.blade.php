@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Category</h4>
                    <a href="{{ url('category') }}" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                   
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <p>{{ $item->name }}</p>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">description</label>
                            <p>{{ $item->description }}</p>
                            
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label><br>
                           <p>{{$item->status==1 ? 'checked':''}}</p>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
