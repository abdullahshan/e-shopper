<nav class="side-nav">
    <a href="index.html" class="intro-x d-flex align-items-center ps-5 pt-4">
        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="http://127.0.0.1:8000/backend/dist/images/logo.svg">
        <span class="d-none d-xl-block text-white fs-lg ms-3"> Ru<span class="fw-medium">bick</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dashboard.home') }}" class="side-menu {{ request()->routeIs('dashboard.home') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard 
                 
                </div>
            </a>
           
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('category*') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Category 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('category.add') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> add category </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('subcategory*') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Category 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('subcategory.add') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> add subcategory </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('post*') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    post 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('post.add') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> add post </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('banner*') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    banner 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('banner.view') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> add banner </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('collection*') ? 'side-menu--active side-menu--open' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    banner 
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('collection.add') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> add catalogue </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>