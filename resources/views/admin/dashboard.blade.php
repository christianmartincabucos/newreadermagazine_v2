@extends('admin.layouts.admin-app')
@section('title')New Reader Media | Admin Dashboard @endsection
@section('og-title')New Reader Media | Admin @endsection
@section('content')
@push('css')
<style>
    .pending-count>.badge {
        font-size: 10px;
        font-weight: 400;
        position: absolute;
        right: -10px;
        top: -3px;
    }
</style>
@endpush
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box pending-count blue-gradient">
                    <span class="badge bg-danger" data-toggle="tooltip" title="There are pending post"></span>
                    <div class="inner">
                        <h3 class="text-white">12</h3>

                        <p class="text-white">Media</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/administrator/media" class="small-box-footer">More info <i class="text-red fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">

            </section>
            <!-- right col -->
        </div>
    </div>
</section>
<!-- /.content -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
@endsection
