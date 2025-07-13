@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">تعديل بيانات الأرض</h1>
    
    <form action="{{ route('lands.update', $land->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="code">الكود</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $land->code) }}" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="area">المساحة</label>
            <input type="number" step="0.01" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $land->area) }}" required>
            @error('area')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="type">النوع</label>
            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                <option value="">اختر النوع</option>
                <option value="سكني" {{ old('type', $land->type) == 'سكني' ? 'selected' : '' }}>سكني</option>
                <option value="تجاري" {{ old('type', $land->type) == 'تجاري' ? 'selected' : '' }}>تجاري</option>
                <option value="زراعي" {{ old('type', $land->type) == 'زراعي' ? 'selected' : '' }}>زراعي</option>
                <option value="صناعي" {{ old('type', $land->type) == 'صناعي' ? 'selected' : '' }}>صناعي</option>
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>
        <a href="{{ route('lands.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> رجوع
        </a>
    </form>
</div>
@endsection