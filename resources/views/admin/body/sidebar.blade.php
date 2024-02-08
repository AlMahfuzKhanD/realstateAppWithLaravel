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
        @if (Auth::user()->can('state.menu'))
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
        @endif
        @if (Auth::user()->can('testimonial.menu'))
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
        @endif
        @if (Auth::user()->can('type.menu'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="type">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="type">
            <ul class="nav sub-menu">
                @if (Auth::user()->can('all.type'))
                <li class="nav-item">
                <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                </li>
                @endif
                @if (Auth::user()->can('add.type'))
                <li class="nav-item">
                <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                </li>
                @endif
                
            </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->can('amenities.menu'))
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
        @endif
        @if (Auth::user()->can('property.menu'))
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
        @endif
        @if (Auth::user()->can('history.menu'))
        <li class="nav-item">
            <a href="{{ route('admin.package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Package History</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->can('message.menu'))
        <li class="nav-item">
            <a href="{{ route('admin.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Property Message</span>
            </a>
        </li>
        @endif
        <li class="nav-item nav-category">All User Function</li>
        @if (Auth::user()->can('agent.menu'))
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
        @endif
        @if (Auth::user()->can('post.menu'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blog_post" role="button" aria-expanded="false" aria-controls="blog_post">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Blog Post</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="blog_post">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.post') }}" class="nav-link">All Post</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add.post') }}" class="nav-link">Add Post</a>
                    </li>
                
            </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->can('category.menu'))
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
        @endif
        @if (Auth::user()->can('comment.menu'))
        <li class="nav-item">
            <a href="{{ route('admin.blog.comment') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Blog Comment</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->can('smtp.menu'))
        <li class="nav-item">
            <a href="{{ route('admin.smtp.setting') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Smtp Setting</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->can('site.menu'))
        <li class="nav-item">
            <a href="{{ route('admin.site.setting') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Site Setting</span>
            </a>
        </li>
        @endif
        <li class="nav-item nav-category">Role And Permission</li>
        @if (Auth::user()->can('role.menu'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Role And Permission</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.permission') }}" class="nav-link">All Permission</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('all.roles') }}" class="nav-link">All Roles</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('assign.permission') }}" class="nav-link">Assign Permission</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('all.assigned.permission') }}" class="nav-link">All Assigned Permission</a>
                </li>
                
            </ul>
            </div>
        </li>
        @endif
        @if (Auth::user()->can('admin.menu'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#adminUser" role="button" aria-expanded="false" aria-controls="adminUser">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Manage Admin User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="adminUser">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.admin.user') }}" class="nav-link">All Admin User</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.admin.user') }}" class="nav-link">Add Admin User</a>
                </li>
                
                
            </ul>
            </div>
        </li>
        @endif
        

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
    