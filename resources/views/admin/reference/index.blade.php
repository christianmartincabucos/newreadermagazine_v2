@extends('admin.layouts.admin-app')
@section('title')New Reader Magazine | Admin Reference @endsection
@section('og-title')New Reader Magazine | Admin v @endsection
@section('content')
@push('css')
<style>
    .dataTables_filter {
        justify-content: flex-end !important;
        display: flex !important;
    }

    .box {
        margin-bottom: 22px;
        background-color: rgba(0, 0, 0, 0.9);
        border: 1px solid transparent;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        color: white !important;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);
    }
</style>
@endpush
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reference</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
                    <li class="breadcrumb-item active">Reference</li>
                </ol>
            </div>
        </div>
    </div>

</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <reference />
            </div>

        </div>

    </div>

</section>
@endsection
