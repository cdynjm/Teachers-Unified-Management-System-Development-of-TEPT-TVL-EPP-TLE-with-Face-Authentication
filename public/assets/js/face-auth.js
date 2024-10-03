$(document).on('click', '#face-auth', function () {
    $('#face-auth-modal').modal('show');

    const video = document.getElementById('video');
    const canvas = document.getElementById('overlay');
    const loadingNotice = document.getElementById('loading-notice');
    let stream = null;

    loadingNotice.style.display = 'block';

    Promise.all([
        faceapi.nets.ssdMobilenetv1.loadFromUri('/assets/js/models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('/assets/js/models'),
        faceapi.nets.faceRecognitionNet.loadFromUri('/assets/js/models'),
        faceapi.nets.ageGenderNet.loadFromUri('/assets/js/models'),
        faceapi.nets.faceExpressionNet.loadFromUri('/assets/js/models')
    ])
    .then(() => {
        loadingNotice.style.display = 'none';
        startVideo();
    })
    .catch(err => console.error('Error loading models:', err));

    async function startVideo() {
        let scanning = true;
        let videoConstraints = { video: {} };

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            videoConstraints.video.facingMode = 'user'; // Front camera
        }

        navigator.mediaDevices.getUserMedia(videoConstraints)
        .then(_stream => {
            video.srcObject = _stream;
            video.play();
            stream = _stream;
        })
        .catch(err => console.error('Error accessing webcam:', err));

        video.addEventListener('loadedmetadata', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
        });

        video.addEventListener('play', async () => {
            const imageData = document.querySelector('meta[name="auth-data"]').getAttribute('content');

            function base64ToBlob(base64, contentType) {
                const byteCharacters = atob(base64);
                const byteArrays = [];

                for (let offset = 0; offset < byteCharacters.length; offset += 512) {
                    const slice = byteCharacters.slice(offset, offset + 512);
                    const byteNumbers = new Array(slice.length);
                    for (let i = 0; i < slice.length; i++) {
                        byteNumbers[i] = slice.charCodeAt(i);
                    }
                    const byteArray = new Uint8Array(byteNumbers);
                    byteArrays.push(byteArray);
                }

                return new Blob(byteArrays, { type: contentType });
            }

            const refFaceBlob = base64ToBlob(imageData, 'image/jpeg');
            const refFace = await faceapi.bufferToImage(refFaceBlob);

            let refFaceAiData = await faceapi.detectAllFaces(refFace).withFaceLandmarks().withFaceDescriptors();
            let faceMatcher = new faceapi.FaceMatcher(refFaceAiData);

            const displaySize = { width: video.width, height: video.height };
            faceapi.matchDimensions(canvas, displaySize);

            loadingNotice.style.display = 'none';

            const intervalId = setInterval(async () => {
                if (!video.paused && !video.ended && scanning) {
                    let faceAIData = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors().withAgeAndGender().withFaceExpressions();

                    const resizedDetections = faceapi.resizeResults(faceAIData, displaySize);

                    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
                    faceapi.draw.drawDetections(canvas, resizedDetections);
                    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
                    faceapi.draw.drawFaceExpressions(canvas, resizedDetections);

                    resizedDetections.forEach(async face => {
                        const { age, gender, genderProbability, detection, descriptor } = face;
                        const genderText = `${gender} - ${Math.round(genderProbability * 100)}%`;
                        const ageText = `${Math.round(age)} years`;
                        const textField = new faceapi.draw.DrawTextField([genderText, ageText], face.detection.box.topRight);
                        textField.draw(canvas);

                        const match = faceMatcher.findBestMatch(descriptor);

                        let options = { label: "Administrator (Authenticating...)" };
                        if (match.label === "unknown" || match.distance >= 0.35) {
                            options = { label: "Recognizing Face..." };
                        } else {
                            setTimeout(() => {
                                const formData = new FormData();
                                formData.append('status', 1);
                                async function APIrequest() {
                                    return await axios.post('/face-login', formData, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data',
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        }
                                    });
                                }

                                APIrequest().then(response => {
                                    SweetAlert.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Authenticated!',
                                        html: response.data.Message,
                                        allowOutsideClick: false,
                                        showConfirmButton: false
                                    });

                                    location.reload();
                                });

                                scanning = false;
                                clearInterval(intervalId);
                            }, 1000);
                        }

                        const drawBox = new faceapi.draw.DrawBox(detection.box, options);
                        drawBox.draw(canvas);
                    });
                }
            }, 100);

            setTimeout(() => {
                if (scanning) {
                    SweetAlert.fire({
                        icon: 'error',
                        title: 'Face Not Recognized',
                        text: 'Please try again.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                    scanning = false;
                    clearInterval(intervalId);
                }
            }, 10000);

        });
    }
});
