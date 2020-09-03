<?php
	/* Call base inclusion file */
	require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/_base.public.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Dashboard | delphi.science</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
		
		<!-- Chart.js -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
		
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="site/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="site/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="site/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="site/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="site/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<script>
			setTimeout(function(){ Materialize.toast('Welcome <?php echo $_SESSION['user']['firstname']; ?>!', 4000) }, 4000);
			setTimeout(function(){ Materialize.toast('You have <?php echo $_SESSION['user']['notifications']; ?> new notifications', 4000) }, 11000);
		</script>
				
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
			<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/header.inc.php'; ?>
			<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/search.inc.php'; ?>
			<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/sidebar_right.inc.php'; ?>
			<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/chat_dialogue.inc.php'; ?>
			<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel1/site/inc/sidebar_ranking.inc.php'; ?>
            <main class="mn-inner inner-active-sidebar">
				<div class="middle-content">
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l8">
							<canvas id="myChart" height="270"></canvas>
                        </div>
						
						
						<div class="col s12 m12 l4">
                            <div class="card server-card">
                                <div class="card-content">
                                    <span class="card-title">Platforms</span>
                                                <div class="server-load row">
                                                    <div class="server-stat col s4">
                                                        <p>35.0%</p>
                                                        <span>Mobile</span>
                                                    </div>
                                                    <div class="server-stat col s4">
                                                        <p>17.6%</p>
                                                        <span>Tablet</span>
                                                    </div>
                                                    <div class="server-stat col s4">
                                                        <p>47.4%</p>
                                                        <span>PC</span>
                                                    </div>
                                                </div>
                                    <div class="stats-info">
                                        <ul>
                                            <li>Google Chrome<div class="percent-info green-text right">32% <i class="material-icons">trending_up</i></div></li>
                                            <li>Safari<div class="percent-info red-text right">20% <i class="material-icons">trending_down</i></div></li>
                                            <li>Mozilla Firefox<div class="percent-info green-text right">18% <i class="material-icons">trending_up</i></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
					
					
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l8">
                            <div class="card invoices-card">
                                <div class="card-content">
                                    <div class="card-options">
                                        <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                                    </div>
                                    <span class="card-title">Recent responses</span>
                                <table class="responsive-table bordered">
                                    <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="number">Respondent</th>
                                            <th data-field="company">Affiliation</th>
                                            <th data-field="date">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#203</td>
                                            <td>PayPal</td>
                                            <td>Curabitur Libero Corp</td>
                                            <td>Dec 16, 18:12</td>
                                        </tr>
                                        <tr>
                                            <td>#202</td>
                                            <td>American Express</td>
                                            <td>Integer Mattis Ltd</td>
                                            <td>Nov 29, 13:56</td>
                                        </tr>
                                        <tr>
                                            <td>#200</td>
                                            <td>Discover</td>
                                            <td>Pellentesque Inc</td>
                                            <td>Nov 17, 19:14</td>
                                        </tr>
                                        <tr>
                                            <td>#199</td>
                                            <td>MasterCard</td>
                                            <td>Curabitur Libero Corp</td>
                                            <td>Oct 21, 12:16</td>
                                        </tr>
                                        <tr>
                                            <td>#198</td>
                                            <td>Amex</td>
                                            <td>Integer Mattis Ltd</td>
                                            <td>Oct 14, 22:43</td>
                                        </tr>
                                        <tr>
                                            <td>#197</td>
                                            <td>PayPal</td>
                                            <td>Pellentesque Inc</td>
                                            <td>Sept 29, 10:33</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
						
						
						
						<div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li class="red-text"><span class="badge cyan lighten-1">brainstorming</span></li>
                                    </ul>
                                </div>
                                <span class="card-title">Responses</span>
                                <span class="stats-counter"><span class="counter">5</span><small>This week</small></span>
                                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
							</div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <!--<div id="sparkline-bar"></div>-->
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Expecting</span>
                                <span class="stats-counter"><span class="counter">17</span><small>Further responses</small></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Reminders</span>
                                <span class="stats-counter"><span class="counter">0</span><small>In current phase</small></span>
                            </div>
							<div id="sparkline-line"></div>
                        </div>
                    </div>
                </div>						
						
						
						
						
						
						
						
						
                    </div>
                </div>
				
                <div class="inner-sidebar">
                    <span class="inner-sidebar-title">New Messages</span>
                    <div class="message-list">
                    <div class="info-item message-item"><img class="circle" src="site/images/profile-image-2.png" alt=""><div class="message-info"><div class="message-author">Ned Flanders</div><small>3 hours ago</small></div></div>
                    <div class="info-item message-item"><img class="circle" src="site/images/profile-image.png" alt=""><div class="message-info"><div class="message-author">Peter Griffin</div><small>4 hours ago</small></div></div>
                    <div class="info-item message-item"><img class="circle" src="site/images/profile-image-1.png" alt=""><div class="message-info"><div class="message-author">Lisa Simpson</div><small>2 days ago</small></div></div>
                    </div>
                    <span class="inner-sidebar-title">Notifications</span>
                    <span class="info-item">XX<span class="new badge">12</span></span>
                    <div class="inner-sidebar-divider"></div>
                    <span class="info-item">YY<span class="new badge">12</span></span>
					<!--<span class="info-item">Item</span>-->
                    <!--<div class="inner-sidebar-divider"></div>-->
                    <!--<span class="info-item disabled">No more ...</span>-->
                    <div class="inner-sidebar-divider"></div>					
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>        
        
        <!-- Javascripts -->
        <script src="site/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="site/plugins/materialize/js/materialize.min.js"></script>
        <script src="site/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="site/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="site/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="site/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="site/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="site/plugins/curvedlines/curvedLines.js"></script>
        <script src="site/plugins/peity/jquery.peity.min.js"></script>
        <script src="site/js/alpha.min.js"></script>
		
		<?php
		/* Last seven days are .. */
		$today = date( 'N' );
		
		switch ( $today ) 
		{
			case 1:
				$weekdays = "'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'";
				break;
			case 2:
				$weekdays = "'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon'";
				break;
			case 3:
				$weekdays = "'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue'";
				break;
			case 4:
				$weekdays = "'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed'";
				break;
			case 5:
				$weekdays = "'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu'";
				break;
			case 6:
				$weekdays = "'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'";
				break;
			case 7:
				$weekdays = "'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'";
				break;
		}
		
		/* Find out traffic for last seven days */
		$traffic = '12, 13, 3, 5, 2, 3, 7';
		?>
		
		<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php echo $weekdays; ?>],
				datasets: [{
					label: '# of visitors',
					data: [<?php echo $traffic; ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
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
		
    </body>
</html>