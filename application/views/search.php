
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>What is wrong with me ?</title>
<script src="<?php echo base_url();?>assets/js/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<link  href='<?php echo base_url();?>assets/css/jquery-ui.css' rel='stylesheet' />

<style type="text/css">
body {
	width: 800px;
	margin: 30px auto;
	font: 100%/140% Arial, Helvetica, sans-serif;
}
.credits {
	margin-bottom: 80px;
	padding-bottom: 30px;
	border-bottom: solid 1px #ccc;
}

/* search form 
-------------------------------------- */
.searchform {
	display: inline-block;
	zoom: 1; /* ie7 hack for display:inline-block */
	*display: inline;
	border: solid 1px #d2d2d2;
	padding: 3px 5px;
	
	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	box-shadow: 0 1px 0px rgba(0,0,0,.1);

	background: #f1f1f1;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
	background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie8 */
}
.searchform input {
	font: normal 12px/100% Arial, Helvetica, sans-serif;
}
.searchform .searchfield {
	background: #fff;
	padding: 6px 6px 6px 8px;
	width:500px;
	border: solid 1px #bcbbbb;
	outline: none;

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 27px;
	width: 27px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#9e9e9e), to(#454545));
	background: -moz-linear-gradient(top,  #9e9e9e,  #454545);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}
#searchbox{
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}​
#search_result 
{
  right: 0;
  bottom: 100;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
  margin-top:450px;
}
</style>
<script>
 $(function() {
    var projects = [
      {
        label: "ปวดหัว",
        value: 1,
      },
      {
        label: "ปวดหัวข้างซ้าย",
        value: 2,
      },
      {
        label: "ปวดหัวไมเกรน",
        value: 3,
      },
      {
        label: "ปวดตา",
        value: 4,
      },
      {
        label: "เจ็บหู",
        value: 5,
      }
    ];

    $( "#searchfieldinput" ).autocomplete({
     	minLength: 0,
     	source: projects,
	    focus: function( event, ui ) {
	        $( "#searchfieldinput" ).val( ui.item.label );
	        return false;
	      },
      	select: function( event, ui ) {
    	    $( "#searchfieldinput" ).val( ui.item.label );
	        $( "#project-id" ).val( ui.item.value );
        return false;
      	},
      	
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
     	return $( "<li>")
        .append( "<a>" + item.label + "</a>")
        .appendTo( ul );
    };

});

function submit_search()
{
	var search_id = $('#project-id').val();
	$.ajax({
		method: "POST",
		url: "<?php echo site_url('welcome/searchItem');?>",
		data: { 'search_map_id': search_id},
	}) 
	.done(function(msg) {
		$('#search_result').html(msg);
	});
}
</script>

</head>
<body> 

  <img src="<?php echo base_url();?>assets/images/1453880282495.jpg" width="374" height="527" style="float:right;margin-top:18%;"/>
 
 	<form class="searchform" method="post" id="searchbox">
		
		<input class="searchfield" id="searchfieldinput"  type="text" value="Search..." 
			onfocus="if (this.value == 'Search...') {this.value = '';}" 
			onblur="if (this.value == '') {this.value = 'Search...';}" />
		
		<input type="hidden" name="search_map_id" id="project-id">
		<input class="searchbutton" type="button" value="Go" onclick="submit_search()" />
	</form>

	<div style="clear:both"></div>
	<div id="search_result"></div>

</body>
</html>

