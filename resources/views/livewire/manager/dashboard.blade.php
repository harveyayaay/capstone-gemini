
    MTD Volume
    <canvas id="MTDTaskVolume" width="400" height="70"></canvas>

<script>
    var order = new Chart(document.getElementById('MTDTaskVolume').getContext('2d'), {
    type: "line",
    data: {
        labels: {!!json_encode($mtd_task_dates)!!},
        datasets: [{
            label: 'MTD Task Volume',
            data: {!!json_encode($mtd_task_volume)!!},
            backgroundColor: '#17a2b8',
            borderColor:'#17a2b8',
            borderWidth: 1
        }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });

</script>
