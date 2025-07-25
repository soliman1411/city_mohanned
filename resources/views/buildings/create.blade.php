@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة مبنى جديد</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">خريطة تحديد الموقع</div>
                <div class="card-body">
                    <div id="map" style="height: 400px;"></div>

                    <div class="mt-3">
                        <div class="mb-3">
                            <label for="latitude" class="form-label">خط العرض</label>
                            <input type="text" class="form-control" id="latitude" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">خط الطول</label>
                            <input type="text" class="form-control" id="longitude" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">تفاصيل المبنى</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('buildings.store') }}">
                        @csrf

                        <!-- الإحداثيات الحقيقية المرسلة -->
                        <input type="hidden" name="latitude" id="form-latitude">
                        <input type="hidden" name="longitude" id="form-longitude">

                        <div class="mb-3">
                            <label for="name" class="form-label">اسم المبنى</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="land_id" class="form-label">الأرض</label>
                            <select class="form-select" id="land_id" name="land_id" required>
                                <option value="">اختر الأرض</option>
                                @foreach($lands as $land)
                                <option value="{{ $land->id }}">{{ $land->code }} ({{ $land->type }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="floors" class="form-label">عدد الطوابق</label>
                            <input type="number" class="form-control" id="floors" name="floors" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label">المساحة (م²)</label>
                            <input type="number" step="0.01" class="form-control" id="area" name="area" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label for="purpose" class="form-label">الغرض</label>
                            <input type="text" class="form-control" id="purpose" name="purpose">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ المبنى</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var map = L.map('map').setView([24.7136, 46.6753], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([24.7136, 46.6753], {
        draggable: true
    }).addTo(map);

    function updateCoords(latlng) {
        document.getElementById('latitude').value = latlng.lat;
        document.getElementById('longitude').value = latlng.lng;
        document.getElementById('form-latitude').value = latlng.lat;
        document.getElementById('form-longitude').value = latlng.lng;
    }

    marker.on('dragend', function(e) {
        updateCoords(marker.getLatLng());
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateCoords(e.latlng);
    });

    updateCoords(marker.getLatLng());
</script>
@endpush
@endsection
