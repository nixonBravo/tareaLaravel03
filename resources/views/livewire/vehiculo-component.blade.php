<div>

    <!-- Formulario -->
    <div class="card card-primary" wire:ignore.self>
        <div class="card-header">
            <div class="flex justify-between">
                <h3 class="card-title pt-2">Formulario</h3>
                <button type="button" data-toggle="modal" data-target="#ModalTipo" class="btn btn-primary rounded"
                    style="border: none">Add Tipo</button>
            </div>
        </div>
        <form wire:submit.prevent="store">
            <div class="card-body">
                <div class="form-group">
                    <label for="Tipo">Tipo</label>
                    <select wire:model="tipo_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        @foreach ($tipos as $item)
                            <option value="{{ $item->id }}" selected="selected">{{ $item->tipo }}</option>
                        @endforeach
                    </select>
                    @error('tipo_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" wire:model="description" placeholder="Details"></textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
        @include('livewire.components.modaltipo')
    </div>
    <!-- /.formulario -->


    <!-- Tabla -->
    <div class="row">
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" wire:model="search" name="table_search"
                                class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo</th>
                                <th>Detalle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->tipo->tipo }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#Modal"
                                            wire:click="edit({{ $item->id }})" class="btn btn-primary rounded"
                                            style="border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                        <button type="button" wire:click="delete({{ $item->id }})"
                                            class="btn btn-danger rounded" style="border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($detalles->hasPages())
                        <div class="mx-3 py-2">
                            {{ $detalles->links() }}
                        </div>
                    @endif
                </div>
                @include('livewire.components.modalheader')

                <div class="form-group">
                    <label for="Tipo">Tipo</label>
                    <select wire:model="tipo_id" class="form-control select2" style="width: 100%;">
                        @foreach ($tipos as $item)
                            <option value="{{ $item->id }}" selected="selected">{{ $item->tipo }}</option>
                        @endforeach
                    </select>
                    @error('tipo_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" wire:model="description" placeholder="Details"></textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                @include('livewire.components.modalfooter')
            </div>
        </div>
    </div>
    <!-- /.tabla -->

</div>
