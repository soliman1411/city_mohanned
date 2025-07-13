@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">نظام إدارة المدينة</h1>

    <div class="row">
        <!-- بطاقة إحصائية للمباني -->
        <div class="col-md-4 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">عدد المباني</h5>
                    <p class="card-text display-4">{{ $buildingsCount ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- بطاقة إحصائية للأراضي -->
        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">عدد الأراضي</h5>
                    <p class="card-text display-4">{{ $landsCount ?? 0}}</p>
                </div>
            </div>
        </div>

        <!-- بطاقة إحصائية للمعالم -->
        <div class="col-md-4 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">عدد المعالم</h5>
                    <p class="card-text display-4">{{ $landmarksCount ?? 0}}</p>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('logout')
 <!-- زر تسجيل الخروج مع تنسيق خاص -->
                        <li class="nav-item logout-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
@endsection
