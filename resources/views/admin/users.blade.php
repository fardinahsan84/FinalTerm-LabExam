<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>DIGITAL AID: ADMIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/css/user/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/css/user/ready.css">
	<link rel="stylesheet" href="/css/user/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="" class="logo">
					DIGITAL AID
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">

					<form class="navbar-left navbar-form nav-search mr-md-3" >
						<div class="input-group" style="position: relative;">
							<input type="text" id="usersearchid"  placeholder="Search ..." name="usersearch" class="form-control">
							<div class="resultbox" style="position: absolute; left: 5%; top: 80%;">

							</div>
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="/img/user/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{$user->name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/viewprofile/{{$user->username}}">
											<span class="link-collapse">My Profile</span>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="/admin">
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="/admin/users">
								<p>All Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="/admin/register">
								<p>Register</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Dashboard</h4>
						<div style="height: 300px;" class="table-responsive my-table table-hover">
							<table  class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>ID</th>
										<th>USERNAME</th>
										<th>EMAIL</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($userinfo as $result)
								<!-- if else condition to check all the admins -->
									<tr>
										<th scope="row"></th>
										<td>{{ $result->id  }}</td>
										<td>{{ $result->username  }}</td>
										<td>{{ $result->email  }}</td>
										<td><a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/js/user/core/jquery.3.2.1.min.js"></script>
<script src="/js/user/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/js/user/core/popper.min.js"></script>
<script src="/js/user/core/bootstrap.min.js"></script>
<script src="/js/user/plugin/chartist/chartist.min.js"></script>
<script src="/js/user/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="/js/user/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="/js/user/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/js/user/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="/js/user/plugin/chart-circle/circles.min.js"></script>
<script src="/js/user/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/js/user/ready.min.js"></script>
<script src="/js/user/demo.js"></script>
<script>
	$(document).ready(function(){
		$('#usersearchid').keyup(function(e){
				//e.preventDefault()
				var value = $('#usersearchid').val();
	$.ajax({
              url: '/admin/usersearch',
              type: 'POST',
              data: {usersearch:value},
              success: function (response) {
                console.log(response.user);
				$('.resultbox').html("");
				for(let user of response.user){

			   var atag=document.createElement('a')
							atag.setAttribute('href',"")
							atag.setAttribute('style',"display:block;")
							atag.innerText=user.username;
							$('.resultbox').append(atag)
				}

              },
              error: function (err) {
                console.log(err);
              }
            });
		});
	});
</script>
</html>
