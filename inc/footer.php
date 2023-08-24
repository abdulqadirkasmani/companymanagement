		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
               <p>Copyright © 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-3.js"></script>
	
	
	
	<!-- tagify -->
	 
	<script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="./vendor/datatables/js/dataTables.buttons.min.js"></script>
	<script src="./vendor/datatables/js/buttons.html5.min.js"></script>
	<script src="./vendor/datatables/js/jszip.min.js"></script>
	<script src="./js/plugins-init/datatables.init.js"></script>
   
	<!-- Apex Chart -->
	
	<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	

	<!-- Vectormap -->
    <script src="./js/custom.js"></script>
	<script src="./js/deznav-init.js"></script>
	<script src="./js/demo.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<script>
		setInterval(function(){
			$('.countdown-timer').each(function(){
				  var curTime = $(this).data('remaining-time');
				  var end = new Date(curTime);
				  var _second = 1000;
				  var _minute = _second * 60;
				  var _hour = _minute * 60;
				  var _day = _hour * 24;
				  var curDiv = $(this);
				  var timer = setInterval(function(){
				  	  var now = new Date();
				      var distance = end - now;
				      if (distance < 0) {
				          clearInterval(timer);
				          curDiv.html('EXPIRED!');
				          return;
				      }
				      var days = Math.floor(distance / _day);
				      var hours = Math.floor((distance % _day) / _hour);
				      var minutes = Math.floor((distance % _hour) / _minute);
				      var seconds = Math.floor((distance % _minute) / _second);
				      if(days > 1) {
				      	var spell = ' days ';
				      } else {
				      	var spell = ' day ';
				      }
				      var remainingTime = '<span>'+ days + spell +'</span>' + hours + ' : ' + minutes + ' : ' + seconds + ' ';
				      curDiv.html(remainingTime);
				  }, 1000);
			})
			
		}, 2000);
	</script>
	
</body>
</html>