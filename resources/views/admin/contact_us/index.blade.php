@extends('admin.layouts.app')
@section('title', '| Contact Requests')
@push('css')

@endpush

@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Contact Requests</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="active">Contact Requests</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-3">
                            <h5 class="fw-bold">Contact Requests</h5>
                        </div>
                        <div class="mt-4">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Program</th>
                                        <th class="text-center">Date/Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @forelse ($contacts as $contact)
                                        <tr>
                                            <td>
                                                <span class="position-relative">
                                                    {{ $contacts->firstItem() + $loop->index }}
                                                    @if($contact?->is_read == 0)
                                                    <span class="position-absolute top-0 start-0 translate-middle p-1 bg-primary border border-light rounded-circle" style="font-size: 8px;"></span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $contact?->name }}</td>
                                            <td class="text-center">{{$contact?->code}}{{ $contact?->phone  }}</td>
                                            <td class="text-center">{{ $contact?->email }}</td>
                                            <td class="text-center">{{ $contact?->program }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($contact?->created_at)->format('d M Y') }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($contact?->created_at)->diffForHumans(null, true) }}
                                            </td>
                                            
                                            
                                            <td class="d-flex justify-content-center align-items-center"
                                               style="gap: 10px">
                                               @if($contact?->is_read == 0)
                                                <a class="btn btn-outline-primary btn-sm " href="{{ route('contact_us.makeRead', $contact?->id) }}">
                                                    Make As Read
                                                </a>
                                                @else
                                                <button class="btn btn-outline-success btn-sm ">
                                                    Read
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{$contacts?->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
