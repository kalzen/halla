<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table class="table" border="1" id="table">
        <thead>
            <tr>
                <th scope="col"><img src="logo.png" alt=""></th>
                <th scope="col" class="text-center">CHECK HOOK</th>
                <th scope="col" class="text-center">Date / Time
                    <br> {{ $schedule->date }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td  rowspan="3"><h3 style="font-size: 4rem;">OK</h3></td>
                <td>
                    <div class=""><span>Model</span>
                        <h3>ABC</h3>
                    </div>
                </td>
                <td>
                    <div class=""><span>Current Target</span>
                        <h3>{{ $schedule->target }}</h3>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class=""><span>Defect(NG)</span>
                        <h3 id="defect">0</h3>
                    </div>
                </td>
                <td>
                    <div class=""><span>Defect Rate</span>
                        <h3 id="defect_rate">0%</h3>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class=""><span>Input</span>
                        <h3 id="input">0</h3>
                    </div>
                </td>
                <td>
                    <div class=""><span>Achieve (%)</span>
                        <h3 id="achieve">0%</h3>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="status-list d-flex">
        <div class="status-container">
            <span class="status-icon" data-stage="Stage1" data-status="1"></span>
            <h3>1. CHECK HOOK</h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage2" data-status="1"></span>
            <h3>2. Assembly SCLIP stick tape</h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage3" data-status="1"></span>
            <h3>3. Assembly Fan </h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage4" data-status="1"></span>
            <h3>4. Stick Tape</h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage5" data-status="1"></span>
            <h3>5. Stick Tape Marking</h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage6" data-status="1"></span>
            <h3>6. Fan Fuction</h3>
        </div>
        <div class="status-container">
            <span class="status-icon" data-stage="Stage7" data-status="1"></span>
            <h3>7. OQC inspection</h3>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function updateData() {
                $.ajax({
                    url: "{{ route('random-data') }}",
                    type: "GET",
                    success: function(data) {
                        $('#input').text(data.input);
                        $('#defect').text(data.defect);
                        $('#defect_rate').text(data.defect_rate + '%');
                        $('#achieve').text(data.achieve + '%');
                        $('.status-icon[data-stage="Stage1"]').data("status",0);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching random data:', error);
                    }
                });
            }

            updateData();
            setInterval(updateData, 5000);
        });
    </script>
</body>
<style>
    #table {
        height: 80vh;
    }

    #table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    .status-container h3
    {
        font-size: 1rem;
        width: calc(100vw/7);
        text-align: center;
    }
    .status-icon
    {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        border: 1px solid #777;
        display: block;
        text-align: center;
        margin: 0 auto;
    }
    .status-icon[data-status="1"]
    {
        background-color: green;
    }
    .status-icon[data-status="2"]
    {
        background-color: red;
    }
</style>
</html>
