@php
    $segmentOne = request()->segment(1);
    $segmentTwo = request()->segment(2);
    $segmentThree = request()->segment(3);
@endphp
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{url("/")}}" class="logo logo-dark">
            <span class="logo-sm">
                <h3 class="mt-1">SVY</h3>
            </span>
            <span class="logo-lg">
                <h3 class="my-1" style="padding: 13.5px 0;">Savvy</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{($segmentOne==null)?"active":""}}" href="{{url("/")}}">
                        <i class="las la-house-damage"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="t-pages">Users</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{($segmentOne=="users")?"active":""}}" href="#management-users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="management-users">
                        <i class="las la-user-tie"></i>
                        <span data-key="t-invoices">Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{($segmentOne=="users")?"show":""}}" id="management-users">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route("users.create")}}" class="nav-link {{($segmentOne == "users" && $segmentTwo=="create")?"active":""}}" data-key="t-invoice"> Add User </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("users")}}" class="nav-link {{($segmentOne == "users" && ($segmentTwo==null || $segmentThree=="edit"))?"active":""}}" data-key="t-invoice"> Users </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{($segmentOne=="website-users" || $segmentOne=="auth-apis")?"active":""}}" href="#website-users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="website-users">
                        <i class="las la-globe"></i>
                        <span data-key="t-authentication">Website</span>
                    </a>
                    <div class="collapse menu-dropdown {{($segmentOne=="website-users" || $segmentOne=="auth-apis")?"show":""}}" id="website-users">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url("website-users")}}" class="nav-link {{($segmentOne == "website-users")?"active":""}}" data-key="t-signup">Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route("users.auth.apis")}}" class="nav-link {{($segmentOne == "auth-apis")?"active":""}}" data-key="t-signup">APIs Guide</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route("contact.us")}}" class="nav-link {{($segmentOne == "contact-us")?"active":""}}" data-key="t-signup"><i class="lab la-rocketchat"></i> Contact Messages</a>
                </li>
                <li class="nav-item">
                    <a href="{{route("subscribers")}}" class="nav-link {{($segmentOne == "subscribers")?"active":""}}" data-key="t-signup"><i class="lab la-rocketchat"></i> Subscribers</a>
                </li>
                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="t-pages">Products</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{($segmentOne=="product-categories" || $segmentOne=="product-sub-categories")?"active":""}}" href="#product-categories" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="product-categories">
                        <i class="las la-list"></i>
                        <span data-key="t-authentication">Categories</span>
                    </a>
                    <div class="collapse menu-dropdown {{($segmentOne=="product-categories" || $segmentOne=="product-sub-categories")?"show":""}}" id="product-categories">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url("product-categories")}}" class="nav-link {{($segmentOne == "product-categories")?"active":""}}" data-key="t-signup">Parent Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("product-sub-categories")}}" class="nav-link {{($segmentOne == "product-sub-categories")?"active":""}}" data-key="t-signup">Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{($segmentOne=="products" || $segmentOne=="product-sections" || $segmentOne=="product-colors")?"active":""}}" href="#products" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="products">
                        <i class="lab la-product-hunt"></i>
                        <span data-key="t-authentication">Products</span>
                    </a>
                    <div class="collapse menu-dropdown {{($segmentOne=="products" || $segmentOne=="product-sections" || $segmentOne=="product-colors")?"show":""}}" id="products">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url("product-sections")}}" class="nav-link {{($segmentOne == "product-sections")?"active":""}}" data-key="t-signin">Sections</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("product-colors")}}" class="nav-link {{($segmentOne == "product-colors")?"active":""}}" data-key="t-signin">Colors</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("products")}}" class="nav-link {{($segmentOne == "products")?"active":""}}" data-key="t-signup">Products</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{url("products-apis")}}" class="nav-link {{($segmentOne == "products-apis")?"active":""}}" data-key="t-signup"><i class="lab la-accessible-icon"></i> APIs Guide</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
