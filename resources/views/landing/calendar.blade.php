@extends('landing.layaut')

@section('contenido')
    <section>
        <div class="container py-4">

            <!-- Título -->
            <div class="text-center mb-4">
                <h1 class="text-primary">CALENDARIO</h1>
            </div>

            <!-- Contenedor del calendario -->
            <div class="calendar-container mb-4">
                <div class="bg-white rounded p-3">
                    <div id="calendar"></div>
                </div>
            </div>

            <!-- Detalles del evento -->
            <div class="event-details">
                <h4>Detalles del Evento:</h4>
                <div id="eventoInfo">
                    Haz clic en un evento para ver sus detalles aquí.
                </div>
            </div>

        </div>
    </section>
@endsection