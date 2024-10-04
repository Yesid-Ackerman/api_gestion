@extends('layouts.layout')

@section('content')
<h1>Listado de Transacciones</h1>
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Monto</th>
            <th>Razón</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->date }}</td>
            <td>{{ $transaction->type }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->reason }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
