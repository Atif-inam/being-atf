<script>
			var list = document.getElementById("users");
			function getUsersList()
			{
				var ajaxobj = new XMLHttpRequest();
				
				ajaxobj.open("GET","https://jsonplaceholder.typicode.com/users", true);
				ajaxobj.send();

				ajaxobj.onreadystatechange = function()
				{
					if(ajaxobj.readyState == 4 && ajaxobj.status == 200)
					{
						var data = JSON.parse(ajaxobj.responseText);
						var txt = "";
						for(user of data)
						{
							txt += "<p>Name: "+user.username+" and Email "+user.email+"</p>";
						}
						
						list.innerHTML = txt;
					}
				}
			}
		</script>
