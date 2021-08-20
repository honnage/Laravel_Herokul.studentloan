var scene, camera, renderer;

scene = new THREE.Scene();
scene.background = new THREE.Color(0xf0d98e);
camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 5000);
// camera = new THREE.PerspectiveCamera( 40, 500 / 500, 1, 5000);

camera.position.set(-5, 10, 100);
// camera.position.z = 15;


aLight = new THREE.AmbientLight(0xffffff, 1);
scene.add(aLight);

directionalLight = new THREE.DirectionalLight(0xF1FCE3,1);
directionalLight.position.set(0, 5, 0);
directionalLight.castShadow = true;
scene.add(directionalLight);
light = new THREE.PointLight(0xF1FCE3,1);
light.position.set(0, 3, 5);
scene.add(light);
light2 = new THREE.PointLight(0xF1FCE3,1);
light2.position.set(5, 1, 0);
scene.add(light2);
light3 = new THREE.PointLight(0xF1FCE3,1);
light3.position.set(0, 1, -5);
scene.add(light3);
light4 = new THREE.PointLight(0xF1FCE3,1);
light4.position.set(-5, 3, 5);
scene.add(light4);

// pLight = new THREE.PointLight(0xffffff, 2);
// pLight.position.set(10, 0, 70);
// scene.add(pLight);

renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
// renderer.setSize(500, 500);

controls = new THREE.OrbitControls(camera, renderer.domElement);
document.body.appendChild(renderer.domElement);

let loader = new THREE.GLTFLoader();
loader.load(
  "model/low_poly_tree/t.gltf",
  function (gltf) {
    const model = gltf.scene;
    model.position.set(1, 1, 0);
    model.scale.set(0.25, 0.25, 0.25);
    scene.add(gltf.scene);
  },
  undefined,
  function (error) {
    console.error(error);
  }
);

window.addEventListener('resize', function(){
  var width = window.innerWidth
  var height = window.innerHeight;
  renderer.setSize(500, height);
  camera.aspect = width / height;
  camera.updateProjectionMatrix();
});


function upScale() {
  document.getElementById("myCheck").click();
  scale.set(1 + up_scale, 1 + up_scale, 1 + up_scale);
  scene.add(gltf.scene);
}

// สำหรับทำโมเดลหมุม
var update = function(){
  // scene.rotation.x += 0.01;
  scene.rotation.y += 0.003
};

function animate(){
  requestAnimationFrame(animate);
  update();
  renderer.render(scene,camera);
}

animate();