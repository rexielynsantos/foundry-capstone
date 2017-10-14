//PIE
var pieData = [
  {
      value: 20,
      color:"#878BB6"
  },
  {
      value : 40,
      color : "#4ACAB4"
  },
  {
      value : 10,
      color : "#FF8153"
  },
  {
      value : 30,
      color : "#FFEA88"
  }
];
var countries= document.getElementById("myChart").getContext("2d");
new Chart(countries).Pie(pieData);
//END Pie

//Bar
var options = {
   labels : ['asd'],
   datasets : [
     {
       fillColor : "rgba(172,194,132,0.4)",
       strokeColor : "#ACC26D",
       pointColor : "#fff",
       pointStrokeColor : "#9DB86D",
       data : [100]
     }
   ]
 }

var ctx = document.getElementById('myChart').getContext('2d');
new Chart(ctx).Bar(options);
//End Bar
