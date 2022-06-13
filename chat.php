<!-- Стили для блока с сообщениями!-->
<style>
#messages
{
  width: 20vmax;
  height: 30vmax;
  background-color: #ff8b42;
  overflow:auto;
  z-index: 1000;
  border:1px solid silver;
  position: fixed;
  float: left;
  bottom: 0;
  margin-bottom: 2.7vmax;
}
#mess_to_send {
  padding: 0.3vmax;
  position: fixed;
  bottom: 0px;
  z-index: 1000;
  width: 18vmax;
  background-color: #ff8b42;
  font-size: 1.2vmax;
  margin-bottom: 0.3vmax;
}

</style>



<div id="messages">
  <?php
if ($_SESSION['check']) {?>
  <script defer src="../jquery-3.6.0.js"></script>
  <script defer src="../chatjs2.js"></script> <?php
}else{?>  
  <script defer src="jquery-3.6.0.js"></script>
<script defer src="chatjs.js"></script>
  <?php
}  
?>

<table>
<tr>
<td id="text">


</td>
</tr>
<tr>
<td>

</td>
</tr>
</table>
</div>
<form action="javascript:send();">
<input type="text" id="mess_to_send" autocomplete="off">
</form>
<!-- 
<script type="text/javascript" src="http://www.google.com/jsapi">

</script> -->