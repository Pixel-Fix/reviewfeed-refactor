@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-12">
            <div class="box_general write_review">
                <x-action-message>

                </x-action-message>
                <form action="{{ route('admin.categories.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>Create a Category</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image" placeholder="Image" value="{{ old('image')  }}">
                        @error('image')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_1">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
@endsection
