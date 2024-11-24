@extends('backend.layouts.master')

@section('container')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Hospitality Care Category</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Hospitality Care Category List
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a class="btn btn-primary " href="{{ route('admin.hospitalityCategory.index') }}" role="button">
                            Back
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="pd-20 card-box mb-30">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('admin.hospitalityCategory.update', $hospitalityCategory) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 row">
                    <div class="form-group col-md-6">
                        <label>Main Category</label>
                        <select class="custom-select2 form-control" name="main_category_id"
                            style="width: 100%; height: 38px">
                            <option value="">Choose Main Category</option>
                            @foreach ($mainCategories as $maincategory)
                                <option value="{{ $maincategory->id }}"
                                    {{ old('mian_category_id', $hospitalityCategory->main_category_id) == $maincategory->id ? 'selected' : '' }}>
                                    {{ $maincategory->title_en }}

                                </option>
                            @endforeach


                        </select>
                        <span class="text-warning">
                            @error('main_category_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Type</label>
                        <select class="custom-select2 form-control" name="type"
                            style="width: 100%; height: 38px">
                          
                            <option value="">Choose type</option>
                            <option value="Star-Hotels" {{ old('type', $hospitalityCategory->type) == 'Star-Hotels' ? 'selected' : '' }}>Star-Hotels</option>
                            <option value="Hotels" {{ old('type', $hospitalityCategory->type) == 'Hotels' ? 'selected' : '' }}>Hotels</option>
                            <option value="Resturant" {{ old('type', $hospitalityCategory->type) == 'Resturant' ? 'selected' : '' }}>Resturant</option>
                            <option value="Cafe" {{ old('type', $hospitalityCategory->type) == 'Cafe' ? 'selected' : '' }}>Cafe</option>
                        </select>
                        <span class="text-warning">
                            @error('type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-6">
                        <label for="title_en">English Title</label>
                        <input class="form-control" id="title_en" name="title_en"
                            value="{{ old('title_en', $hospitalityCategory->title_en) }}" type="text" />
                        <span class="text-warning">
                            @error('title_en')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label for="title_ne">Nepali Title</label>
                        <input class="form-control" id="title_ne" name="title_ne" type="text"
                            value="{{ old('title_ne', $hospitalityCategory->title_ne) }}" placeholder="Nepali title" />
                        <span class="text-warning">
                            @error('title_ne')
                                {{ $message }}
                            @enderror
                        </span>
                    </div> --}}

                </div>
                <div class="col-md-12 row">
                    {{-- <div class="form-group col-md-6">
                        <label for="icon">Icon</label>
                        <input class="form-control" id="icon" name="icon" type="text"
                            value="{{ old('icon', $hospitalityCategory->icon) }}" placeholder="Icon Url" />
                        <span class="text-warning">
                            @error('icon')
                                {{ $message }}
                            @enderror
                        </span>
                    </div> --}}
                    <div class="form-group col-md-6">
                        <label for="slug">Slug</label>
                        <input class="form-control" id="slug" name="slug" type="text"
                            value="{{ old('slug', $hospitalityCategory->slug) }}" placeholder="Slug" />
                        <span class="text-warning">
                            @error('slug')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="position">Position</label>
                    <input class="form-control" id="position" name="position" type="text"
                        value="{{ old('position', $hospitalityCategory->position) }}" placeholder="position" />
                    <span class="text-warning">
                        @error('position')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div>
                    <button class="btn btn-danger" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>

@endsection
