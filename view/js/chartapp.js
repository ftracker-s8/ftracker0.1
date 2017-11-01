$(document).ready(function(){
    $.ajax({
        url: "http://ftrack.mast/controller/chart_bar_ctrl.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var month = [];
            var incoms = [];

            for(var i in data) {
                month.push("Month " + data[i].monthst);
                incoms.push(data[i].incomer);
            }

            var chartdata = {
                labels: month,
                datasets : [
                    {
                        label: 'Player Score',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: incoms
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});