<!-- resources/views/holidays/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Holiday Calendar</h1>
        <div>
            <a href="{{route('holidays.list')}}" class="btn btn-primary">Holiday List</a>
        </div>
        <div id="calendar"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    
                    @foreach($holidays as $holiday)
                    {
                        title : '{{ $holiday->name }} ({{ $holiday->type }})',
                        start : '{{ $holiday->date }}'
                    },
                    @endforeach
                ]
            });
        });
    </script>
</body>
</html>
