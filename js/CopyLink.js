$(document).ready(
	function(){
		$("a").on("click",function(){
			var $i = $(this).attr('id');
			if ($i < 100){
				var $temp = $("<input>");
	  			$("body").append($temp);
	  			var $name1 = "#carrierNo" + $i;
	  			$temp.val($($name1).text()).select();
	  			document.execCommand("copy");
	  			$temp.remove();
			}
			
		})
	})