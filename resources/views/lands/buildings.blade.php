@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">المباني على الأرض: {{ $land->code }}</h1>
    
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
                <div class="card-header bg-secondary text-white">معلومات الأرض</div>
                <div class="card-body">
                    <p><strong>الكود:</strong> {{ $land->code }}</p>
                    <p><strong>النوع:</strong> {{ $land->type }}</p>
                    <p><strong>المساحة:</strong> {{ $land->area }} م²</p>
                    <p><strong>عدد المباني:</strong> {{ $buildings->count() }}</p>
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
                            <th>الطوابق</th>
                            <th>المساحة</th>
                            <th>الغرض</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buildings as $building)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $building->name }}</td>
                            <td>{{ $building->details->floors }}</td>
                            <td>{{ $building->details->area }} م²</td>
                            <td>{{ $building->details->purpose ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize the map
    var map = L.map('map').setView([24.7136, 46.6753], 12); // مركز الرياض
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Add building markers
    @foreach($buildings as $building)
    L.marker([{{ $building->location->getLat() }}, {{ $building->location->getLng() }}])
        .addTo(map)
        .bindPopup("<b>{{ $building->name }}</b><br>طوابق: {{ $building->details->floors }}");
    @endforeach
</script>
@endpush
@endsection