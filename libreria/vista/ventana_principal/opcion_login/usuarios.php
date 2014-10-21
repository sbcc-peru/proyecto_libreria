<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js' type='text/javascript'/> </script>
<script type='text/javascript'>
//<![CDATA[
$(document).ready(function() {
$("body").css("z-index", "-10");
$("body").fadeIn(0);

$("a").click(function(event){
event.preventDefault();
linkLocation = this.href;
$("body").fadeOut(1000, redirectPage); });
function redirectPage() {
window.location = linkLocation;
}
});
//]]>
</script>
<style>
html {
background-color: #f2f2f2; /* Color del desvanecimiento */
}
</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
sasdasdasds
</body>
</html>