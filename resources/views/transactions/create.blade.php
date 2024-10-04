@extends('layouts.layout')

@section('content')
<h1>Agregar Transacción</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
    <label for="date">Fecha:</label>
    <input type="date" name="date" required>

    <label for="type">Tipo:</label>
    <select name="type" required>
        <option value="Ingreso">Ingreso</option>
        <option value="Egreso">Egreso</option>
    </select>

    <label for="amount">Monto:</label>
    <input type="number" name="amount" step="0.01" required>

    <label for="reason">Razón:</label>
    <input type="text" name="reason" required>

    <button type="submit">Guardar</button>
</form>
@endsection
