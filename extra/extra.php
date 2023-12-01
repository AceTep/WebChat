<html>
<head>
<style type="text/css">
.content {
    display: none;
}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<script type="text/javascript">
    
$(document).ready(function(){
    $('#menu a').each(function(){
        id = $(this).attr('href');
        id = id.substring(id.lastIndexOf('/'));
        id = id.substring(0,id.indexOf('.'));
        $(this).attr('rel',id);
    });
    $('#home').show();
    $('#menu a').click(function(e){
        e.preventDefault();
        $('.content').hide();
        $('#'+$(this).attr('rel')).show();
        location.hash = '#!/'+$(this).attr('rel');
        return false;
    });
});

</script>
</head>
<body>
<div id="menu">
    <a href="home.html">Home</a> -
    <a href="one.html">One</a> -
    <a href="two.html">Two</a> -
    <a href="three.html">Three</a>
</div>
<div id="home" class="content">
    Home content.
</div>
<div id="one" class="content">
    One content.
</div>
<div id="two" class="content">
    Two content.
</div>
<div id="three" class="content">
    Three content.
</div>
</body>
</html>