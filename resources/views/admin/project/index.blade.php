@extends('layouts.app')
@section('title', 'Admin/Projects')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetti
        </h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Repository</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Tech usata</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name_project }}</td>
                        <td>
                            <a href="{{ $project->url_project }}">Vedi progetto su GitHub</a>
                        </td>
                        <td>{{ $project->description_project }}</td>
                        <td>{{ $project->type_project }}</td>
                        <td>
                            <div class="d-flex">

                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-warning me-2">
                                    <i class="fa-solid fa-pen-nib"></i>
                                </a>

                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                    class="delete-form" data-name="{{ $project->name_project }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
                            <h3>Non ci sono progetti</h3>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/delete-form.js')
@endsection
