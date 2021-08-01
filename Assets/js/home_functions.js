var gameId;
var curCarril = 1;

window.addEventListener(
    "load",
    function () {
        eventBtnAddPlayer()   
        eventMenu() 
    },
    false
  );

function addPlayer() {
    let quantity = document.querySelectorAll("#playersDiv .form-group").length
    var divPlayers = document.getElementById('playersDiv') 
    var newDiv = document.createElement("div")
    newDiv.classList = "form-group my-3"
    newDiv.innerHTML = 
        `<label for="namePlayer${quantity + 1}" class="form-label">Jugador #${quantity + 1}</label>
        <input type="text" class="form-control" name="namePlayer${quantity + 1}">`                
    divPlayers.appendChild(newDiv);    
}

 async function eventMenu() {
    var FrmMenu = document.getElementById("fmMenu");
    FrmMenu.addEventListener(
      "submit",
      (e) => {
        e.preventDefault();
        let quantity = document.querySelectorAll("#playersDiv .form-group").length
        var data = new FormData(FrmMenu);
        data.append("quantity", quantity);
        var url = "/home/startGame"
        eventRequest(url, data).then(rsp => {            
            document.getElementById('bgVideo').classList = "d-none"
            document.getElementById('menu').classList = "d-none"
            gameId = rsp.gameId
            getViewGame(rsp.gameId)
        })
      },
      false
    );
}

function eventBtnAddPlayer() {
    var btnAddPlayer = document.getElementById('addPlayer')
    btnAddPlayer.onclick = (e) =>  {
        e.preventDefault;        
        addPlayer();
    }
}

function eventRequest(url, data) {
  return new Promise(function (resolve) {        
    var request = window.XMLHttpRequest
        ? new XMLHttpRequest()
        : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url + url;
    request.open("POST", ajaxUrl, true);
    request.send(data);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
              var rsp = JSON.parse(request.responseText);            
            resolve(rsp)   
        }
    };
  })
}

function getViewGame(gameId) {
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/home/getViewGame/"+gameId;
  request.open("GET", ajaxUrl, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var rsp = JSON.parse(request.responseText);
      document.getElementById('mainDiv').innerHTML = rsp.view;
      getTurno(rsp.players);
    }
  };
}

function getTurno(maxPlayers) {
    var maxPlayers = parseInt(maxPlayers)
    if (maxPlayers >= curCarril) {
        curCarril = 1;
    }
    else{
        curCarril = curCarril + 1;
    }
    tirarDado();
}

function tirarDado(carril) {
  var data = new FormData();
  data.append("gameId", gameId);
  data.append("carril", curCarril);
  var url = "/home/getInfoCarril";
  eventRequest(url, data).then((rsp) => {
        document.querySelector('#title-modalPlay').innerHTML = "Es tu turno de tirar " + rsp.name;
        document.querySelector('#regId').value = rsp.id_register;
        var modalPlay = new bootstrap.Modal(document.getElementById("modalPlay"), {});            
        modalPlay.show(); 
        eventTirar();       
  });
}

function eventTirar() {
    var btn = document.getElementById('btnTirar')
    btn.addEventListener("click", () => {
        var parrafo = document.getElementById('result').innerHTML = "Tiraste tu dado espera un momento";
        var regId = document.querySelector('#regId').value;
        var url = "/home/advanceCart"
        data = new FormData();        
        data.append("regId", regId);
        eventRequest(url, data).then((rsp) => {                        
            var modalPlay = new bootstrap.Modal(document.getElementById("modalPlay"), {});            
            modalPlay.hide();      
            alert()  
        });
    },false)
}

