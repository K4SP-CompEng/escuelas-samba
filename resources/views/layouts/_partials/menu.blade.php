<header style="width: 100%;
               height: 7%;
               position:fixed;
               top: 0px;
               left: 0px;
               background-color: #ff4f38;
               color: white;
               font-family: Verdana, Geneva, Tahoma, sans-serif">
    <nav style="display: flex;
                align-items: center;
                justify-content: space-between;">
        <h1 style="margin: 8px; vertical-align: middle;">Escuelas de Samba</h1>
        <ul style="display: flex;
                   list-style-type: none;">
            <li style="margin-right: 8px"><a href="{{ route('index') }}">Inicio</a></li>
            <li style="margin-right: 8px"><a href="{{ route('escuela') }}">Escuelas</a></li>
            <li style="margin-right: 8px"><a href="{{ route('buscar_colaborador') }}">Colaboradores</a></li>
            <li style="margin-right: 8px"><a href="">Patrocinadores</a></li>
        </ul>
    </nav>
</header>
