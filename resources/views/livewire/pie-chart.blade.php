<html>
	<head>
		<script src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
	<title>
		お団子投票結果
	</title>
</head>
<body>
 

 
 
<script>
	google.charts.load('current', {packages: ['corechart']});
	google.charts.setOnLoadCallback(drawChart);
 
	function drawChart(){
 
		var data=google.visualization.arrayToDataTable([
			['piechart name', 'number'],
 
				@php
					foreach($piecharts as $piechart){
						echo "['".$piechart->piechart."', ".$piechart->number."],";
					}
				@endphp
		]);
 
		var options ={
			title: '好きなお団子統計',
			is3D: true,
		};
 
		var chart = new google.visualization.PieChart(document.getElementById('chart'));
 
		chart.draw(data, options);
	}
</script>

<div class="container py-3" style="width:800px; margin: 0 auto;">
	<div class="form-group box2  col-12 col-md-10 col-lg-10" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px;">

		<form method="post" action="{{route('pie.vote')}}">
			@csrf
			@method('put')
				<div class="form-check">
					<input name="piechart" value="みたらし" type="radio">
					<label class="form-check-label" for="みたらし">みたらし</label>
				</div>
				<div class="form-check">
					<input name="piechart" value="きなこ" type="radio">
					<label class="form-check-label" for="きなこ">きなこ</label>
				</div>
				<div class="form-check">
					<input name="piechart" value="しょうゆ" type="radio">
					<label class="form-check-label" for="しょうゆ">しょうゆ</label>
				</div>
				<div class="form-check">
					<input name="piechart" value="あんこ" type="radio">
					<label class="form-check-label" for="あんこ">あんこ</label>
				</div>
				<div class="text-right" style="text-align: right;">
				<button type="submit" class="btn btn-danger btn-primary">投票する</button>
				</div>
			</form>

	</div>

	<div id="chart" style="height:500px;width:800px;"></div>

</div>
</body>
</html>