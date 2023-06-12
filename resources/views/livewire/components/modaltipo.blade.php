<div class="modal fade" wire:ignore.self id="ModalTipo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="clear">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" wire:model="tipo" placeholder="Tipo">
                    @error('tipo')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="clear">Close</button>
                <button type="button" class="btn btn-success" wire:click.prevent="insert" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
