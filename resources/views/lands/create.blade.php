@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة أرض جديدة</h1>
    
    <div class="card">
        <div class="card-header bg-primary text-white">بيانات الأرض</div>
        <div class="card-body">
            <form method="POST" action="{{ route('lands.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="code" class="form-label">كود الأرض</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                
                <div class="mb-3">
                    <label for="area" class="form-label">المساحة (م²)</label>
                    <input type="number" step="0.01" class="form-control" id="area" name="area" min="0" required>
                </div>
                
                <div class="mb-3">
                    <label for="type" class="form-label">نوع الأرض</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="">اختر النوع</option>
                        <option value="سكنية">سكنية</option>
                        <option value="تجارية">تجارية</option>
                        <option value="زراعية">زراعية</option>
                        <option value="صناعية">صناعية</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">الوصف</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">حفظ الأرض</button>
            </form>
        </div>
    </div>
</div>
@endsection