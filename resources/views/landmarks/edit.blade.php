@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تعديل المعلم: {{ $landmark->name }}</h1>

    <form action="{{ route('landmarks.update', $landmark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم المعلم</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $landmark->name }}" required>
        </div>

        <div class="form-group">
            <label for="type">نوع المعلم</label>
            <select class="form-control" id="type" name="type" required>
                <option value="تاريخي" {{ $landmark->type == 'تاريخي' ? 'selected' : '' }}>تاريخي</option>
                <option value="ديني" {{ $landmark->type == 'ديني' ? 'selected' : '' }}>ديني</option>
                <option value="طبيعي" {{ $landmark->type == 'طبيعي' ? 'selected' : '' }}>طبيعي</option>
                <option value="ترفيهي" {{ $landmark->type == 'ترفيهي' ? 'selected' : '' }}>ترفيهي</option>
                <option value="ثقافي" {{ $landmark->type == 'ثقافي' ? 'selected' : '' }}>ثقافي</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitude">خط العرض</label>
                    <!-- حقل خط العرض -->
<input type="number" step="0.000001" class="form-control" id="latitude" name="latitude"
       value="{{ $landmark->location ? trim(explode(',', $landmark->location)[0]) : '' }}" required>


            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitude">خط الطول</label>
                  <!-- حقل خط الطول -->
<input type="number" step="0.000001" class="form-control" id="longitude" name="longitude"
       value="{{ $landmark->location ? trim(explode(',', $landmark->location)[1]) : '' }}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $landmark->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>
        <a href="{{ route('landmarks.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> رجوع
        </a>
    </form>
</div>
@endsection
