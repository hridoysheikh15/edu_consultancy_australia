@extends('admin.layouts.app')
@section('title', '| Profile')

@push('css')
    <style>
        .rounded__circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3px solid #ddd;
            overflow: hidden;
            position: relative;
        }
        .profile-container {
            position: relative;
            width: 120px;
            height: 120px;
        }
        
        .profileImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .upload-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 4px 8px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            width: 30px;
            height: 30px;
            transform: scale(0.9);
        }
        .profile-container:hover .upload-icon {
            display: block;
        }
        #profileInput {
            display: none;
        }
    </style>
@endpush
@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-12 text-center">
            <div class="card p-3">
                <div class="d-flex justify-content-center">
                    <div class="profile-container ">
                        <div class="rounded__circle">
                            <img id="profilePreview" class="profileImage" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('backend/images/admin.jpg') }}" alt="Profile Image">
                        </div>
                        <label for="profileInput" class="upload-icon">
                            <i class="ti ti-camera"></i>
                        </label>
                        <form action="{{ route('profile.image.update') }}" id="profileImageForm" method="post" enctype="multipart/form-data">@csrf
                            <input type="file" id="profileInput" name="image" accept="image/*" onchange="previewProfileImage(event)">
                        </form>
                        </div>
                </div>
                <h5 class="text-center mt-2" style="font-weight: bold">{{Auth::user()->name}}</h5>
                <h6 class="text-center mt-2">{{Auth::user()->email}}</h6>
                
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card p-4">
                <form action="{{ route('profile.update') }}" method="POST">@csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function previewProfileImage(event) {
        let reader = new FileReader();
        reader.onload = function(){
            document.getElementById('profilePreview').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    $('#profileInput').on('change', function() {
        $('#profileImageForm').submit();
    });
</script>
@endpush
