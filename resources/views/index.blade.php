@extends('layout.app')
@section('css')
<link href="{{ asset('css/content.css') }}" rel="stylesheet">
@endsection
@section('title', 'หน้าแรก')
@section('sidebar')
    @include('component.sidebar.sidebar')
@endsection
@section('content')
<main id="Content">
    @if(session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="margin-top: 50px; z-index: 9999;">
            <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">แจ้งเตือน</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastElement = document.getElementById('success-toast');
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 3000
                });
                toast.show();
            });
        </script>
    @endif
    @include('component.content.content')
</main>
@endsection

