$(document).ready(function() {
    function updateData() {
        $.ajax({
            url: "{{ route('getDataSchedule') }}",
            type: "GET",
            success: function(data) {
                $('#input').text(data.input);
                $('#defect').text(data.defect);
                $('#progress').text(data.progress);
                $('#defect_rate').text(data.defect_rate + '%');
                $('#achieve').text(data.achieve + '%');
                //$('.status-icon[data-stage="Stage1"]').data("status",0);
            },
            error: function(xhr, status, error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    updateData();
    setInterval(updateData, 1000);
    setInterval(changeColor, 1000);
    function changeColor ()
    {
        $('.color-change').each(function (i)
        {
            if (this.data('process') < 25)
                {
                    this.css('background-color', 'red');
                }
            else if (this.data('process') < 25 && this.data('process') <= 50)
            {
                this.css('background-color', 'yellow');
            }
            else
            {
                this.css('background-color', 'green');
            }
        });
        
    }
    
});