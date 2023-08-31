@extends('layouts.app')
@section('title', 'Admin/Create-Project')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Crea nuovo Progetto
        </h2>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-6 py-2">

                    <label for="name_project" class="form-label">Nome Progetto:</label>
                    <input type="text" class="form-control" id="name_project" placeholder="Inserisci il nome del progetto"
                        name="name_project">
                </div>
                <div class="col-6 py-2">
                    <label for="type_project" class="form-label">Tech Usata</label>
                    <input type="text" class="form-control" id="type_project"
                        placeholder="Inserisci la tecnologia usata per il progetto" name="type_project">
                </div>
                <div class="col-12 py-2">
                    <label for="url_project" class="form-label">Url GitHub</label>
                    <input type="url" class="form-control" id="url_project"
                        placeholder="Inserisci l'url del tuo progetto" name="url_project">
                </div>
                <div class="col-12 py-2">
                    <label for="description_project" class="form-label">Descrizione</label>
                    <textarea type="url" class="form-control" id="description_project"
                        placeholder="Inserisci la descrizione del tuo progetto" name="description_project"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success my-3">
                <i class="fa-solid fa-circle-plus"></i>
                Crea
            </button>
        </form>
    </div>
@endsection
