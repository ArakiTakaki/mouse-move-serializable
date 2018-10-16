<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SampleJavascirpt</title>
  <style>
    #cursor{
      position: relative;
      width: 10px;
      height: 10px;
      background-color: #000;
    }
  </style>
</head>
<body>

<button id="start_trucking">start</button>
<button id="stop_trucking">stop</button>
<div id="caputuer_video">
  <div id="cursor"></div>
  <img src="https://placehold.jp/600x400.png" alt="">
</div>

<script>

// 最小構成

var mappingObject = {
  count: 1, //1mm秒単位
  x: 0,
  y: 0,
  click: false,
}

var x = 0;
var y = 0;
var click = false;
var moveData = [];
var videoEl = document.getElementById('caputuer_video');
var btn_start = document.getElementById('start_trucking');

videoEl.addEventListener('mousemove',function(event){
  x = event.screenX;
  y = event.screenY;
});
videoEl.addEventListener('click', function(){click = true})

btn_start.addEventListener('click', startTrucking);

function startTrucking(){
  setInterval(function(){
    mappingObject.x = x;
    mappingObject.y = y;
    mappingObject.click = click;
    click = false;
    moveData.push(Object.assign({},mappingObject));
    if(moveData.length > 100){
      moveData = [];
    }
    console.log(moveData);
  }, 100);
}

setInterval(function(){
  console.log('reset');
}, 10000);

</script>
</body>

</html>
