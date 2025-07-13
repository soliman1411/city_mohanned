

<nav class="bg-dark text-white vh-100 p-3" style="width: 250px; box-shadow: 2px 0 10px rgba(0,0,0,0.1);">
    <div class="d-flex flex-column h-100">
        <!-- Header -->
        <div class="mb-4 border-bottom pb-3">
            <h4 class="text-center mb-0" style="font-weight: 600; color: #f8f9fa;">نظام المدينة</h4>
        </div>

        <!-- Menu Items -->
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center py-2 rounded"
                   href="{{ route('dashboard') }}"
                   style="transition: all 0.3s;">
                   <i class="fas fa-home me-2"></i>
                   الرئيسية
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center py-2 rounded"
                   href="{{ route('buildings.index') }}"
                   style="transition: all 0.3s;">
                   <i class="fas fa-building me-2"></i>
                   المباني
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center py-2 rounded"
                   href="{{ route('lands.index') }}"
                   style="transition: all 0.3s;">
                   <i class="fas fa-map-marked-alt me-2"></i>
                   الأراضي
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white d-flex align-items-center py-2 rounded"
                   href="{{ route('landmarks.index') }}"
                   style="transition: all 0.3s;">
                   <i class="fas fa-landmark me-2"></i>
                   المعالم
                </a>
            </li>
        </ul>

        <!-- Logout Button -->
        <div class="mt-auto pt-3 border-top">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100 py-2" style="font-weight: 500;">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    تسجيل الخروج
                </button>
            </form>
        </div>
    </div>
</nav>
