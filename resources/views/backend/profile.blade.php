@extends('backend.layouts.master')
@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Profile</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <div class="profile-photo">

                        <img src="{{ asset('assets/backend/vendors/images/photo1.jpg') }}" alt=""
                            class="avatar-photo" />
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{ route('admin.profile.destroy') }}" class="p-6">
                                        @csrf
                                        @method('delete')

                                        <div class="modal-body pd-5">
                                            <div class="form-group">
                                                <label> Password</label>
                                                <input class="form-control form-control-lg" name="password"
                                                    type="password" autocomplete="new-password" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary"
                                                            value="Delete Account" />
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center h5 mb-0">{{ $user->name }}</h5>

                    <div class="profile-info">

                        <ul>
                            <li>
                                <span>Email Address:</span>
                                {{ $user->email }}
                            </li>
                            <button class="btn btn-danger" href="modal" data-toggle="modal" data-target="#modal">
                                Delete account
                            </button>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="card-box height-100-p overflow-hidden">
                    <div class="profile-tab height-100-p">
                        <div class="tab height-100-p">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#profile-information"
                                        role="tab">Profile Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#update-password" role="tab">Update
                                        Password</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profile-information" role="tabpanel">
                                    <div class="profile-setting">
                                       
                                        <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                                            @csrf
                                            @method('patch')
                                            <ul class="profile-edit-list">
                                                <li class="weight-500 col-md-6">

                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input class="form-control form-control-lg" name="name"
                                                            value="{{ old('name', $user->name) }}" type="text" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control form-control-lg" name="email"
                                                            value="{{ old('email', $user->email) }}" type="email" />
                                                    </div>
                                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                        <div>
                                                            <p class="text-sm mt-2 text-gray-800">
                                                                {{ __('Your email address is unverified.') }}

                                                                <button form="send-verification"
                                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    {{ __('Click here to re-send the verification email.') }}
                                                                </button>
                                                            </p>

                                                            @if (session('status') === 'verification-link-sent')
                                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    @endif

                                                    <div class="form-group mb-0">
                                                        <input type="submit" class="btn btn-primary"
                                                            value="Update Information" />
                                                    </div>
                                                </li>

                                            </ul>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="update-password" role="tabpanel">
                                    <div class="profile-setting">
                                      
                                        <form method="post" action="{{ route('admin.password.update') }}"
                                            class="mt-6 space-y-6">
                                            @csrf
                                            @method('put')

                                            <ul class="profile-edit-list">
                                                <li class="weight-500 col-md-6">

                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <input class="form-control form-control-lg"
                                                            name="current_password"
                                                            value="{{ old('current_password', $user->current_password) }}"
                                                            type="password" autocomplete="current-password" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input class="form-control form-control-lg" name="password"
                                                            type="password" autocomplete="new-password" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input class="form-control form-control-lg"
                                                            name="password_confirmation" type="password"
                                                            autocomplete="new-password" />
                                                    </div>


                                                    <div class="form-group mb-0">
                                                        <input type="submit" class="btn btn-primary"
                                                            value="Update Information" />
                                                    </div>
                                                    @if (session('status') === 'password-updated')
                                                        <p x-data="{ show: true }" x-show="show" x-transition
                                                            x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                                            {{ __('Saved.') }}</p>
                                                    @endif
                                                </li>

                                            </ul>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
