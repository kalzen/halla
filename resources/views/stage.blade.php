
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
<div class="container-fluid">

    <div class="row">
        
            @if($stage->name == 'Stage1')
            <div class="col-md-6 d-flex">
            <div class="h-100" id="wg" style="background: url({{asset('wg-1.png')}})">
            </div>
            </div>
            @elseif ($stage->name == 'Stage2')
            <div class="col-md-6 d-flex">
            <div class="h-100" id="wg" style="background: url({{asset('wg-2.png')}})">
            </div>
            </div>
            @elseif ($stage->name == 'Stage3')
            <div class="col-md-6 d-flex">
            <div class="h-100" id="wg" style="background: url({{asset('wg-3.png')}})">
            </div>
            </div>
            @elseif ($stage->name == 'Stage4')
            <div class="col-md-6 d-flex">
            <div class="h-100" id="wg" style="background: url({{asset('wg-4.png')}})">
            </div>
            </div>
            @elseif ($stage->name == 'Stage5')
            <div class="col-md-6 d-flex">
            <div class="h-100" id="wg" style="background: url({{asset('wg-5.png')}})">
            </div>
            </div>
            @endif
        <div class="col-md-6">
            @if($stage->name == 'Stage1')
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset('video/1.mp4')}}"></video>
            <table class="table" border="1" id="table-stage">
            @elseif ($stage->name == 'Stage2')   
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset('video/2.mp4')}}"></video>
            <table class="table" border="1" id="table-stage"></table>
            @elseif ($stage->name == 'Stage3')   
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset('video/2.mp4')}}"></video>
            <table class="table" border="1" id="table-stage"></table>
            @elseif ($stage->name == 'Stage4')   
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset('video/2.mp4')}}"></video>
            <table class="table" border="1" id="table-stage"></table>
            @elseif ($stage->name == 'Stage5')   
            <video loop autoplay controls muted style="max-width: 100%; height: 42vh" src="{{asset('video/2.mp4')}}"></video>
            @endif
            <table class="table" border="1" id="table-stage">
        
        <thead>
            <tr id="header">
                <th scope="col"><img style="height: 45px" src="{{asset('logo.png')}}" alt=""></th>
                <th scope="col" class="text-center align-items-center h-100" style="font-size: 1vw"><div style="background: #fff;">{{$stage->name}}</div></th>
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
                        $('.color-progress').data('process', data.progress);
                        $('.color-defect').data('process', data.defect_rate);
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