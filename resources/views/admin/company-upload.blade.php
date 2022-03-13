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
                <form action="{{ route('admin.company.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>Upload Companies</h1>
                    <div class="form-group">
                        <label>CSV file location</label>
                        <input class="form-control" type="file" name="companyfile" placeholder="Company File" value="">
                        @error('companyfile')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_1">Upload Companies</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
@endsection
