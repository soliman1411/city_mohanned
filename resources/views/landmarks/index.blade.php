@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">قائمة المعالم</h1>

    <div class="mb-3">
        <a href="{{ route('landmarks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة معلم جديد
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>النوع</th>
                    <th>الإحداثيات</th>
                    <th>الوصف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($landmarks as $index => $landmark)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $landmark->name }}</td>
                    <td>{{ $landmark->type }}</td>
                    <td>
                      @php
    $coordinates = explode(',', $landmark->location);
    $lat = trim($coordinates[0]);
    $lng = trim($coordinates[1]);
@endphp

{{ $lat }}, {{ $lng }}
                    </td>
                    <td>{{ Str::limit($landmark->description, 50) }}</td>
                    <td>
                        <a href="{{ route('landmarks.edit', $landmark->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                        <form action="{{ route('landmarks.destroy', $landmark->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                <i class="fas fa-trash"></i> حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
