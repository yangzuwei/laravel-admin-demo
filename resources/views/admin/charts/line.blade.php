<div class="chart">
<canvas id="line" height="260"></canvas>
</div>
<script>
$(function() {
    var ctx = document.getElementById("line").getContext('2d');
    var line = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['四天前', '三天前', '前天', '昨天', '今天'],
            datasets: [
                {
                    label: 'pv',
                    data: {!! $pv !!},
                    borderColor: "rgba(0,128,0,0.5)",
                    fill:false,
                    borderWidth: 3
                },
                {
                    label: 'uv',
                    data: {!! $uv !!},
                    fill:false,
                    borderColor: "rgba(151,187,205,0.5)",
                    borderWidth: 3
                }
            ]
        },
        options: {
        }
    });
});
</script>