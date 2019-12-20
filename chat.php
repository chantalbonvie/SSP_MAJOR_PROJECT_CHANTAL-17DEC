<?php

require_once("header.php");

// session_start();
//   if(IsSet($_SESSION[ "usrname" ]) && $_SESSION[ "usrname" ] == "") 
//   {
?>
  <script src="js/main.js"></script>


  <h3>Please choose a chat name and a color</h3>
  <form action="/actions/login.php" method="post">
    <table cellpadding="5" cellspacing="0">
      <tr>
        <td  valign="top">Name :</td>
        <td  valign="top">
          <input type="text" name="usrname" />
        </td>
      </tr>
      <tr>
        <td  valign="top">Color :</td>
        <td  valign="top">
          <select name="color">
            <option value="000000">Black</option>
            <option value="000080">Navy</option>
            <option value="800080">Purple</option>
            <option value="00FFFF">Aqua</option>
            <option value="FFFF00">Yellow</option>
            <option value="008080">Teal</option>
            <option value="A52A2A">Brown</option>
            <option value="FFA500">Orange</option>
            <option value="CCCCCC">Gray</option>
            <option value="0000FF">Blue</option>
            <option value="00FF00">Green</option>
            <option value="FF00FF">Magenta</option>
            <option value="FF0000">Red</option>
          </select>
        </td>
      </tr>
      <tr>
        <td  valign="top"></td>
        <td  valign="top"><input type="submit" value="Login" /></td>
      </tr>
    </table>
  </form>

<?php 

if(IsSet($_SESSION[ "usrname" ]) && $_SESSION[ "usrname" ] == "") 
{


}else{ 
    
?>
 <div id="view_ajax"></div>
  <div id="ajaxForm">
    <input type="text" id="chatInput"><input type="button" value="Send" id="btnSend">
  </div> 
</div>
<br>
<br> 
<?php
}
?>