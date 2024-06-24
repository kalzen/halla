
<html>

<head>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('jquery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('screen.css')}}">
</head>

<body>
 
<input type="hidden" id="getUrl" value="{{ route('getDataStage',$stage->id) }}">
    <table class="table" border="1" id="table">
        <thead>
            <tr id="header">
                <th scope="col"><img style="max-height: 20vw" src="{{asset('logo.jpg')}}" alt=""></th>
                <th scope="col" class="text-center align-items-center h-100" style="font-size: 3vw"><div style="background: #fff;">CHECK HOOK</div></th>
                <th scope="col" class="text-center">Date / Time
                    <br> {{$schedule->date}}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="ok" id="OK" rowspan="6">OK</th>
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
    
</body>
<script>
        $(document).ready(function() {
            function updateData() {
            var url_data = $('#getUrl').val();
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