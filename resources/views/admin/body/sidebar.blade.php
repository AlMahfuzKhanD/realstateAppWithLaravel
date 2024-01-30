<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        ADMIN<span>DASHBOARD</span>
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
        <li class="nav-item nav-category">Real Estate</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="state">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property State</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="state">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.state') }}" class="nav-link">All State</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.state') }}" class="nav-link">Add State</a>
                </li>
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#testimonial" role="button" aria-expanded="false" aria-controls="testimonial">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Testimonial Manage</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="testimonial">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.testimonial') }}" class="nav-link">All Testimonial</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.testimonial') }}" class="nav-link">Add Testimonial</a>
                </li>
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="type">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="type">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                </li>
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="amenities">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Amenitie</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenities">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.amenitie') }}" class="nav-link">All Amenitie</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.amenitie') }}" class="nav-link">Add Amenitie</a>
                </li>
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.property') }}" class="nav-link">All Property</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.property') }}" class="nav-link">Add Property</a>
                </li>
                
            </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('admin.package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Package History</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Property Message</span>
            </a>
        </li>
        <li class="nav-item nav-category">All User Function</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Manage Agent</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.agent') }}" class="nav-link">All Agent</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.agent') }}" class="nav-link">Add Agent</a>
                </li>
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blog_category" role="button" aria-expanded="false" aria-controls="blog_category">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Blog Category</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="blog_category">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.blog.category') }}" class="nav-link">Blog Category</a>
                </li>
                
                
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Advanced UI</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                </li>
                <li class="nav-item">
                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                </li>
                
            </ul>
            </div>
        </li>
        

        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
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