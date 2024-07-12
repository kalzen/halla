
<html>

<head>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('screen.css')}}">
</head>

<body>
 
<input type="hidden" id="getUrl" value="{{ route('getDataStage',$stage->id) }}">
<input type="hidden" id="schedule_id" value="{{$schedule->id}}">
<div class="container-fluid @if ($stage->name != 'Stage1' && $stage->name != 'Stage2' && $stage->name != 'Stage5')grid-fluid @else not-grid @endif">

        
        @if ($stage->name == 'Stage1' || $stage->name == 'Stage2' || $stage->name == 'Stage5')
        <div class="row">
        <div class="col-md-6">
            @endif
            <div class="grid-item d-flex">
            <img src="{{asset($image->value)}}">
            </img>
            </div>
            @if ($stage->name != 'Stage1' && $stage->name != 'Stage2' && $stage->name != 'Stage5')
        <div class="grid-item"></div>
        @endif
        @if ($stage->name == 'Stage1' || $stage->name == 'Stage2' || $stage->name == 'Stage5')
        </div><div class="col-md-6">
            @endif
        <div class="grid-item">
            @if($video->value)
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset($video->value)}}"></video>
            @endif
        </div>
        <div class="grid-item">
            <table class="table" border="1" id="table-stage">
            
            <thead>
                <tr id="header">
                    <th scope="col" class="align-middle"><img style="height: 45px" src="{{asset('logo.png')}}" alt=""></th>
                    <th scope="col" class="text-center align-items-center h-100 align-middle" style="font-size: 1vw"><div style="background: #fff;">{{$stage->name}}</div></th>
                    <th scope="col" class="text-center" style="font-size: 1rem !important">Date / Time
                        <br> {{$schedule->date}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="ok" id="OK" rowspan="6" style="font-size: 8rem">OK</th>
                    <th><span>Model</span></th>
                        
                    <th><span>Current Target</span></th>
                    
                </tr>
                <tr>
                    <td><span>{{$schedule->model}}</span></td>
                    <td> <span>{{$schedule->target}}</span></td>
                </tr>
                <tr class="title">
                        
                    <th><span>Defect(NG)</span></th>
                        
                    <th><span>Defect Rate</span></th>
                    </tr>
                    <tr>
                    
                    <td><span id="defect">{{$defect}}</span></td>
                    <td class="color-defect color-change" data-process="0"><span id="defect_rate">@php if($input) echo ($defect/$input)*100; else echo '0'; @endphp%</span></td>
                
                        
                        </tr>
                <tr class="title">
                    
                        
                    <th><span>Input</span></th>
                        
                    <th><span>Achieve (%)</span></th>
                    </tr>
                <tr>
                <td><span id="input">{{$input}}</span></td>
                <td class="color-progress color-change" data-process="0"><span id="progress">@php  echo ($input/$schedule->dayplan)*100;  @endphp%</span></td>
                
                </tr>
            </tbody>
            </table>
        </div>
        @if ($stage->name == 'Stage1' || $stage->name == 'Stage2' || $stage->name == 'Stage5')
        </div>
        </div>
            @endif
    </div>
</div>
    
    
</body>
<script>
        $(document).ready(function() {
            function updateData() {
            var url_data = $('#getUrl').val();
            var schedule = $('#schedule_id').val();
                $.ajax({
                    url: url_data,
                    type: "GET",
                    success: function(data) {
                        $('#input').text(data.input);
                        $('#defect').text(data.defect);
                        $('#progress').text(data.progress + '%');
                        $('#defect_rate').text(data.defect_rate + '%');
                        $('#achive').text(data.achive + '%');
                        //change color defect
                        if (parseFloat(data.defect_rate) > 75)
                        {
                            $('#defect_rate').css('background-color', 'red');
                            $('#defect_rate').closest('td').css('background-color', 'red');
                        }
                        else if (parseFloat(data.defect_rate) > 25)
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
                        if (data.status)
                        {
                         $('#OK').text('OK');
                         $('#OK').addClass('ok');
                         $('#OK').removeClass('ng');
                        }
                        else
                        {
                            $('#OK').text('NG');
                            $('#OK').addClass('ng');
                         $('#OK').removeClass('ok');
                        }
                        if (data.schedule != schedule)
                        {
                        location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error fetching data:', error);
                    }
                });
            }

            updateData();
            setInterval(updateData, 1000);
            

        });

    </script>
</html>