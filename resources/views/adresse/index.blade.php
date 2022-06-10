<!-- resources/views/adresse/index.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        @extends('components.navigation')
        <h1>All Adresse</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Name</td>
                <td>Kunde</td>
                <td>Land</td>
                <td>PLZ</td>
                <td>Ort</td>
                <td>Email</td>
                <td>Projekt</td>
                <td>Ansprechpartner</td>
                <td>Telefon</td>
                <td>Mobile</td>
                <td>Menü</td>
            </tr>
            </thead>
            <tbody>
            @foreach($adresse as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->kundennummer }}</td>
                    <td>{{ $value->land }}</td>
                    <td>{{ $value->plz }}</td>
                    <td>{{ $value->ort }}</td>
                    <td>{{ $value->email }}</td>
                    @if($value->projekt == 0)
                    <td>alle</td>
                    @elseif(!$value->projekt == 0)
                    <td>{{ $value->projekt }}</td>
                    @endif
                    <td>{{ $value->ansprechpartner }}</td>
                    <td>{{ $value->telefon }}</td>
                    <td>{{ $value->mobil }}</td>
                    <!-- we will also add show, edit, and delete buttons -->

                    <td>
                        <!-- edit this adress (uses the edit method found at GET /adresse/{id}/edit -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('/adresserolle/adresse/' . $value->id) }}">Rolle</a>

                        <!-- edit this adress (uses the edit method found at GET /adresse/{id}/edit -->
                        <a class="btn btn-danger" href="{{ URL::to('adresse/' . $value->id . '/edit') }}">Bearbeiten</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $adresse->render() !!}
    </div>
@endsection
@extends('components.footer')



