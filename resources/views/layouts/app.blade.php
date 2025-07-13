<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>City Maps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* تنسيقات مخصصة للقائمة الجانبية */
        .sidebar {
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding-top: 20px;
        }

        .sidebar .nav-item {
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-item:hover {
            background-color: #e9ecef;
        }

        .sidebar .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }

        .sidebar .nav-link:hover:not(.active) {
            color: #0d6efd;
        }

        /* تعديل المحتوى الرئيسي ليتناسب مع القائمة الثابتة */
        main {
            margin-right: 16.666667%; /* يتناسب مع عرض القائمة الجانبية */
            padding: 20px;
        }

        /* تنسيق زر تسجيل الخروج */
        .logout-item {
            margin-top: 20px;
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
        }

        .logout-item .nav-link {
            color: #dc3545;
        }

        .logout-item .nav-link:hover {
            color: #fff;
            background-color: #dc3545;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- القائمة الجانبية المحسنة -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard') }}">
                                <i class="fas fa-home me-2"></i>  الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('buildings.index') }}">
                                <i class="fas fa-building me-2"></i> المباني
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('lands.index') }}">
                                <i class="fas fa-map-marked-alt me-2"></i> الأراضي
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('landmarks.index') }}">
                                <i class="fas fa-monument me-2"></i> المعالم
                            </a>
                        </li>
                       @yield('logout')
                    </ul>
                </div>
            </nav>

            <!-- المحتوى الرئيسي -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- إضافة Font Awesome للأيقونات -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
