<div class="side-bar">
    <nav class="h-100 w-100 px-5 py-3">
        <a class="text-white text-center" href="{{ route('admin.dashboard') }}">
            <div class="logo">
                <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo">
            </div>
        </a>
        <ul class="p-0 mt-5">
            <li class="my-2">
                <a class="text-white " href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-column"></i> Dashboard</a>
            </li>
            <li class="my-2">
                <a class="text-white " href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-lightbulb">
                    </i> Progetti</a>
            </li>
            <li class="my-2">
                <a class="text-white " href="{{ route('admin.projects.projects_types') }}"><i class="fa-solid fa-flag"></i> Progetti per Tipo</a>
            </li>
            <li class="my-2">
                <a class="text-white " href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-folder-plus"></i> Nuovo Progetto</a>
            </li>
        </ul>
    </nav>
</div>
