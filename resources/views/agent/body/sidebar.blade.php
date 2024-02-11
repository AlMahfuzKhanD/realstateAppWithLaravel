@php
    $id = Auth::user()->id;
    $agent_info = App\Models\User::findOrFail($id);
    $agent_status = $agent_info->status;
@endphp
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
        AGENT<span>DASHBOARD</span>
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
            </a>
        </li>
        @if ($agent_status == 'active')
        <li class="nav-item nav-category">Real Estate</li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.agent.property') }}" class="nav-link">All Property</a>
                </li>

                
            </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('buy.package') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Buy Package</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Package History</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('agent.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Property Message</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('agent.schedule.request') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Schedule Request</span>
            </a>
        </li>
        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">
            <a href="{{ route('agent.live.chat') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Live Chat</span>
            </a>
        </li>
        

        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
        @else
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
        @endif
        
        </ul>
    </div>
    </nav>
    {{-- <nav class="settings-sidebar">
        <div class="sidebar-body">
            <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
            </a>
            <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="../demo1/dashboard.html">
                <img src="../assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="../demo2/dashboard.html">
                <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
            </div>
        </div>
        </nav> --}}