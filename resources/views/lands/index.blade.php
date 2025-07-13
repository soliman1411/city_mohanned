@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>إدارة الأراضي</h1>
        <a href="{{ route('lands.create') }}" class="btn btn-primary">إضافة أرض جديدة</a>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">جدول الأراضي</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الكود</th>
                                    <th>النوع</th>
                                    <th>المساحة (م²)</th>
                                    <th>عدد المباني</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lands as $land)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $land->code }}</td>
                                    <td>{{ $land->type }}</td>
                                    <td>{{ $land->area }}</td>
                                    <td>{{ $land->buildings_count }}</td>
                                    <td>
                                        <a href="{{ route('lands.edit', $land->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                                        <form action="{{ route('lands.destroy', $land->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                        </form>
                                        <a href="{{ route('lands.buildings', $land->id) }}" class="btn btn-sm btn-info">عرض المباني</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">إحصائيات الأراضي</div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>عدد الأراضي الكلي</h5>
                        <p class="display-6">{{ $lands->count() ?? 0}}</p>
                    </div>
                    <div class="mb-3">
                        <h5>المساحة الإجمالية</h5>
                        <p class="display-6">{{ $totalArea ?? 0}} م²</p>
                    </div>
                    <div>
                        <h5>الأراضي الكبيرة (>5000 م²)</h5>
                        <p class="display-6">{{ $largeLandsCount ?? 0}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
