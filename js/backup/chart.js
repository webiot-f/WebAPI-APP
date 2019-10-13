var ctx = document.getElementById('dust').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['1','2','3','4','5','6'],
    datasets: [{
      label: '濃度',
      data: [12, 19, 3, 17, 6, 3, 7],
      backgroundColor: "rgba(153,255,51,0.4)"}]}});