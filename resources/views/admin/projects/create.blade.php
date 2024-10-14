@extends('layouts.dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Aggiungi un nuovo progetto</h2>
        </div>
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gy-3">
                    <div class="col-12">
                        <label for="" class="control-label">Nome progetto</label>
                        <input type="text" name="name" id=""
                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                            placeholder="Nome progetto" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="" class="control-label">Immagine</label>
                        <input type="file" name="image" id="image" class="form-control form-control-sm">
                    </div>
                    <div class="col-12">
                        <label for="" class="control-label">Tipologia di progetto</label>
                        <select name="type_id" id="" class="form-select form-select-sm" required>
                            <option value="">-Seleziona-</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>{{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="" class="control-label">Seelziona le tecnologie</label>
                        <div>
                            @foreach ($technologies as $technology)
                            <div class="form-check-inline">
                                <input type="checkbox" name="technologies[]" id="" class="form-check-inline" {{-- le []
                                    nel name consentono di prendere tutti gli oggetti nell'array. Se omesse, verrà
                                    visualizzato solo l'ultimo elemento dell'array --}} value="{{ $technology->id }}" {{
                                    is_array(old('technologies')) && in_array($technology->id, old('technologies')) ?
                                'checked' : '' }}
                                {{-- al posto dell'operatore ternario si può scrivere @checked --}}
                                {{-- @checked(is_array(old('technologies')) && in_array($technology->id,
                                old('technologies'))) --}}
                                >
                                <label class="form-check-label">{{ $technology->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="" class="control-label">Sommario progetto</label>
                        <textarea name="summary" id="" cols="30" rows="10" class="form-control form-control-sm"
                            placeholder="Nome progetto">{{ old('summary') }}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-success">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection