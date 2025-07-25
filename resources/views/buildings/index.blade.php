@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>إدارة المباني</h1>
        <a href="{{ route('buildings.create') }}" class="btn btn-primary">إضافة مبنى جديد</a>
    </div>

    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">خريطة المباني</div>
                <div class="card-body">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">إحصائيات المباني</div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>عدد المباني الكلي</h5>
                        <p class="display-6">{{ $buildings->count() }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>المباني العالية (أكثر من 5 طوابق)</h5>
                        <p class="display-6">{{ $highBuildingsCount }}</p>
                    </div>
                    <div>
                        <h5>المساحة الإجمالية</h5>
                        <p class="display-6">{{ number_format($totalArea) }} م²</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white">جدول المباني</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الأرض</th>
                            <th>الطوابق</th>
                            <th>المساحة</th>
                            <th>الغرض</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($buildings as $building)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $building->name }}</td>
                            <td>{{ $building->land->code ?? 'غير معين' }}</td>
                            <td>{{ $building->details->floors ?? 'N/A' }}</td>
                            <td>{{ number_format($building->details->area ?? 0) }} م²</td>
                            <td>{{ $building->details->purpose ?? '-' }}</td>
                            <td>
                                <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">لا توجد مباني مسجلة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var map = L.map('map').setView([24.7136, 46.6753], 12); // مركز الرياض

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    @foreach($buildings as $building)
        L.marker([{{ $building->latitude }}, {{ $building->longitude }}])
            .addTo(map)
            .bindPopup("<b>{{ $building->name }}</b><br>طوابق: {{ $building->details->floors ?? 'N/A' }}");
    @endforeach
</script>
@endpush
@endsection
