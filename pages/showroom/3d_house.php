<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D House Display</title>
</head>
<body>
    

<script src="js/three.min.js"></script>
<script src="js/GLTFLoader.js"></script>
<script src="js/FBXLoader.js"></script>
<script src="js/fflate.min.js"></script>

<script src="https://threejs.org/build/three.min.js"></script>
<script src="https://threejs.org/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://threejs.org/examples/js/controls/OrbitControls.js"></script>

<script>
			const scene = new THREE.Scene();
            
            
			const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

            
			const renderer = new THREE.WebGLRenderer();
            
			renderer.setSize( window.innerWidth, window.innerHeight );
			document.body.appendChild( renderer.domElement );

            var controls = new THREE.OrbitControls(camera, renderer.domElement);
            camera.position.set(0, 5, 15);
            renderer.setClearColor(0x808080);

            var light = new THREE.HemisphereLight( 0xffffbb, 0x080820, 1 );
            scene.add( light );

            const loader = new THREE.GLTFLoader();

            loader.load( 'src/lowPolyHouse1.glb', function ( gltf ) {

                scene.add( gltf.scene );

            }, undefined, function ( error ) {

                console.error( error );

            } );

            render();

function render() {
  if (resize(renderer)) {
    camera.aspect = canvas.clientWidth / canvas.clientHeight;
    camera.updateProjectionMatrix();
  }
  renderer.render(scene, camera);
  requestAnimationFrame(render);
}

function resize(renderer) {
  const canvas = renderer.domElement;
  const width = canvas.clientWidth;
  const height = canvas.clientHeight;
  const needResize = canvas.width !== width || canvas.height !== height;
  if (needResize) {
    renderer.setSize(width, height, false);
  }
  return needResize;
}

		</script>
</body>
</html>