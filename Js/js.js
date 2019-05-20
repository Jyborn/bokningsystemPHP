window.onload = function() {

  let loginContainer = document.getElementById('loginContainer');
  let loginButton = document.getElementById('loginButton');
  let userPk;
  loginButton.addEventListener("click", function() {
    loginContainer.style.visibility = "visible";
  });

  $("#submitLoginButton").click(function(){
    console.log("klick på submitloginButton");
    $.getJSON({
      type: 'POST',
      url: 'Login/login',
      data: {username: $("#inputUsername").val(), password: $("#inputPassword").val()},
      success: function(data){
        console.log(data);
        if (data.login == true) {
          console.log("inne");
          loginContainer.style.visibility = "hidden";
          loginButton.style.display = "none";
          userPk = data.user_pk;
        } else {
          console.log("inte inloggad");
        }
      }
    });
  });

  document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement,
        text = target.textContent || target.innerText;

    var isCell = Number.isInteger(parseInt(target.id));
    if (isCell) {
      target.className = "booked";
    }
    //skicka till db user som bokar och vilken cell som bokas med hjälp av pk
    $.getJSON({
      type: 'POST',
      url: 'SchemaCell/bookSchemaCell',
      data: {username: userPk, cell_pk: target.id},
      success: function(data){
        console.log(data);
        if (data.booked == true) {
          console.log("bokad");
        } else {
          console.log("inte bokad");
        }
      }
    });
  });
}
