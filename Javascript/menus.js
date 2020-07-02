	function links() {

		document.links_form.links.onchange = function(){   
																
				
		var index = document.links_form.links.selectedIndex;  
																		
				
		var url = document.links_form.links[index].value;   
		window.location.href = url;  
		}
	}
	
	window.onload = function() {
	links()

}