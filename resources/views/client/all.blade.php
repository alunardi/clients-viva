<!doctype html>
@extends('home')

@section('content')

<div class="content">
    <div class="title-create">
        <a href="/create" class="btn btn-primary">Cadastrar Cliente</a>
    </div>
    @if (count($clients) > 0)
        <table class="table table-hover" border="1">
            <tr class="text-left">
                <th>
                    Nome
                    &nbsp;
                    <a href="/?order=asc&field=name"><i class="fa fa-sort-alpha-asc"></i></a>
                    &nbsp;
                    <a href="/?order=desc&field=name"><i class="fa fa-sort-alpha-desc"></i></a>
                </th>
                <th>
                    Endereço
                    &nbsp;
                    <a href="/?order=asc&field=address"><i class="fa fa-sort-alpha-asc"></i></a>
                    &nbsp;
                    <a href="/?order=desc&field=address"><i class="fa fa-sort-alpha-desc"></i></a>
                </th>
                <th>
                    Telefone
                    &nbsp;
                    <a href="/?order=asc&field=phone"><i class="fa fa-sort-numeric-asc"></i></a>
                    &nbsp;
                    <a href="/?order=desc&field=phone"><i class="fa fa-sort-numeric-desc"></i></a>
                </th>
                <th>
                    Data de Nascimento
                    &nbsp;
                    <a href="/?order=asc&field=birth_date"><i class="fa fa-sort-numeric-asc"></i></a>
                    &nbsp;
                    <a href="/?order=desc&field=birth_date"><i class="fa fa-sort-numeric-desc"></i></a>
                </th>
                <th class="text-center">
                    Status
                </th>
                <th class="text-center">
                    Editar
                </th>
                <th class="text-center">
                    Ativar / Inativar
                </th>
                <th class="text-center">
                    Excluir
                </th>
            </tr>
            @foreach ($clients as $client)
                <tr>
                    <td>
                        {{ $client->name }}
                    </td>
                    <td>
                        {{ $client->address }}
                    </td>
                    <td>
                        {{ $client->phone }}
                    </td>
                    <td>
                        {{ date('d/m/Y', strtotime($client->birth_date)) }}
                    </td>
                    <td class="text-center">
                        {{ $status[$client->status] }}
                    </td>
                    <td class="text-center">
                        <a href="/edit/{{ $client->id }}">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                    </td>
                    @if($client->status === \App\Client::STATUS_ACTIVE)
                    <td class="text-center">
                        <a href="/inactivate/{{ $client->id }}">
                            Inativar
                        </a>
                    </td>
                    @endif
                    @if($client->status === \App\Client::STATUS_INACTIVE)
                        <td class="text-center">
                            <a href="/activate/{{ $client->id }}">
                                Ativar
                            </a>
                        </td>
                    @endif
                    <td class="text-center">
                        <a href="/remove/{{ $client->id }}"
                           onclick="return confirm('Deseja realmente remover esse registro?');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <center>{!! $clients->render() !!}</center>
    @else
        <center>Não existem clientes cadastrados.</center>
    @endif
</div>
<div>
    <a href="/export" class="btn btn-secondary">Exportar XLS</a>
</div>
@endsection
