@extends("layouts.master")
@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">

    <h3 class="border-bottom pb-2 mb-2">Liste des étudiants inscrits</h6>

    <div class="mt-4">
        <div class="d-flex justify-content-between mb-4">
        {{ $etudiants->links() }} <!-- pour afficher les bouttons de pagination -->
        <div><a href="{{ route('etudiant.create') }}" class="btn btn-info btn-lg">Ajouter un nouvel étudiant</a></div>
        </div>

        @if (session()->has("successDelete"))
          <div class="alert alert-success">
            <p><b>{{ session()->get('successDelete') }}</b></p>
          </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant) <!--$etudiant c la variable qui va récupérer les données du tableau et $etudiants c notre collection -->
                <tr>
                <th scope="row">{{ $loop->index + 1}}</th> <!-- cette variable est dispo pour accéder à l'index pour afficher des numéros au lieu d'afficher l'id est la $loop qui point bien evidement sur index-->
                <td>{{ $etudiant->Nom }}</td>
                <td>{{ $etudiant->Prénom }}</td>
                <td>{{ $etudiant->classe->libelle }}</td>
                <td>
                    <a href="{{ route('etudiant.edit', ['etudiant'=>$etudiant->id]) }}" class="btn btn-success">Editer</a>
                    
                    <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant')){document.getElementById('form-{{ $etudiant->id }}').submit();}">Supprimer</a>
                    <form method="post" id="form-{{ $etudiant->id }}" action="{{ route('etudiant.supprimer', ['etudiant'=>$etudiant->id]) }}">
                    @csrf
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>

@endsection