<?php
date_default_timezone_set('Asia/Shanghai');
if(isset($_GET["str"])){
	$str=$_GET["str"];
	$xx = explode("-", $str);
	$year=$xx[0];
	$month=$xx[1];
	$day=$xx[2];
	$clock=$xx[3];
	$fen=$xx[4];
	$title="距离".$year."年".$month."月".$day."日相差多少时间-时间计算网";
	$title2="返回首页";
	$h1="距离".$year."年".$month."月".$day."日相差多少时间";
}else{
	$title="时间差计算";
	$h1="时间差计算";
	$mmp="";
	$title2="时间差计算";
	$year=date('Y');
	$month=date('m');
	$day=date('d');
	$clock=date('H');
	$fen=date('i');
}
//实在不行，找一下静态网站tool里的时间差计算。

//python软件，get请求，获取源码，生成静态html文件。
?>
<!DOCTYPE html>
<html lang="en">
<head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="/bootstrap.min.css">
		<link rel="stylesheet" href="/style.css">
		<script>
		function diff(date1) {
		    // 将日期字符串转换为Date对象
		    const d1 = new Date(date1);
		    const d2 = new Date();
		 
		    // 获取时间差（毫秒）
		    const diff = d2.getTime() - d1.getTime();
		 //alert(diff);
		    // 转换为秒
		    const diffInSeconds = diff / 1000;
		 
		    // 转换为分钟、小时、天等（按需转换）
		    const diffInMinutes = diffInSeconds / 60;
		    const diffInHours = diffInMinutes / 60;
		    const diffInDays = diffInHours / 24;
			const diffInMonths = diffInDays / 30;
			const diffInYears = diffInMonths / 365;
			let arr=[diffInYears,diffInMonths,diffInDays,diffInHours,diffInMinutes,diffInSeconds];
		    return arr;
		}
		 
		function get(){
		var year=document.getElementById('year').value;
		var month=document.getElementById('month').value;
		var day=document.getElementById('day').value;
		var clock=document.getElementById('clock').value;
		var fen=document.getElementById('fen').value;
		if(year==""){year=2024;}
		if(month==""){month=1;}
		if(day==""){day=1;}
		if(clock==""){clock=0;}
		if(fen==""){fen=0;}
		if(month<10&&month.length<2){month="0"+month;}
		//alert(month);
		if(day<10&&day.length<2){day="0"+day;}
		if(clock<10&&clock.length<2){clock="0"+clock;}
		if(fen<10&&fen.length<2){fen="0"+fen;}
		var zz1=year+"-"+month+"-"+day+"T"+clock;
		//zz1=string(zz1);
		let time1 = new Date(zz1+':'+fen+':00');
		//alert(time1);
		//var yy=dateToTimestamp(time1);
		//alert(time1.getTime());
		//alert(yy);
		let xx = diff(time1);
		var yy='相差'+xx[1]+'月\r\n相差'+xx[2]+'日\r\n相差'+xx[3]+'时\r\n相差'+xx[4]+'分\r\n相差'+xx[5]+'秒';
		document.getElementById('countdowndays').innerText=yy;
}
		</script>
		<style>
		#leftli li{
			float:left;
			margin:5px;
		}
		</style>
	</head>
</head>
<body>
    <header class="bg-primary" >
        <div class="main-content container d-flex justify-content-between align-items-center">
            <a style="text-decoration:none;" class="web-logo" href="/"><?php echo $title2; ?></a>
        </div>
    </header>
    <div class="main-content container" style='min-height:800px;'>
        <h1 style="font-size:24px;text-align:center;"><?php echo $h1; ?></h1>
        <div class="content-box">
                <div class="form-row align-items-center justify-content-center">

                    <div class="form-group col-md-3">
                        <div class="d-flex align-items-center">
                            <label for="month" style="width: 200px; margin-right: 0px;margin-top: 10px;">距离</label>
                            <input type="number" class="form-control" id="year" name="year"  placeholder="" min="1" max="9999"  
							<?php echo "value=".$year; ?>
							required>
							<label style="margin: 10px;">年</label>
                        </div>
                    </div>
					<div class="form-group col-md-2">
					    <div class="d-flex align-items-center">
					    <input type="number" class="form-control" id="month" name="month" placeholder="" min="1" max="12" 
						<?php echo "value=".$month; ?>
						required>
						<label style="margin: 10px;">月</label>
						</div>
					</div>
                    <div class="form-group col-md-2">
					    <div class="d-flex align-items-center">
                        <input type="number" class="form-control" id="day" name="day"  placeholder="" min="1" max="31"
						<?php echo "value=".$day; ?>
						required>
						<label style="margin: 10px;">日</label>
						</div>
                    </div>
                    <div class="form-group col-md-1">
					    <div class="d-flex align-items-center">
                        <input type="number" class="form-control" id="clock" name="clock"  placeholder="" min="0" max="24"
						<?php echo "value=".$clock; ?>
						required>
						<label style="margin: 10px;">时</label>
						</div>
                    </div>
					<div class="form-group col-md-1">
					    <div class="d-flex align-items-center">
					    <input type="number" class="form-control" id="fen" name="fen"  placeholder="" min="0" max="60"
						<?php echo "value=".$fen; ?>
						required>
						<label style="margin: 10px;">分</label>
						</div>
					</div>
                    <div class="form-group col-md-2" style="text-align: left;">
                        <button onclick="get()" class="btn btn-primary btn-block">计算时间差</button>
                    </div>
                </div>
        </div>

        <h2>时间差结果如下：</h2>
         <div id="content-know">
		 <div class="countdowndays" id="countdowndays">

		 </div>
		 </div>
        <div class="row">
            <div class="col-md-12">
                <div class="list-info">
                    <ul id='leftli'>
					关联内容
					</ul>
                </div>
            </div>
            
        </div>
        
        
    </div>
	    
    <footer style="background: #f5f5f5; text-align: center; padding: 20px;">
        <div class="container">
            <p>时间计算网</p>
        </div>
    </footer>
    </body>
	<script>get();</script>
</html>