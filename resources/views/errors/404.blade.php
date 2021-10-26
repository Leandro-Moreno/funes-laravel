@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Funes - Repositorio Digital de Documentos Matemáticos - Inicio')])
@section('content')
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <defs>
            <radialGradient id="Gradient1" cx="50%" cy="50%" fx="50%" fy="50%" r=".5">
                <animate attributeName="fx" dur="34s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(255, 0, 255, 1)"/>
                <stop offset="100%" stop-color="rgba(255, 0, 255, 0)"/>
            </radialGradient>
            <radialGradient id="Gradient2" cx="50%" cy="50%" fx="10%" fy="50%" r=".5">
                <animate attributeName="fx" dur="23.5s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(255, 255, 0, 1)"/>
                <stop offset="100%" stop-color="rgba(255, 255, 0, 0)"/>
            </radialGradient>
            <radialGradient id="Gradient3" cx="50%" cy="50%" fx="50%" fy="50%" r=".5">
                <animate attributeName="fx" dur="21.5s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(0, 255, 255, 1)"/>
                <stop offset="100%" stop-color="rgba(0, 255, 255, 0)"/>
            </radialGradient>

            <radialGradient id="Gradient4" cx="50%" cy="50%" fx="50%" fy="50%" r=".5">
                <animate attributeName="fx" dur="23s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(0, 255, 0, 1)"/>
                <stop offset="100%" stop-color="rgba(0, 255, 0, 0)"/>
            </radialGradient>
            <radialGradient id="Gradient5" cx="50%" cy="50%" fx="10%" fy="50%" r=".5">
                <animate attributeName="fx" dur="24.5s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(0,0,255, 1)"/>
                <stop offset="100%" stop-color="rgba(0,0,255, 0)"/>
            </radialGradient>
            <radialGradient id="Gradient6" cx="50%" cy="50%" fx="50%" fy="50%" r=".5">
                <animate attributeName="fx" dur="25.5s" values="0%;5%;0%" repeatCount="indefinite"/>
                <stop offset="0%" stop-color="rgba(255,0,0, 1)"/>
                <stop offset="100%" stop-color="rgba(255,0,0, 0)"/>
            </radialGradient>

            <linearGradient id="fadeGrad" y2="1" x2="0">
                <stop offset="0.5" stop-color="white" stop-opacity="0"/>
                <stop offset="1" stop-color="white" stop-opacity=".5"/>
            </linearGradient>
            <mask id="fade" maskContentUnits="objectBoundingBox">
                <rect width="1" height="1" fill="url(#Gradient1)"/>
            </mask>
        </defs>

        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient4)">
            <animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="17s"
                              repeatCount="indefinite"/>
        </rect>
        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient5)">
            <animate attributeName="x" dur="23s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="24s" values="25%;-25%;25%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="18s"
                              repeatCount="indefinite"/>
        </rect>
        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient6)">
            <animate attributeName="x" dur="25s" values="-25%;0%;-25%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="26s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="19s"
                              repeatCount="indefinite"/>
        </rect>

        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient1)">
            <animate attributeName="x" dur="20s" values="0%;25%;0%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="17s"
                              repeatCount="indefinite"/>
        </rect>
        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient2)">
            <animate attributeName="x" dur="23s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="24s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="18s"
                              repeatCount="indefinite"/>
        </rect>
        <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient3)">
            <animate attributeName="x" dur="25s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="26s" values="0%;25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="19s"
                              repeatCount="indefinite"/>
        </rect>

        <rect x="0" y="0" width="100%" height="100%" fill="#fff" mask="url(#fade)">
            <animate attributeName="x" dur="20s" values="-25%;0%;-25%" repeatCount="indefinite"/>
            <animate attributeName="y" dur="21s" values="0%;-25%;0%" repeatCount="indefinite"/>
            <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="19s"
                              repeatCount="indefinite"/>
        </rect>

    </svg>
    <div class="child">
        <h2>404 No encontrado</h2>
        <span>¿Estás Perdido? En esta ruta no hay nada</span>
    </div>
@endsection
@push('404')
    <style>
        html {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            background: #000;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            width: 100%;
            height: 100%;
            font: 100px/100px "Helvetica Neue";
            font-weight: 900;
            color: rgba(255, 255, 255, 1);
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            overflow: hidden;
        }

        .child {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            letter-spacing: -5px;
        }
        svg {
            width:100%;
            height: 100%;
        }
    </style>
@endpush
