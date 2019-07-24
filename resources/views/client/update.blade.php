@section('title', 'Editar Cliente')

@extends('home')

@section('content')

<div class="row">
    <form method="POST" action="/update/{{ $client->id }}" enctype="multipart/form-data">
        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }}
        <h3>Editar Cliente</h3>
        <div class="col-sm-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nome</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $client->name }}"
                       autofocus>
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">Endereço</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ $client->address }}"
                       autofocus>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">Telefone</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $client->phone }}"
                       autofocus>
            </div>
            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                <label for="birth_date">Data de Nascimento</label>
                <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ $client->birth_date }}"
                       autofocus>
            </div>
            <input id="status" type="hidden" class="form-control" name="status" value="{{ $client->status }}" autofocus>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">
                    Editar Cliente
                </button>
                <a href="/" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </form>
</div>
<hr>
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
<script>
    $("input[id='phone']").inputmask({
        mask: ['(99) 9 9999-9999'],
        keepStatic: true
    });
</script>
@endsection

