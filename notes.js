<script>
	function addKeep(name, descript) 
	{ 
		document.getElementById("keeps").style.display = ""; 
		var keep = document.createElement("div"); 
		keep.className = "keep"; 

		keep.onmouseover = function() { 
			keepClose.style.display = ""; 
		} 

		keep.onmouseout = function() { 
			keepClose.style.display = "none"; 
		} 

		document.getElementById("keeps").appendChild(keep); 

		var keepClose = document.createElement("div"); 

		keepClose.className = "keep-close"; 
		keepClose.innerHTML = "<img src='img/close.png'>"; 
		keepClose.style.display = "none"; 

		keep.appendChild(keepClose); 
		
		var keepName = document.createElement("div"); 
		keepName.className = "keep-name"; 
		keepName.innerHTML = name; 
		keep.appendChild(keepName); 
		var keepDescript = document.createElement("div"); 
		keepDescript.className = "keep-desc"; 
		keepDescript.innerHTML = descript 
		keep.appendChild(keepDescript); 
	}
</script>