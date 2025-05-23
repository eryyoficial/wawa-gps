@extends('layouts.app')

@section('title', 'Mapa de Autocarros')

@section('head')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            position: absolute;
            top: 60px; /* Ajuste para a altura da navbar */
            left: 0;
            height: 100%;
            width: 100%;
        }

        .marker-autocarro {
            background-color: #4f46e5; /* bg-indigo-700 */
            width: 15px;
            height: 15px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid white;
        }

        .marker-paragem {
            background-color: #a78bfa; /* bg-indigo-300 */
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            border: 1px solid white;
        }

        .mapboxgl-popup-content {
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            font-size: 0.875rem;
            color: #4a5568; /* text-gray-700 */
        }

        .mapboxgl-popup-content h3 {
            color: #4f46e5; /* text-indigo-700 */
            font-size: 1.25rem;
            font-weight: 600; /* font-semibold */
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        #info-panel {
            position: absolute;
            top: 6rem; /* Ajuste para a altura da navbar + margem */
            left: 1rem;
            background-color: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 300px;
            z-index: 1000;
        }

        #info-panel h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4f46e5;
        }

        #info-panel p {
            margin-bottom: 0.25rem;
            color: #4a5568;
            font-size: 0.875rem;
        }

        .hidden {
            display: none;
        }

        .filter-container {
            position: absolute;
            top: 2rem; /* Ajuste para a altura da navbar */
            left: 1rem;
            z-index: 10;
            width: 320px;
        }

        .filter-panel {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .filter-panel label {
            display: block;
            color: #4a5568;
            font-size: 0.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .filter-panel select {
            appearance: none;
            background-color: white;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.75rem;
            width: 100%;
            color: #4a5568;
            font-size: 0.875rem;
            line-height: 1.25rem;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .filter-panel select:focus {
            outline: none;
            border-color: #63b3ed;
            box-shadow: 0 0 0 0.2rem rgba(66, 153, 225, 0.25);
        }

        .filter-panel button {
            background-color: #667eea;
            color: white;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.15s ease-in-out;
            width: 100%;
            margin-top: 1rem;
            border: none;
            cursor: pointer;
        }

        .filter-panel button:hover {
            background-color: #5a67d8;
        }
    </style>
@endsection

@section('content')
    <div id="map" class="relative">
        <div class="filter-container">
            <div class="filter-panel">
                <form id="filtro-linha">
                    <label for="linha">Selecionar Linha:</label>
                    <select id="linha">
                        <option value="">Todas as Linhas</option>
                    </select>
                    <button type="submit">Filtrar</button>
                </form>
            </div>
        </div>
        <div id="info-panel" class="hidden">
            </div>
    </div>
@endsection

@section('scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaGVybWluaW9vZmljaWFsIiwiYSI6ImNtYXBjN3JhdjBmaHQya3NjNmR6aWhpdHgifQ._Yc28oQqeUT3__nTyBtYVQ';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [13.2300, -8.8300],
            zoom: 12
        });

        let todosAutocarros = [];
        let autocarroMarkers = {};
        let linhasData = {}; // Para armazenar os dados completos das linhas

        const infoPanel = document.getElementById('info-panel');

        function mostrarInfoAutocarro(autocarro) {
            infoPanel.innerHTML = `
                <h2>Autocarro</h2>
                <p><strong>Linha:</strong> ${autocarro.linha.numero} - ${autocarro.linha.destino}</p>
                <p><strong>ID:</strong> ${autocarro.id}</p>
                <p><strong>Latitude:</strong> ${autocarro.latitude.toFixed(5)}</p>
                <p><strong>Longitude:</strong> ${autocarro.longitude.toFixed(5)}</p>
            `;
            infoPanel.classList.remove('hidden');
        }

        function mostrarDetalhesLinha(linhaId, lngLat) {
            fetch(`/api/linhas/${linhaId}`)
                .then(response => response.json())
                .then(linhaDetalhada => {
                    let paragemsHTML = '<ol style="padding-left: 20px; margin-bottom: 10px;">';
                    linhaDetalhada.paragems.forEach(paragem => {
                        paragemsHTML += `<li>${paragem.nome} (${paragem.latitude.toFixed(5)}, ${paragem.longitude.toFixed(5)})</li>`;
                    });
                    paragemsHTML += '</ol>';

                    let horariosHTML = '<div style="margin-top: 10px;"><strong>Horários:</strong>';
                    const horariosPorParagem = {};
                    linhaDetalhada.horarios.forEach(horario => {
                        if (!horariosPorParagem[horario.paragem.nome]) {
                            horariosPorParagem[horario.paragem.nome] = {};
                        }
                        if (!horariosPorParagem[horario.paragem.nome][horario.dia_semana]) {
                            horariosPorParagem[horario.paragem.nome][horario.dia_semana] = [];
                        }
                        horariosPorParagem[horario.paragem.nome][horario.dia_semana].push(horario.hora_partida);
                    });

                    for (const paragemNome in horariosPorParagem) {
                        horariosHTML += `<p><strong>${paragemNome}:</strong><br>`;
                        for (const dia in horariosPorParagem[paragemNome]) {
                            horariosHTML += `${dia}: ${horariosPorParagem[paragemNome][dia].join(', ')}<br>`;
                        }
                        horariosHTML += `</p>`;
                    }
                    horariosHTML += '</div>';

                    new mapboxgl.Popup()
                        .setLngLat(lngLat)
                        .setHTML(`
                            <div style="padding: 10px; font-family: sans-serif;">
                                <h3 style="margin-top: 0;">Linha ${linhaDetalhada.numero} - ${linhaDetalhada.destino}</h3>
                                <p><strong>paragems:</strong></p>
                                ${paragemsHTML}
                                ${horariosHTML}
                                <p><strong>Total de paragems:</strong> ${linhaDetalhada.paragems.length}</p>
                                <p><strong>ID da Linha:</strong> ${linhaDetalhada.id}</p>
                                </div>
                        `)
                        .addTo(map);
                })
                .catch(error => console.error('Erro ao buscar detalhes da linha:', error));
        }

        fetch('/api/linhas')
            .then(response => response.json())
            .then(linhas => {
                linhas.forEach(linha => {
                    linhasData[linha.id] = linha;
                    const option = document.createElement('option');
                    option.value = linha.id;
                    option.textContent = linha.numero + ' - ' + linha.destino;
                    document.getElementById('linha').appendChild(option);

                    linha.paragems.forEach(paragem => {
                        const marker = new mapboxgl.Marker({ color: '#3b82f6' })
                            .setLngLat([paragem.longitude, paragem.latitude])
                            .setPopup(new mapboxgl.Popup({
                                offset: 25
                            }).setHTML(`<h3>${paragem.nome}</h3>`))
                            .addTo(map);
                    });

                    if (linha.paragems.length > 1) {
                        const coordinates = linha.paragems.map(p => [p.longitude, p.latitude]);
                        map.addSource(`route-${linha.id}`, { 'type': 'geojson', 'data': { 'type': 'Feature', 'properties': {}, 'geometry': { 'type': 'LineString', 'coordinates': coordinates } } });
                        map.addLayer({
                            'id': `route-${linha.id}`,
                            'type': 'line',
                            'source': `route-${linha.id}`,
                            'layout': { 'line-join': 'round', 'line-cap': 'round' },
                            'paint': { 'line-color': '#3b82f6', 'line-width': 3 }
                        });

                        // Adicionar evento de clique para exibir detalhes da linha
                        map.on('click', `route-${linha.id}`, (e) => {
                            const linhaId = linha.id;
                            mostrarDetalhesLinha(linhaId, e.lngLat);
                        });

                        // Alterar o cursor ao passar o mouse sobre a linha
                        map.on('mouseenter', `route-${linha.id}`, () => {
                            map.getCanvas().style.cursor = 'pointer';
                        });

                        map.on('mouseleave', `route-${linha.id}`, () => {
                            map.getCanvas().style.cursor = '';
                        });
                    }
                });
            })
            .catch(error => console.error('Erro ao buscar linhas:', error));

        fetch('/api/autocarros')
            .then(response => response.json())
            .then(data => {
                todosAutocarros = data;
                data.forEach(adicionarAutocarroMarker);
            })
            .catch(error => console.error('Erro ao buscar autocarros:', error));

        document.getElementById('filtro-linha').addEventListener('submit', (event) => {
            event.preventDefault();
            const linhaSelecionada = document.getElementById('linha').value;
            filtrarAutocarros(linhaSelecionada);
        });

        // Geolocalização do utilizador
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userLngLat = [position.coords.longitude, position.coords.latitude];
                    map.setCenter(userLngLat); // Centralizar o mapa na localização do utilizador
                    new mapboxgl.Marker({
                            color: '#008000'
                        }) // Marker verde para o utilizador
                        .setLngLat(userLngLat)
                        .setPopup(new mapboxgl.Popup({
                            offset: 25
                        }).setText('Você está aqui!'))
                        .addTo(map);
                },
                (error) => {
                    console.error('Erro ao obter a localização do utilizador:', error);
                    // Lidar com o erro (ex: mostrar uma mensagem ao utilizador)
                }
            );
        } else {
            console.log('Geolocalização não suportada neste navegador.');
        }

        function adicionarAutocarroMarker(autocarro) {
            const markerDiv = document.createElement('div');
            markerDiv.className = 'marker-autocarro';
            const popup = new mapboxgl.Popup({
                    offset: 25
                })
                .setHTML(`<h3>Linha ${autocarro.linha.numero}</h3>`);
            const marker = new mapboxgl.Marker(markerDiv)
                .setLngLat([autocarro.longitude, autocarro.latitude])
                .setPopup(popup)
                .addTo(map);
            markerDiv.addEventListener('click', () => mostrarInfoAutocarro(autocarro));
            marker.getElement().addEventListener('click', () => mostrarInfoAutocarro(autocarro));
            autocarroMarkers[autocarro.id] = marker;
        }

        function filtrarAutocarros(linhaId) {
            for (const id in autocarroMarkers) {
                autocarroMarkers[id].remove();
            }
            autocarroMarkers = {};
            const autocarrosFiltrados = linhaId ?
                todosAutocarros.filter(autocarro => autocarro.linha_id === parseInt(linhaId)) :
                todosAutocarros;
            autocarrosFiltrados.forEach(adicionarAutocarroMarker);
            infoPanel.classList.add('hidden'); // Esconder o painel ao filtrar
        }

        function criarPopupParagem(paragem) {
            return new mapboxgl.Popup({ offset: 25 })
                .setHTML(`<h3>${paragem.nome}</h3>`);
        }
    </script>
@endsection