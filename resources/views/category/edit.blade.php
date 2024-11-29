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
                    <form action="{{ route('category.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $item->name }}" id="name" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="description">{{ $item->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label><br>
                            <input type="checkbox" name="status" {{ $item->status == 1 ? 'checked' : '' }} id="status" style="width: 30px; height: 30px;" />
                            <label for="status">Checked = Visible, Unchecked = Hidden</label>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
