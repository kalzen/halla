
<>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>

    <table class="table" border="1" id="table">
        <thead>
            <tr id="header">
                <th scope="col"><img style="max-height: 20vw" src="{{asset('logo.jpg')}}" alt=""></th>
                <th scope="col" class="text-center align-items-center h-100" style="font-size: 3vw"><div style="background: #fff;">E4 CID Line</div></th>
                <th scope="col" class="text-center">Date / Time
                    <br> {{$schedule->date}}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><span>Model</span></th>
                    
                <th><span>Day Plan</span></th>
                    
                <th><span>Current Target</span></th>
                
            </tr>
            <tr>
                <td><span>{{$schedule->model}}</span></td>
                <td><span>{{$schedule->dayplan}}</span></td>
                   <td> <span>{{$schedule->target}}</span></td>
                </tr>
            <tr class="title">
                <th><span>UPH</span></th>
                    
                <th><span>Defect</span></th>
                    
                <th><span>Current Input</span></th>
                </tr>
                <tr>
                <td><span>{{$schedule->uhp}}</span></td>
                <td><span id="defect">{{$defect}}</span></td>
                    <td><span id="current_input">{{$input}}</span></td>
                    </tr>
            <tr class="title">
                <th><span>Defect Rate</span></th>
                    
                <th><span>Progress (%)</span></th>
                    
                <th><span>Achieve (%)</span></th>
                </tr>
            <tr>
            <td><span id="defect">@php if($input) echo ($defect/$input)*100; else echo '0'; @endphp%</span></td>
            <td><span id="progress">@php  echo ($input/$schedule->dayplan)*100;  @endphp%</span></td>
            <td><span id="achive">@php echo ($input/$schedule->target)*100;  @endphp%</span></td>
            </tr>
        </tbody>
    </table>
</body>
<style>
    #table
    {
        height: 100vh;
    position: fixed;
    top: 0;
    }
    #table tbody td
    {
        vertical-align: middle;
        text-align: center;
    }
    body, #table *
    {
        background: #222;
    }
    th
    {
        height: 6vh;
        text-align: center;
        font-weight: bold;
        color: yellow !important;
        font-size: 2vw;
        border-width: 2;
    }
    td
    {
    font-size: 6vw;
    color: white !important;
    font-weight: bold;
    border-width: 2;
    }
    #header th
    {
    background: #fff;
    color: #222 !important;
    font-size: 2rem;
    }
    
</style>
</>