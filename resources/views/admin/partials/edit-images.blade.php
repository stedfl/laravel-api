<!-- Modal -->
<div class="modal fade" id="modal-{{ "$entity-$technology->id" }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica {{ "$entity: $technology->name" }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <input class="w-100 border-0" type="text" name="{{ $entity }}" value="{{$technology->$entity}}"
                        placeholder="Inserisci un url valido">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button class="btn btn-success" type="submit">
                        Invia
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
