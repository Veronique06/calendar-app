{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier {{ $year }}</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .year-selector {
            margin-bottom: 20px;
        }

        .year-selector button {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        .month {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .month h3 {
            background: #198754;
            color: white;
            margin: -15px -15px 10px -15px;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-transform: capitalize;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            padding: 10px;
        }

        .day {
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            background: #e9ecef;
            border-radius: 5px;
            position: relative;
        }

        .day.has-event {
            background: #ffcc00;
            font-weight: bold;
        }

        .day:hover {
            background: #198754;
            color: white;
            cursor: pointer;
        }

        /* Tooltip amélioré */
        .event-tooltip {
            display: none;
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            padding: 10px;
            width: 200px;
            top: 45px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 100;
            text-align: left;
        }

        .event-tooltip p {
            margin: 5px 0;
            font-size: 12px;
            color: black !important;
        }

        /* Animation pour afficher en douceur */
        .show-tooltip {
            display: block !important;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="year-selector">
        <button onclick="changeYear(-1)">⇦ Année précédente</button>
        <strong style="font-size: 24px;">{{ $year }}</strong>
        <button onclick="changeYear(1)">Année suivante ⇨</button>
    </div>

    <div class="calendar">
        @foreach ($months as $month)
            <div class="month">
                <h3>{{ $month['name'] }}</h3>
                <div class="days">
                    @foreach ($month['days'] as $day)
                        <div class="day {{ count($day['events']) > 0 ? 'has-event' : '' }}"
                            onmouseover="showTooltip(event, '{{ $day['date'] }}')"
                            onmouseout="hideTooltip('{{ $day['date'] }}')">
                            {{ $day['day'] }}

                            @if (count($day['events']) > 0)
                                <div class="event-tooltip" id="tooltip-{{ $day['date'] }}">
                                    @foreach ($day['events'] as $event)
                                        <p> Titre : <strong>{{ $event->title }}</strong></p>
                                        <p> Description : {{ $event->description }}</p>
                                        <p> Date : <small>{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</small></p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function changeYear(offset) {
            let currentYear = {{ $year }};
            let newYear = currentYear + offset;
            window.location.href = `/calendar/${newYear}`;
        }

        function showTooltip(event, date) {
            let tooltip = document.getElementById('tooltip-' + date);
            if (tooltip) {
                tooltip.classList.add('show-tooltip');
            }
        }

        function hideTooltip(date) {
            let tooltip = document.getElementById('tooltip-' + date);
            if (tooltip) {
                tooltip.classList.remove('show-tooltip');
            }
        }
    </script>

</body>
</html> --}}

{{-- @foreach ($month['days'] as $day)
        <div class="day {{ count($day['events']) > 0 ? 'has-event' : '' }}"
            onmouseover="showTooltip(event, '{{ $day['date'] }}')"
            onmouseout="hideTooltip('{{ $day['date'] }}')"
            @if (count($day['events']) > 0)
                onclick="openModal('{{ $day['events'][0]->title }}',
                                   '{{ $day['events'][0]->description }}',
                                   '{{ \Carbon\Carbon::parse($day['events'][0]->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($day['events'][0]->end_date)->format('d/m/Y') }}')"
            @endif>
            {{ $day['day'] }}

            @if (count($day['events']) > 0)
                <div class="event-tooltip" id="tooltip-{{ $day['date'] }}">
                    @foreach ($day['events'] as $event)
                        <p> Titre : <strong>{{ $event->title }}</strong></p>
                        <p> Description : {{ $event->description }}</p>
                        <p> Date : <small>{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</small></p>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach --}}

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendrier {{ $year }}</title>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                text-align: center;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }

            .year-selector {
                margin-bottom: 20px;
            }

            .year-selector button {
                background-color: #198754;
                color: white;
                border: none;
                padding: 10px 15px;
                margin: 0 10px;
                cursor: pointer;
                border-radius: 5px;
                font-size: 16px;
            }

            .calendar {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                max-width: 900px;
                margin: 0 auto;
            }

            .month {
                background: white;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 15px;
            }

            .month h3 {
                background: #198754;
                color: white;
                margin: -15px -15px 10px -15px;
                padding: 10px;
                border-radius: 10px 10px 0 0;
                text-transform: capitalize;
            }

            .days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 5px;
                padding: 10px;
            }

            .day {
                width: 35px;
                height: 35px;
                line-height: 35px;
                text-align: center;
                background: #e9ecef;
                border-radius: 5px;
                position: relative;
                cursor: pointer;
            }

            .day.has-event {
                background: #ffcc00;
                font-weight: bold;
            }

            .day:hover {
                background: #198754 !important;
                color: white !important;
            }

            /* Style pour la date du jour */
            .today {
                background-color: #198754 !important;
                color: white !important;
                font-weight: bold;
                border: 2px solid #198754;
            }

            /* Tooltip amélioré */
            .event-tooltip {
                display: none;
                position: absolute;
                background: white;
                border: 1px solid #ddd;
                padding: 10px;
                width: 200px;
                top: 45px;
                left: 50%;
                transform: translateX(-50%);
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 100;
                text-align: left;
            }

            .event-tooltip p {
                margin: 5px 0;
                font-size: 12px;
                color: black !important;
            }

            /* Animation pour afficher en douceur */
            .show-tooltip {
                display: block !important;
                animation: fadeIn 0.3s ease-in-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            /* Style du modal */
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .modal-content {
                background: white;
                padding: 20px;
                border-radius: 8px;
                text-align: center;
                width: 50%;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                animation: fadeIn 0.3s ease-in-out;
            }

            .close {
                color: red;
                font-size: 30px;
                font-weight: bold;
                float: right;
                cursor: pointer;
            }

        </style>
    </head>
    <body>

        <div class="year-selector">
            <button onclick="changeYear(-1)">⇦ Année précédente</button>
            <strong style="font-size: 24px;">{{ $year }}</strong>
            <button onclick="changeYear(1)">Année suivante ⇨</button>
        </div>

        <div class="calendar">
            @php
                \Carbon\Carbon::setLocale('fr');
                $eventColors = ['#FF0000', '#800000', '#FFFF00', '#808000', '#00FF00', '#008000', '#00FFFF', '#008080', '#0000FF', '#000080', '#FF00FF', '#800080'];
                $assignedColors = []; // Stocker les couleurs des événements
                $usedColors = []; // Stocker les couleurs déjà attribuées
            @endphp

            @foreach ($months as $month)
                <div class="month">
                    {{-- <h3>{{ $month['name'] }}</h3> --}}
                    <h3>{{ \Carbon\Carbon::createFromFormat('m', $month['number'])->translatedFormat('F') }}</h3>
                    <div class="days">
                        @foreach ($month['days'] as $day)
                            @php
                                $isToday = \Carbon\Carbon::parse($day['date'])->isToday();
                                $eventColor = '#e9ecef'; // Couleur par défaut si pas d'événement

                                if (count($day['events']) > 0) {
                                    foreach ($day['events'] as $event) {
                                        // Vérifier si l'événement a déjà une couleur attribuée
                                        if (!isset($assignedColors[$event->id])) {
                                            // Générer un index unique en fonction de l'ID de l'événement
                                            $index = crc32($event->id) % count($eventColors);

                                            // Vérifier si la couleur est déjà utilisée
                                            while (in_array($eventColors[$index], $usedColors)) {
                                                $index = ($index + 1) % count($eventColors); // Passer à la couleur suivante
                                            }

                                            // Assigner la couleur et la stocker comme utilisée
                                            $assignedColors[$event->id] = $eventColors[$index];
                                            $usedColors[] = $eventColors[$index];
                                        }

                                        // Appliquer la couleur existante
                                        $eventColor = $assignedColors[$event->id];
                                    }
                                }
                            @endphp

                            {{-- <div class="day {{ count($day['events']) > 0 ? 'has-event' : '' }}" --}}
                            {{-- <div class="day {{ count($day['events']) > 0 ? 'has-event' : ($isToday ? 'today' : '') }}"
                                style="background-color: {{ $eventColor }};"
                                onmouseover="showTooltip(event, '{{ $day['date'] }}')"
                                onmouseout="hideTooltip('{{ $day['date'] }}')"
                                @if (count($day['events']) > 0)
                                    onclick="openModal('{{ $day['events'][0]->title }}',
                                                        '{{ $day['events'][0]->description }}',
                                                        '{{ \Carbon\Carbon::parse($day['events'][0]->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($day['events'][0]->end_date)->format('d/m/Y') }}')"
                                @endif>
                                {{ $day['day'] }}

                                @if (count($day['events']) > 0)
                                    <div class="event-tooltip" id="tooltip-{{ $day['date'] }}">
                                        @foreach ($day['events'] as $event)
                                            <p style="color: {{ $assignedColors[$event->id] }};"><strong>{{ $event->title }}</strong></p>
                                            <p> Description : {{ $event->description }}</p>
                                            <p> Date : <small>{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</small></p>
                                        @endforeach
                                    </div>
                                @endif
                            </div> --}}
                            <div class="day {{ count($day['events']) > 0 ? 'has-event' : ($isToday ? 'today' : '') }}"
                                style="background-color: {{ $eventColor }};"
                                onmouseover="showTooltip(event, '{{ $day['date'] }}')"
                                onmouseout="hideTooltip('{{ $day['date'] }}')"
                                @if (count($day['events']) > 0)
                                    onclick="openModal('{{ $day['events'][0]->title }}',
                                                        '{{ $day['events'][0]->description }}',
                                                        '{{ \Carbon\Carbon::parse($day['events'][0]->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($day['events'][0]->end_date)->format('d/m/Y') }}')"
                                @endif>
                                {{ $day['day'] }}

                                @if (count($day['events']) > 0)
                                    <div class="event-tooltip" id="tooltip-{{ $day['date'] }}">
                                        @foreach ($day['events'] as $event)
                                            <p style="color: {{ $assignedColors[$event->id] }};"><strong>{{ $event->title }}</strong></p>
                                            <p> Description : {{ Str::limit($event->description, 50, '...') }}</p>
                                            <p> Date : <small>{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}</small></p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal pour afficher les détails de l'événement -->
        <div id="event-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3><strong>Titre :</strong> <span id="modal-title"></span></h3>
                <p><strong>Description :</strong> <span id="modal-description"></span></p>
                <p><strong>Date :</strong> <span id="modal-date"></span></p>
            </div>
        </div>

        <script>
            function changeYear(offset) {
                let currentYear = {{ $year }};
                let newYear = currentYear + offset;
                window.location.href = `/calendar/${newYear}`;
            }

            function showTooltip(event, date) {
                let tooltip = document.getElementById('tooltip-' + date);
                if (tooltip) {
                    tooltip.classList.add('show-tooltip');
                }
            }

            function hideTooltip(date) {
                let tooltip = document.getElementById('tooltip-' + date);
                if (tooltip) {
                    tooltip.classList.remove('show-tooltip');
                }
            }

            function openModal(title, description, eventDate) {
                document.getElementById("modal-title").innerText = title;
                document.getElementById("modal-description").innerText = description;
                document.getElementById("modal-date").innerText = eventDate;
                document.getElementById("event-modal").style.display = "flex";
            }

            function closeModal() {
                document.getElementById("event-modal").style.display = "none";
            }
        </script>

    </body>
    </html>


