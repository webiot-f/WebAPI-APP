function Cmd(){
    let command = window.prompt("Cmd?")
    if(command === "Saisana"){
        window.alert("コマンド"+command+"が入力されました。\n")
    }
    if(command === "progress"){
        window.alert("実装予定の機能\n1.入力idの場所の天気\n2.決まった後になるけどグラフ\n3.おみくじ（なんで？）\nそのほかデザイン")
    }
    if(command === "wc"){
        let cityid = window.prompt("id?(未実装）")
    }
    //if
    else{
        window.alert(command+"というコマンドはありません！")
    }
}
document.onkeydown = keydown;

function keydown() {
target = document.getElementById("messageCtrl");
if (event.ctrlKey == true) {
  Cmd()
}
else {
  target.innerHTML = "";
}};