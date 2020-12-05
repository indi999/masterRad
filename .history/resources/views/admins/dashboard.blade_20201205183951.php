@extends('admins.layouts.master')

@section('content')

    <main>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="part-table admin-table">
                    @include('admins.tasks.index')
                </div>
            </div>
        </div>
    </div>
    </main>

@endsection
