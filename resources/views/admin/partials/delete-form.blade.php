<form class="d-inline" action="{{ route('admin.projects.destroy', $project)  }}" method="POST"
    onsubmit="return confirm('Confermi l\'eliminazione del progetto {{ $project->name }}?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" title="delete" type="submit">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</form>
