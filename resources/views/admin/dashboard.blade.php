@extends('admin.layouts.app')
@section('title', '| Login')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">

    <style>
        /* Customize icon container background, size, and positioning */
        .icon-container {
            width: 50px;
            height: 50px;
            background-color: #28a745;
            /* Success color (green) */
            color: #fff;
            font-size: 24px;
            /* Icon size */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 15px;
            /* Space between icon and text */
        }

        /* Add custom spacing and typography */
        .card-body {
            padding: 20px;
        }

        h3 {
            font-size: 24px;
            font-weight: 600;
        }

        span {
            font-size: 14px;
            color: #6c757d;
            /* Muted color */
        }

        /* Add hover effect to cards */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
    </style>
@endpush

@section('content')
    <div class="content" style="height: 70vh">
        <div class="row mb-4">
    
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="icon-container rounded-circle d-flex justify-content-center align-items-center">
                                    <i class="icon-bell success font-large-2"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3 class="font-weight-bold">{{$contacts->where('is_read',0)->count()}}</h3>
                                    <span class="text-muted">Total Unread Contacts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="icon-container rounded-circle d-flex justify-content-center align-items-center">
                                    <i class="icon-user-follow info font-large-2"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3 class="font-weight-bold">{{$totalSubscribers ?? 0}}</h3>
                                    <span class="text-muted">Total Subscribers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6">
                <div class="">
                    <table id="bootstrap-data-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($contacts->take(10) as $contact)
                                <tr>
                                    <td>
                                        <span class="position-relative">
                                            {{$loop->iteration}}
                                            @if($contact?->is_read == 0)
                                            <span class="position-absolute top-0 start-0 translate-middle p-1 bg-primary border border-light rounded-circle" style="font-size: 8px;"></span>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $contact?->name }}</td>
                                    <td class="text-center">{{ $contact?->phone  }}</td>
                                    <td class="text-center">{{ $contact?->email }}</td>
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
            </div>

            <div class="col-lg-5 col-md-7 col-sm-6">
                <div class="">
                    <table id="bootstrap-data-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td>
                                        <span class="position-relative">
                                            {{$loop->iteration}}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $subscriber?->email }}</td>
                                    
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
                    {{$subscribers?->links()}}
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

@push('js')
@endpush
