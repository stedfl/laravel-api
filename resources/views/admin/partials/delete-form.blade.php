<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $project->id }}">
    <i class="fa-solid fa-trash-can"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminazione Progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Confermi l'eliminazione del progetto <span class="fw-bolder text-capitalize">{{ $project->name }}</span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form class="d-inline" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" title="delete" type="submit">
                        Conferma
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
