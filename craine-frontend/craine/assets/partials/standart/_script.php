<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>

<!-- alert js -->
<script src="assets/js/alert-js.js"></script>

<script src="https://cdn.jsdelivr.net/npm/three@0.136.0/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.136.0/examples/js/loaders/GLTFLoader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.136.0/examples/js/controls/OrbitControls.js"></script>

<script>
    var SITE_URL = '<?= $settings::$base ?>';

    function send(btn, frm, operation) {
        var oldBtn = $('#' + btn).html();
        $("#" + btn).html("<ion-icon name=\"hourglass-outline\"></ion-icon>").prop('disabled', true);
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var myData = new FormData($("#" + frm)[0]);
        $.ajax({
            type: "POST",
            url: SITE_URL + 'process/' + operation,
            data: myData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#' + btn).html(oldBtn).prop('disabled', false);
                var data = data.split(':::');
                alertJS(data[0], data[1], 2000);
                if (data[2].length > 0) {
                    if (data[2] == 'reload') {
                        data[2] = window.location.href;
                    } else if (data[2] == 'referer') {
                        data[2] = document.referrer;
                    } else {
                        data[2] = SITE_URL + data[2];
                    }
                    setTimeout(function() {
                        window.location.href = data[2];
                    }, 2000);
                }
            }
        });
    }

    function go(url) {
        window.location.href = SITE_URL + url;
    }





    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    <?php
    if ($settings->page == "airplane") {
    ?>


        var camera, scene, renderer, controls;

        init();
        animate();

        // create a new array to store the position of the cubes

        function init() {

            <?php
            $fileget = file_get_contents("http://192.168.137.153:8090/api/cargos");

            $jsonDecode = json_decode($fileget, true);

            $arr = [];

            for ($i = 0; $i < count($jsonDecode); $i++) {
                $size = explode('-', $jsonDecode[$i]['size']);
                array_push($arr, $size);
            }
            ?>


            var array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            // Create a camera
            camera = new THREE.PerspectiveCamera(
                75,
                window.innerWidth / window.innerHeight,
                0.1,
                1000
            );
            camera.position.z = 5;

            // Create a scene
            scene = new THREE.Scene();
            scene.background = new THREE.Color("#ffffff");

            // Load the GLB model
            var loader = new THREE.GLTFLoader();
            loader.load("three/transPlane2.glb", function(gltf) {
                // Set the transparency of the model's material
                gltf.scene.traverse(function(node) {
                    if (node.isMesh) {
                        node.material.transparent = true;
                        node.material.opacity = 0.5;
                        if (node.material.length) {
                            for (var i = 0; i < node.material.length; i++) {
                                node.material[i].transparent = true;
                                node.material[i].opacity = 0.2;
                            }
                        }
                    }
                });



                // Load the texture image
                var textureLoader = new THREE.TextureLoader();
                textureLoader.load("three/white.png", function(texture) {
                    // Apply the texture to the model's material
                    gltf.scene.traverse(function(node) {
                        if (node.isMesh) {
                            node.material.map = texture;
                        }
                    });
                });

                // Add the model to the scene
                scene.add(gltf.scene);
                airPlane = gltf.scene;
            });

            //create a cube model with specified position
            var geometry = new THREE.BoxGeometry(9, 0.7, 47.5);
            var material = new THREE.MeshBasicMaterial({
                color: "#dd0d0d"
            });
            var cube = new THREE.Mesh(geometry, material);
            cube.position.set(-0.5, 0.2, -35);
            scene.add(cube);

            let width = 2;
            let height = 2;
            let length = 2;

            //create a cube model with random sizes
            let x = 0;
            let y = 2.3;
            let z = -10;

            // math random function to generate random int numbers
            <?php
            for ($i = 0; $i < count($arr); $i++) {
            ?>
                var textureLoader = new THREE.TextureLoader();
                textureLoader.load("three/271_thy.jpg", function(texture) {
                    // Create the material and mesh using the texture here
                    var geometry = new THREE.BoxGeometry(<?= $arr[$i][0] ?>, <?= $arr[$i][1] ?>, <?= $arr[$i][2] ?>);
                    var material = new THREE.MeshStandardMaterial({
                        map: texture
                    });
                    var cube = new THREE.Mesh(geometry, material);
                    cube.position.set(x, y, (z -= 4.5));
                    scene.add(cube);
                });
            <?php } ?>

            // Add global lighting to the scene
            var ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);

            var globalLight = new THREE.DirectionalLight(0xffffff, 1);
            globalLight.position.set(0, 1, 0);
            scene.add(globalLight);

            // Add a spotlight to the scene, focused on the model
            var spotLight = new THREE.SpotLight(
                0xffffff,
                1,
                200,
                Math.PI / 4,
                0.5,
                2
            );
            spotLight.position.set(0, 5, 0);
            spotLight.target.position.set(0, 0, 0);
            scene.add(spotLight);
            scene.add(spotLight.target);

            // Create a renderer
            renderer = new THREE.WebGLRenderer({
                antialias: true
            });
            renderer.setSize(window.innerWidth, window.innerHeight);
            var threejsclassselect = document.querySelector(".threejs");
            threejsclassselect.appendChild(renderer.domElement);

            // Create an OrbitControls instance and add it to the camera
            controls = new THREE.OrbitControls(camera, renderer.domElement);
            controls.enableDamping = true;
            controls.dampingFactor = 0.25;
            controls.rotateSpeed = 0.3;
            controls.zoomSpeed = 1.2;
            controls.minDistance = 0;
            controls.maxDistance = 100;
            controls.target.set(0, 0, 0);

            // Add a resize listener to adjust the camera aspect ratio
            window.addEventListener("resize", function() {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }

        function animate() {
            requestAnimationFrame(animate);

            // Update the OrbitControls instance
            controls.update();

            // Render the scene
            renderer.render(scene, camera);
        }

    <?php } ?>
</script>