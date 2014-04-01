    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/docs.min.js')}}"></script>


	<script type="text/javascript">
		$(document).ready(function (){
			$('.form-control').blur(function(){
				$(this).parent().parent().removeClass('has-error');
				$(this).parent().parent().removeClass('has-success');
				$(this).next().remove();
			});
		});
	</script>

  </body>
</html>