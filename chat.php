<!-- Стили для блока с сообщениями!-->

<style>
#messages
{
  width: 20vmax;
  height: 30vmax;
  background-color: #ff8b42;
  overflow:auto;
  z-index: 1000;
  border:0.23vw solid black;
  border-radius: 1vmax;
  position: fixed;
  float: left;
  bottom: 0;
  margin-bottom: 5.2vmax;
}
#mess_to_send {
  padding: 0.3vmax;
  position: fixed;
  bottom: 0px;
  z-index: 1000;
  width: 17vmax;
  background-color: #ff8b42;
  border: 0.20vw solid black;
  border-radius: 0.5vmax;
  font-size: 1.2vmax;
  margin-bottom: 2.7vmax;
  margin-left: 1vmax;
}
#hideChat,
#showChat{
width: 18vmax;
position: fixed;
bottom: 0px;
z-index: 1000;
background-color: #ff8b42;
margin-bottom: 35.2vmax;
border: 0.20vw solid black;
margin-left: 1vmax;
border-radius: 1vmax;
font-size: 1.5vmax;
opacity: 0.7;
}
#showChat{
  display: none;
  margin-bottom: 2.7vmax;
}
#hideChat:hover,
#showChat:hover {
opacity: 1;
}


</style>

<button id="hideChat" class="hideButton"> ↓ скрыть ↓ </button>
<button id="showChat" class="showButton"> ↑ показать ↑ </button>

<div id="messages" class="chat">
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
<form action="javascript:send();" id="chatForm" class="input">
<input type="text" id="mess_to_send" autocomplete="off">
</form>

<script type="text/javascript">
  console.log("alooo");
var showButton = document.getElementById("showChat");
var hideButton = document.getElementById("hideChat");
var chat = document.getElementById("messages");
var input = document.getElementById("chatForm");


hideButton.addEventListener("click", () => {
chat.style.display = "none";
input.style.display = "none";
hideButton.style.display = "none";
showButton.style.display = "block";

});

showButton.addEventListener("click", () => {
chat.style.display = "block";
input.style.display = "block";
hideButton.style.display = "block";
showButton.style.display = "none";
});
</script>
