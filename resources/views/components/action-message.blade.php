@php $action_message = session('action_message') @endphp
{{-- {{ $action_message }} --}}

@if($action_message == "category_create_success")
    <div class="alert alert-success" role="alert">
        Your category was created successfully!
    </div>
@elseif($action_message == "company_upload_success")
    <div class="alert alert-success" role="alert">
        Your companies were uploaded successfully!
    </div>
@endif
