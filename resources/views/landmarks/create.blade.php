@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة معلم جديد</h1>

    <form action="{{ route('landmarks.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">اسم المعلم</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="type">نوع المعلم</label>
            <select class="form-control" id="type" name="type" required>
                <option value="">اختر النوع</option>
                <option value="تاريخي">تاريخي</option>
                <option value="ديني">ديني</option>
                <option value="طبيعي">طبيعي</option>
                <option value="ترفيهي">ترفيهي</option>
                <option value="ثقافي">ثقافي</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitude">خط العرض</label>
                    <input type="number" step="0.000001" class="form-control" id="latitude" name="latitude" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitude">خط الطول</label>
                    <input type="number" step="0.000001" class="form-control" id="longitude" name="longitude" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> حفظ
        </button>
        <a href="{{ route('landmarks.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> رجوع
        </a>
    </form>
</div>
@endsection