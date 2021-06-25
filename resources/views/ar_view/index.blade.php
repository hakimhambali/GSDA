<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AR Scene</title>
    
    <!-- import the webpage's stylesheet -->
    
    <!-- import the webpage's javascript file -->
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar-nft.js"></script>
    <script src="https://unpkg.com/aframe-extras.animation-mixer@3.4.0/dist/aframe-extras.animation-mixer.js"></script>

    <style>
      .btn-primary {
        background-size: 90% 90%;
        border: 0;
        top: 0;
        color: #fff;
        cursor: pointer;
        min-width: 58px;
        min-height: 34px;
        outline: 0;
        position: fixed;
        left: 0;
        transition: background-color .05s ease;
        user-select: none;
        -webkit-transition: background-color .05s ease;
        z-index: 9999;
        border-radius: 8px;
        touch-action: manipulation;
      }
      
      .btn-primary:active, .btn-primary:hover {
        background-color: #ef2d5e;
      }
    </style>
  </head>  
  <body style="margin : 0px; overflow: hidden;">
    <a-scene embedded arjs>
      <a-assets>
        <a-asset-item id="3dmodel" 
          src="{{ URL::to(''.$modelSrc->file_path.'') }}"></a-asset-item>
      </a-assets>
      
      <div>
        <button class="change-size btn-primary" style="left: 0; top: 0" addvalue="-0.05" cursor-listener>- Reduce size</button>
        <button class="change-size btn-primary" style="left: 100px; top: 0" addvalue="0.05" cursor-listener>+ Add size</button>
      </div>

      <a-marker type="pattern" url="{{ asset('ar-markers/pattern-AR-marker.patt') }}">
        <a-entity id="gltfModel" gltf-model="#3dmodel" 
          position="0 0 0" 
          animation-mixer></a-entity>
      </a-marker>
      <a-entity camera></a-entity>
    </a-scene>

    <script>
      var buttons = document.querySelectorAll('.change-size');
      
      for(var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(evt) {
          var btnEl = evt.target;
          var addValue = parseFloat(btnEl.getAttribute('addvalue'));
          
          var targetModel = document.querySelector('#gltfModel');
          var scale = targetModel.getAttribute('scale');
          targetModel.setAttribute('scale', {
            x: scale.x + addValue,
            y: scale.y + addValue,
            z: scale.z + addValue
          });
        });
      }
    </script>
  </body>
</html>
