@extends('layouts.app')
@section('title', 'People Page')
@section('content')
    <section class="flex-center full-height">
        <div class="content container mt-5 mb-5">
            <div class="title m-0 font-weight-bold">Daftar People</div>
            <a href="{{ route('People.create') }}" class="btn btn-primary mb-3">{{ __('Insert') }}</a>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($peoples as $people)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $people->cardnumber }}</td>
                        <td>{{ $people->name }}</td>
                        <td>{{ $people->jobtitle }}</td>
                        <td>
                            <button type="button" class="btn badge badge-info people-detail" data-toggle="modal" data-target="#detailModal" data-baseurl="{{ route('People.show',$people->id) }}">Detail</button>
                            <button type="button" class="btn badge badge-warning" data-toggle="modal" data-target="#updateModal" data-baseurl="{{ route('People.show',$people->id) }}">Update</button>
                            <a href="" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="people_detail"></div>
    </section>
@endsection
