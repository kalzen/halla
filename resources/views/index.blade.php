
<html>

<head>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('screen.css')}}">
</head>


<body>

    <table class="table" border="1" id="table">
        <thead>
            <tr id="header">
                <th scope="col"><img style="max-height: 20vw" src="{{asset('logo.jpg')}}" alt=""></th>
                <th scope="col" class="text-center align-items-center h-100 vertical-middle" style="font-size: 3vw; 
    vertical-align: middle;"><div style="background: #fff;">E4 CID Line</div></th>
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
                    <td><span id="input">{{$input}}</span></td>
                    </tr>
            <tr class="title">
                <th><span>Defect Rate</span></th>
                    
                <th><span>Progress (%)</span></th>
                    
                <th><span>Achieve (%)</span></th>
                </tr>
            <tr>
            <td class="color-progress" data-process="0"><span id="defect_rate">@php if($input) echo ($defect/$input)*100; else echo '0'; @endphp%</span></td>
            <td class="color-progress" data-process="0"><span id="progress">@php  echo ($input/$schedule->dayplan)*100;  @endphp%</span></td>
            <td class="color-progress" data-process="0"><span id="achive">@php echo ($input/$schedule->target)*100;  @endphp%</span></td>
            </tr>
        </tbody>
    </table>
</body>
<script>
        $(document).ready(function() {
            function updateData() {
                $.ajax({
                    url: "{{ route('getDataSchedule') }}",
                    type: "GET",
                    success: function(data) {
                        $('#input').text(data.input);
                        $('#defect').text(data.defect);
                        $('#progress').text(data.progress + '%');
                        $('#defect_rate').text(data.defect_rate + '%');
                        $('#achive').text(data.achive + '%');
                        $('.color-progress').data('process', data.progress);
                        //$('.status-icon[data-stage="Stage1"]').data("status",0);
                        //change color defect
                        if (parseFloat(data.defect_rate) > 75)
                        {
                            $('#defect_rate').css('background-color', 'red');
                            $('#defect_rate').closest('td').css('background-color', 'red');
                        }
                        else if (parseFloat(data.defect_rate) < 75)
                        {
                            $('#defect_rate').css('background-color', 'yellow');
                            $('#defect_rate').closest('td').css('background-color', 'yellow');
                        }
                        else
                        {
                            $('#defect_rate').css('background-color', 'green');
                            $('#defect_rate').closest('td').css('background-color', 'green');
                        }
                        //change color progress
                        if (parseFloat(data.progress) < 25)
                        {
                            $('#progress').css('background-color', 'red');
                            $('#progress').closest('td').css('background-color', 'red');
                        }
                        else if (parseFloat(data.progress) < 75)
                        {
                            $('#progress').css('background-color', 'yellow');
                            $('#progress').closest('td').css('background-color', 'yellow');
                        }
                        else
                        {
                            $('#progress').css('background-color', 'green');
                            $('#progress').closest('td').css('background-color', 'green');
                        }
                        //change color achive
                        if (parseFloat(data.achive) < 25)
                        {
                            $('#achive').css('background-color', 'red');
                            $('#achive').closest('td').css('background-color', 'red');
                        }
                        else if (parseFloat(data.achive) < 75)
                        {
                            $('#achive').css('background-color', 'yellow');
                            $('#achive').closest('td').css('background-color', 'yellow');
                        }
                        else
                        {
                            $('#achive').css('background-color', 'green');
                            $('#achive').closest('td').css('background-color', 'green');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }

            updateData();
            setInterval(updateData, 500);

        });
    </script>
</html>