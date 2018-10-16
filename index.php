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
      border-radius: 50%;
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

let mock = [{"count":1,"x":0,"y":0,"click":false},{"count":1,"x":0,"y":0,"click":false},{"count":1,"x":51,"y":30,"click":false},{"count":1,"x":132,"y":126,"click":false},{"count":1,"x":152,"y":136,"click":false},{"count":1,"x":180,"y":136,"click":false},{"count":1,"x":256,"y":135,"click":false},{"count":1,"x":303,"y":158,"click":false},{"count":1,"x":276,"y":205,"click":false},{"count":1,"x":259,"y":218,"click":false},{"count":1,"x":259,"y":218,"click":false},{"count":1,"x":243,"y":218,"click":true},{"count":1,"x":172,"y":201,"click":false},{"count":1,"x":135,"y":155,"click":false},{"count":1,"x":225,"y":77,"click":false},{"count":1,"x":312,"y":82,"click":false},{"count":1,"x":345,"y":103,"click":false},{"count":1,"x":346,"y":104,"click":false},{"count":1,"x":346,"y":104,"click":true},{"count":1,"x":6,"y":16,"click":false},{"count":1,"x":335,"y":219,"click":false},{"count":1,"x":306,"y":254,"click":false},{"count":1,"x":281,"y":259,"click":false},{"count":1,"x":275,"y":259,"click":false},{"count":1,"x":275,"y":259,"click":false},{"count":1,"x":270,"y":259,"click":true},{"count":1,"x":176,"y":249,"click":false},{"count":1,"x":134,"y":239,"click":false},{"count":1,"x":146,"y":160,"click":false},{"count":1,"x":213,"y":112,"click":false},{"count":1,"x":299,"y":99,"click":false},{"count":1,"x":521,"y":180,"click":false},{"count":1,"x":545,"y":249,"click":false},{"count":1,"x":489,"y":309,"click":false},{"count":1,"x":407,"y":345,"click":false},{"count":1,"x":337,"y":354,"click":false},{"count":1,"x":274,"y":339,"click":false},{"count":1,"x":205,"y":205,"click":false},{"count":1,"x":266,"y":126,"click":false},{"count":1,"x":413,"y":114,"click":false},{"count":1,"x":511,"y":165,"click":false},{"count":1,"x":517,"y":272,"click":false},{"count":1,"x":361,"y":349,"click":false},{"count":1,"x":283,"y":318,"click":false},{"count":1,"x":262,"y":255,"click":false},{"count":1,"x":319,"y":185,"click":false},{"count":1,"x":402,"y":226,"click":false},{"count":1,"x":404,"y":233,"click":false},{"count":1,"x":404,"y":233,"click":true},{"count":1,"x":6,"y":12,"click":false},{"count":1,"x":375,"y":332,"click":false},{"count":1,"x":276,"y":323,"click":false},{"count":1,"x":247,"y":279,"click":false},{"count":1,"x":330,"y":174,"click":false},{"count":1,"x":403,"y":163,"click":false},{"count":1,"x":456,"y":178,"click":false},{"count":1,"x":479,"y":222,"click":false},{"count":1,"x":476,"y":284,"click":false},{"count":1,"x":437,"y":328,"click":false},{"count":1,"x":359,"y":327,"click":false},{"count":1,"x":311,"y":294,"click":false},{"count":1,"x":297,"y":185,"click":false},{"count":1,"x":339,"y":126,"click":false},{"count":1,"x":417,"y":128,"click":false},{"count":1,"x":485,"y":155,"click":false},{"count":1,"x":489,"y":162,"click":false},{"count":1,"x":489,"y":162,"click":true},{"count":1,"x":489,"y":162,"click":false},{"count":1,"x":441,"y":248,"click":false},{"count":1,"x":339,"y":279,"click":false},{"count":1,"x":282,"y":265,"click":false},{"count":1,"x":259,"y":231,"click":false},{"count":1,"x":288,"y":186,"click":false},{"count":1,"x":367,"y":154,"click":false},{"count":1,"x":432,"y":154,"click":false},{"count":1,"x":482,"y":176,"click":false},{"count":1,"x":504,"y":207,"click":false},{"count":1,"x":491,"y":268,"click":false},{"count":1,"x":448,"y":313,"click":false},{"count":1,"x":389,"y":310,"click":false},{"count":1,"x":360,"y":298,"click":false},{"count":1,"x":327,"y":254,"click":false},{"count":1,"x":321,"y":237,"click":false},{"count":1,"x":320,"y":207,"click":false},{"count":1,"x":333,"y":161,"click":false},{"count":1,"x":387,"y":139,"click":false},{"count":1,"x":433,"y":138,"click":false},{"count":1,"x":437,"y":138,"click":false},{"count":1,"x":437,"y":138,"click":true},{"count":1,"x":10,"y":11,"click":false},{"count":1,"x":476,"y":217,"click":false},{"count":1,"x":438,"y":322,"click":false},{"count":1,"x":381,"y":347,"click":false},{"count":1,"x":354,"y":335,"click":false},{"count":1,"x":352,"y":333,"click":false},{"count":1,"x":342,"y":328,"click":false},{"count":1,"x":334,"y":317,"click":false},{"count":1,"x":326,"y":301,"click":false},{"count":1,"x":324,"y":284,"click":false},{"count":1,"x":328,"y":262,"click":false},{"count":1,"x":349,"y":237,"click":false}];
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
var cursor = document.getElementById('cursor');

videoEl.addEventListener('mousemove',function(e){
  if(e.offsetX != 0 && e.offsetY != 0){
    x = e.offsetX;
    y = e.offsetY;
  }
});
videoEl.addEventListener('click', function(){click = true})

btn_start.addEventListener('click', startTrucking);

function startTrucking(){
  setInterval(function(){
    mappingObject.x = x;
    mappingObject.y = y;
    mappingObject.click = click;
    moveData.push(Object.assign({},mappingObject));
    //TODO 初回とかリセット直後の動作的によろしくない。
    let oldX = moveData[moveData.length-2].x
    let oldY = moveData[moveData.length-2].y

    var beforTrans = `translate(${oldX}px, ${oldY}px) `
    var afterTrans = `translate(${x}px, ${y}px) `
    if (click){
      beforTrans += "scale(1)";
      afterTrans += "scale(3)";
    }
    cursor.animate([
      {transform: beforTrans},
      {transform: afterTrans},
    ],101)
    if (click){
      cursor.animate([
        {width:"10px",height:"10px"},
        {width:"20px",height:"20px"},
      ],101)
    }
    console.log(moveData);
    click = false;

    if(moveData.length > 100){
      console.log(JSON.stringify(moveData));
      moveData = [];
    }
  }, 100);
}

setInterval(function(){
  console.log('reset');
}, 10000);

let count = 1;
setInterval(function(){
  var old = mock[count-1];
  var data = mock[count];
  var beforTrans = `translate(${old.x}px, ${old.y}px) `
  var afterTrans = `translate(${data.x}px, ${data.y}px) `
  if (data.click){
    beforTrans += "scale(1)";
    afterTrans += "scale(3)";
  }
  cursor.animate([
    {transform: beforTrans},
    {transform: afterTrans},
  ],101)
  count ++;
}, 100)

</script>
</body>

</html>
