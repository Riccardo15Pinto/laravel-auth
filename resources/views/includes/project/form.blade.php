@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
@endif
@csrf
<div class="row">
    <div class="col-6 py-2">
        <label for="name_project" class="form-label">Nome Progetto:</label>
        <input type="text"
            class="form-control @error('name_project') is-invalid @elseif(old('name_project')) is-valid @enderror"
            id="name_project" placeholder="Inserisci il nome del progetto" name="name_project"
            value="{{ old('name_project', $project->name_project ?? '') }}">
        @error('name_project')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-6 py-2">
        <label for="type_project" class="form-label">Tech Usata</label>
        <input type="text"
            class="form-control @error('type_project') is-invalid @elseif(old('type_project')) is-valid @enderror"
            id="type_project" placeholder="Inserisci la tecnologia usata per il progetto" name="type_project"
            value="{{ old('type_project', $project->type_project ?? '') }}">
        @error('type_project')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-12 py-2">
        <label for="url_project" class="form-label">Url GitHub</label>
        <input type="url"
            class="form-control @error('url_project') is-invalid @elseif(old('url_project')) is-valid @enderror"
            id="url_project" placeholder="Inserisci l'url del tuo progetto" name="url_project"
            value="{{ old('url_project', $project->url_project ?? '') }}">
        @error('url_project')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-12 py-2">
        <label for="description_project" class="form-label">Descrizione</label>
        <textarea type="url"
            class="form-control @error('description_project') is-invalid @elseif(old('description_project')) is-valid @enderror"
            id="description_project" placeholder="Inserisci la descrizione del tuo progetto" name="description_project">{{ old('description_project', $project->description_project ?? '') }}</textarea>
        @error('description_project')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-9 py-2">
        <label for="image" class="form-label">Logo</label>
        <input type="file"
            class="form-control @error('image') is-invalid @elseif(old('image')) is-valid @enderror"
            id="image" placeholder="Inserisci un logo per il tuo progetto" name="image"
            value="{{ old('image', $project->image ?? '') }}">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-3 py-2">
        <img src="https://marcolanci.it/utils/placeholder.jpg" alt="preview-logo" id="image-preview"
            style="width: 150px;">
    </div>
</div>
<button type="submit" class="btn btn-success my-3">
    <i class="fa-regular fa-floppy-disk"></i>
    Save
</button>
</form>
