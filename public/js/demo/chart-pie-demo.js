
item1 = $('#item_name1').val();

value1 = $('#item_count1').val();


item2 = $('#item_name2').val();

value2 = $('#item_count2').val();


item3 = $('#item_name3').val();

value3 = $('#item_count3').val();


item4 = $('#item_name4').val();

value4 = $('#item_count4').val();


item5 = $('#item_name5').val();

value5 = $('#item_count5').val();


item6 = $('#item_name6').val();

value6 = $('#item_count6').val();

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [item1,item2, item3,item4,item5,item6],
    datasets: [{
      data: [value1, value2,value3, value4 , value5 , value6 ],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#e74a3b','#f6c23e','#000'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#e74a3b','#f6c23e','#000'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
