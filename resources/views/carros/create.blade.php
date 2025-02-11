@extends('templates.main', ['titulo' => "Novo Carro"])

@section('titulo') Carros @endsection

@section('conteudo')

<form action="{{ route('carros.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input 
                    type="text" 
                    class="form-control @if($errors->has('placa')) is-invalid @endif" 
                    name="placa" 
                    placeholder="Placa"
                    value="{{old('placa')}}"
                />
                <label for="placa">Placa do carro</label>
                @if($errors->has('placa'))
                <div class='invalid-feedback'>
                    {{ $errors->first('placa') }}
                </div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <select 
                    class="form-control @if($errors->has('modelo_id')) is-invalid @endif" 
                    name="modelo_id" 
                    placeholder="Modelo"
                    value="{{ old('modelo_id') }}">

                    <option value="">Selecione um modelo</option>
                    
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}" {{ old('modelo_id') == $modelo->id ? 'selected' : '' }}>
                            {{ $modelo->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="modelo_id">Modelo do carro</label>
                @if($errors->has('modelo_id'))
                <div class='invalid-feedback'>
                    {{ $errors->first('modelo_id') }}
                </div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <select 
                    class="form-control @if($errors->has('cor_id')) is-invalid @endif" 
                    name="cor_id" 
                    placeholder="Cor"
                    value="{{ old('cor_id') }}">

                    <option value="">Selecione uma cor</option>
                    
                    @foreach($cores as $cor)
                        <option value="{{ $cor->id }}" {{ old('cor_id') == $cor->id ? 'selected' : '' }}>
                            {{ $cor->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="cor_id">Cor do carro</label>
                @if($errors->has('cor_id'))
                <div class='invalid-feedback'>
                    {{ $errors->first('cor_id') }}
                </div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <select 
                    class="form-control @if($errors->has('estado_id')) is-invalid @endif" 
                    name="estado_id" 
                    placeholder="Estado"
                    value="{{ old('estado_id') }}">

                    <option value="">Selecione um estado (UF)</option>
                    
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="estado_id">Estado do carro (UF)</label>
                @if($errors->has('estado_id'))
                <div class='invalid-feedback'>
                    {{ $errors->first('estado_id') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('carros.index')}}" class="btn btn-secondary btn-block align-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Voltar
            </a>
            <a href="javascript:document.querySelector('form').submit();" class="btn btn-success btn-block align-content-center">
                Confirmar &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </a>
        </div>
    </div>
</form>

@endsection