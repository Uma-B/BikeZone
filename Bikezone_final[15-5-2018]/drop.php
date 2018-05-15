<body>
<select id="box1">
	<option value="1">erode</option>
	<option value="2">tirupur</option>
	<option value="3">cbe</option>
</select>
<script type="text/javascript">
	var sel = document.getElementById("box1");
var text= sel.options[sel.selectedIndex].text;
alert(text);
</script>
</body>

