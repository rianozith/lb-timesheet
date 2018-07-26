@extends('layouts.dashboard')

@section('sub-header')
Chart
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<div id="main" style="width: 100%;height:300px;"></div>
		</div>

		<div class="col-md-6">
			<div id="earning" style="width: 100%;height:300px;"></div>
				
			</div>
			
		</div>
		
	</div>
</div>
@endsection

@push('js')
	<script src="{{asset('js/echarts.common.min.js')}}"></script>
	<script type="text/javascript">
		// based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main'));
		var months = {!!json_encode($aMonths)!!};
		var time = {!! json_encode($aTimes)!!};
		var task = {!! json_encode($aTasks)!!};
		var salary = {!! json_encode($aSalaries)!!};
        // specify chart configuration item and data
        var option = {
            title: {
                text: 'Lionbridge Chart'
            },
            tooltip : {
		        trigger: 'axis',
		        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		        }
		    },
            legend: {
                data:['Time', 'Task']
            },
            xAxis: {
            	type : 'category',
                data: months,
                axisTick: {
	                alignWithLabel: true
	            }
            },
            yAxis: [{
            	type : 'value',
            }],
            series: [
	            {
	                name: 'Time',
	                type: 'bar',
	                barWidth: '10%',
	                data: time
	            },
	            {
		            name:'Task',
		            type:'bar',
		            barWidth: '10%',
		            data:task
		        }
            ]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
	</script>
	<script type="text/javascript">
		// based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('earning'));
        

        // specify chart configuration item and data
        var option = {
        	color: 'green',
            title: {
                text: 'Lionbridge Salary'
            },
            tooltip : {
		        trigger: 'axis',
		        axisPointer : {            
		            type : 'shadow'
		        }
		    },
            legend: {
                data:['Salary in $']
            },
            xAxis: {
            	type : 'category',
                data: months,
                axisTick: {
	                alignWithLabel: true
	            }
            },
            yAxis: [{
            	type : 'value',
            }],
            series: [
	            {
	                name: 'Salary in $',
	                type: 'line',
	                data: salary
	            },
            ]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
	</script>
@endpush
