<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Minecraft</title>

    <!-- import the webpage's stylesheet -->

    <!-- import the webpage's javascript file -->
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-teleport-controls@0.2.x/dist/aframe-teleport-controls.min.js"></script>
    <script>
      AFRAME.registerComponent("random-color", {
        dependencies: ["material"],

        init: function() {
          this.el.setAttribute("material", "color", getRandomColor());
        }
      });

      AFRAME.registerComponent("snap", {
        dependencies: ["position"],

        schema: {
          offset: { type: "vec3" },
          snap: { type: "vec3" }
        },

        init: function() {
          this.originalPos = this.el.getAttribute("position");
        },

        update: function() {
          const data = this.data;

          const pos = AFRAME.utils.clone(this.originalPos);
          pos.x = Math.floor(pos.x / data.snap.x) * data.snap.x + data.offset.x;
          pos.y = Math.floor(pos.y / data.snap.y) * data.snap.y + data.offset.y;
          pos.z = Math.floor(pos.z / data.snap.z) * data.snap.z + data.offset.z;

          this.el.setAttribute("position", pos);
        }
      });

      AFRAME.registerComponent("intersection-spawn", {
        schema: {
          default: "",
          parse: AFRAME.utils.styleParser.parse
        },

        init: function() {
          const data = this.data;
          const el = this.el;

          el.addEventListener(data.event, evt => {
            // Create element.
            const spawnEl = document.createElement("a-entity");

            // Snap intersection point to grid and offset from center.
            spawnEl.setAttribute("position", evt.detail.intersection.point);

            // Set components and properties.
            Object.keys(data).forEach(name => {
              if (name === "event") {
                return;
              }
              AFRAME.utils.entity.setComponentProperty(
                spawnEl,
                name,
                data[name]
              );
            });

            // Append to scene.
            el.sceneEl.appendChild(spawnEl);
          });
        }
      });

      function getRandomColor() {
        const letters = "0123456789ABCDEF";
        var color = "#";

        for (var i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }

        return color;
      }

      //       document.querySelector('#blockHand').addEventListener(`click`, function (evt) {
      //         // Create a blank entity.
      //         var newVoxelEl = document.createElement('a-entity');

      //         // Use the mixin to make it a voxel.
      //         newVoxelEl.setAttribute('mixin', 'voxel');

      //         // Set the position using intersection point. The `snap` component above which
      //         // is part of the mixin will snap it to the closest half meter.
      //         newVoxelEl.setAttribute('position', evt.detail.intersection.point);

      //         // Add to the scene with `appendChild`.
      //         this.appendChild(newVoxelEl);
      //       });
    </script>
  </head>
  <body>
    <a-scene>
      <a-assets>
        <img
          id="floorTexture"
          src="https://cdn.aframe.io/a-painter/images/floor.jpg"
        />
        <img id="skybox" src="https://cdn.aframe.io/a-painter/images/sky.jpg" />
        <a-mixin
          id="voxel"
          geometry="primitive: box; height: 0.5; width: 0.5; depth: 0.5"
          material="shader: standard"
          random-color
          snap="offset: 0.25 0.25 0.25; snap: 0.5 0.5 0.5"
        ></a-mixin>
      </a-assets>

      <a-entity id="cameraRig">
        <a-entity id="head" camera wasd-controls look-controls></a-entity>

        <!--         <a-entity id="teleHand" 
                  hand-controls="left" 
                  teleport-controls="type: parabolic; collisionEntities: [mixin='voxel'], #ground"></a-entity>
        <a-entity id="blockHand" 
                  hand-controls="right"></a-entity> -->

        <!--         <a-entity id="left-hand" teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head;" oculus-touch-controls></a-entity>
        <a-entity id="right-hand" teleport-controls="cameraRig: #cameraRig; teleportOrigin: #head;"></a-entity> -->

        <a-entity
          id="teleHand"
          oculus-touch-controls="hand: left"
          teleport-controls="type: parabolic; collisionEntities: [mixin='voxel'], #ground; button: trigger; cameraRig: #cameraRig; teleportOrigin: #head;"></a-entity>
        <a-entity
          id="blockHand"
          oculus-touch-controls="hand: right"
          laser-controls
          intersection-spawn="event: click; mixin: voxel"
        ></a-entity>
      </a-entity>

      <a-entity mixin="voxel" position="-1 0 -2"></a-entity>
      <a-entity mixin="voxel" position="0 0 -2"></a-entity>
      <a-entity mixin="voxel" position="0 1 -2">
        <a-animation
          attribute="rotation"
          to="0 360 0"
          repeat="indefinite"
        ></a-animation>
      </a-entity>
      <a-entity mixin="voxel" position="1 0 -2"></a-entity>
      <a-cylinder
        id="ground"
        radius="30"
        height="0.1"
        src="#floorTexture"
      ></a-cylinder>

      <a-sky src="#skybox" radius="30" theta-length="90"></a-sky>

      <a-camera>
        <a-cursor intersection-spawn="event: click; mixin: voxel"></a-cursor>
      </a-camera>
    </a-scene>
  </body>
</html>
