@extends("layouts.master")
@section("contenu")

  <div class="my-3 p-3 bg-body rounded shadow-sm">

    <h3 class="border-bottom pb-2 mb-2">Ajout d'un nouvel étudiant</h6>
    
    <div class="mt-4">

        @if (session()->has("success"))
          <div class="alert alert-success">
            <p><b>{{ session()->get('success') }}</b></p>
          </div>
        @endif

        @if ($errors->any())

          <div class="alert alert-danger">

            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>

          </div>

        @endif


        <form style="width:65%" method="post" action="{{ route('etudiant.ajouter') }}">

          @csrf

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nom de l'étudiant</label>
              <input type="text" class="form-control" name="Nom" autofocus>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Prénom de l'étudinat</label>
              <input type="text" class="form-control" name="Prénom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Classe de l'étudinat</label>
                <select class="form-control" name="classe_id">
                    <option value=""></option>
                    @foreach ($classes as $classe ) <!-- la variable $classees fait référence à la variable qu'on a créeé dans la méthode create et $classe pour parcourir les éléments de la table classe pcq dans créate on récupéré les éléments de la table classe -->
                        <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @endforeach
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('etudiant') }}"class="btn btn-danger">Annuler</a>
          </form>

    </div>

  </div>

@endsection