@extends('la.layouts.app')

@section('htmlheader_title') 使用者資訊 @endsection
@section('contentheader_title') 使用者資訊@endsection
@section('contentheader_description')  @endsection

@section('main-content')
<style>
	.dataFont{
		font-size: 15px;
		font-weight:bolder;
		line-height:40px;
	}

</style>
<!-- Main content -->
        <section class="content">
		  <div class="box box-success">
			<div class="box-body ">
				<img class="img-bordered ml25" width="100" height="100" style="display: inline-block;" src="https://www.gravatar.com/avatar/534eded0f9eee5609333bffae6cbdc1f.jpg?s=80&amp;d=mm&amp;r=g" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">

			</div>
			<ul class="control-sidebar-subheading" style="list-style:none;">
					<li class="dataFont">登入帳號:</li>
						<li>{{ Auth::user()->email }}</li>
					<li class="dataFont">部門:</li>
						<li>{{ Auth::user()->type }}</li>
					<li class="dataFont">帳號權限:</li>
						<li>{{ Auth::user()->type }}</li>
					<li class="dataFont">手機號碼:</li>
					<li>
							@if(Auth::user()->mobile == null)
					        未設置
						 	@else echo {{ Auth::user()->moblie }}
		          			@endif
					</li>
					<li class="dataFont">生日:</li>

					<li>
						@if(Auth::user()->Birthday == 0000-00-00 )
						未設置
						@else echo {{ Auth::user()->Birthday }}
						@endif
					</li>
					<li class="dataFont">上次登入日期:</li>
						<li>{{ Auth::user()->LoginTime }}</li>
					<li class="dataFont">登入位置:</li>
					<li>尚未設置</li>
				</ul>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<p>{{ $test1 }}</p>
				<p>{{ $test2 }}</p>
		</div>
		</section>
@endsection

@push('styles')
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush


@push('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('la-assets/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('la-assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('la-assets/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('la-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('la-assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('la-assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- dashboard -->
<script src="{{ asset('la-assets/js/pages/dashboard.js') }}"></script>
@endpush

@push('scripts')
<script>
(function($) {
	$('body').pgNotification({
		style: 'circle',
		title: '歡迎使用',
		message: "艾肯娛樂後台系統該，頁面是你個人的帳號資訊。",
		position: "top-right",
		timeout: 0,
		type: "success",
		thumbnail: '<img width="40" height="40" style="display: inline-block;" src="{{ Gravatar::fallback(asset('la-assets/img/user2-160x160.jpg'))->get(Auth::user()->email, 'default') }}" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
	}).show();
})(window.jQuery);
</script>
@endpush