<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تجربة الواقع المعزز</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background: #000;
            font-family: Arial, sans-serif;
        }
        #status {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            background: rgba(0,0,0,0.8);
            padding: 15px 25px;
            border-radius: 25px;
            text-align: center;
            z-index: 1000;
        }
        #startButton {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 30px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            display: none;
        }
    </style>
</head>
<body>
    <div id="status">جاري التحقق من دعم الواقع المعزز...</div>
    <button id="startButton">بدء تجربة الواقع المعزز</button>

    <script type="module">
        import * as THREE from 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.module.js';

        const status = document.getElementById('status');
        const startButton = document.getElementById('startButton');
        let currentSession = null;

        function showStatus(message, isError = false) {
            status.style.display = 'block';
            status.style.background = isError ? 'rgba(255,0,0,0.8)' : 'rgba(0,0,0,0.8)';
            status.textContent = message;
        }

        function createScene() {
            const scene = new THREE.Scene();
            const light = new THREE.DirectionalLight(0xffffff, 1);
            light.position.set(1, 1, 1);
            scene.add(light);

            const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
            scene.add(ambientLight);

            return scene;
        }

        function createCube() {
            const geometry = new THREE.BoxGeometry(0.1, 0.1, 0.1);
            const material = new THREE.MeshPhongMaterial({ color: 0x00ff00 });
            const cube = new THREE.Mesh(geometry, material);
            cube.position.set(0, 0, -0.5);
            return cube;
        }

        async function checkDeviceCapabilities() {
            if (!navigator.xr) {
                throw new Error('متصفحك لا يدعم WebXR. يرجى استخدام Chrome أو Safari.');
            }

            const isARSupported = await navigator.xr.isSessionSupported('immersive-ar');
            if (!isARSupported) {
                throw new Error('جهازك لا يدعم الواقع المعزز.');
            }

            if (window.location.protocol !== 'https:' && window.location.hostname !== 'localhost') {
                throw new Error('يجب تشغيل الموقع عبر HTTPS.');
            }
        }

        async function initAR() {
            try {
                await checkDeviceCapabilities();
                showStatus('جهازك يدعم الواقع المعزز.');
                startButton.style.display = 'block';

                startButton.addEventListener('click', startAR);
            } catch (error) {
                showStatus(error.message, true);
            }
        }

        async function startAR() {
            try {
                showStatus('جاري بدء تجربة الواقع المعزز...');

                const session = await navigator.xr.requestSession('immersive-ar', {
                    requiredFeatures: ['local'],
                    optionalFeatures: ['dom-overlay'],
                    domOverlay: { root: document.body }
                });

                const canvas = document.createElement('canvas');
                const gl = canvas.getContext('webgl', { xrCompatible: true });
                const renderer = new THREE.WebGLRenderer({ canvas, context: gl, alpha: true });
                renderer.setPixelRatio(window.devicePixelRatio);

                document.body.appendChild(renderer.domElement);

                const scene = createScene();
                const cube = createCube();
                scene.add(cube);

                const referenceSpace = await session.requestReferenceSpace('local');

                function onXRFrame(time, frame) {
                    session.requestAnimationFrame(onXRFrame);

                    const pose = frame.getViewerPose(referenceSpace);
                    if (pose) {
                        const view = pose.views[0];
                        const viewport = session.renderState.baseLayer.getViewport(view);
                        renderer.setSize(viewport.width, viewport.height);

                        const camera = new THREE.PerspectiveCamera();
                        camera.matrix.fromArray(view.transform.matrix);
                        camera.projectionMatrix.fromArray(view.projectionMatrix);
                        cube.rotation.x += 0.01;
                        cube.rotation.y += 0.01;

                        renderer.render(scene, camera);
                    }
                }

                session.requestAnimationFrame(onXRFrame);

                currentSession = session;
                startButton.style.display = 'none';
                showStatus('تم بدء تجربة الواقع المعزز بنجاح.');

                session.addEventListener('end', () => {
                    currentSession = null;
                    startButton.style.display = 'block';
                    showStatus('تم إنهاء التجربة.');
                });

            } catch (error) {
                showStatus(`حدث خطأ: ${error.message}`, true);
            }
        }

        window.addEventListener('load', initAR);
    </script>
</body>
</html>