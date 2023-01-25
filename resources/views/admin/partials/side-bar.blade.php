<div class="side-bar">
    <nav class="h-100 w-100 py-3">
        <a class="text-white text-center" href="{{ route('admin.dashboard') }}">
            <div class="logo">
                <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo">
            </div>
        </a>
        <ul class="p-0 mt-5">
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : 'text-white' }}  " href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-column"></i> Dashboard</a>
            </li>
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : 'text-white' }}" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-lightbulb">
                    </i> Progetti</a>
            </li>
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.types.index' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.types.index' ? 'active' : 'text-white' }}" href="{{ route('admin.types.index') }}"><i class="fa-solid fa-flag"></i>
                    Tipologie</a>
            </li>
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.technologies.index' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.technologies.index' ? 'active' : 'text-white' }}" href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-flag"></i>
                    Tecnologie</a>
            </li>
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.projects.projects_types' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.projects.projects_types' ? 'active' : 'text-white' }}" href="{{ route('admin.projects.projects_types') }}"><i
                        class="fa-solid fa-folder-open"></i> Progetti per Tipo</a>
            </li>
            <li class="py-2 px-5 {{ Route::currentRouteName() == 'admin.projects.create' ? 'active' : '' }}">
                <a class="{{ Route::currentRouteName() == 'admin.projects.create' ? 'active' : 'text-white' }}  " href="{{ route('admin.projects.create') }}"><i
                        class="fa-solid fa-folder-plus"></i> Nuovo Progetto</a>
            </li>
        </ul>
    </nav>
</div>
