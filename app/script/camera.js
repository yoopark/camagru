'use strict';

const video = document.querySelector('video');
const canvas = document.querySelector('canvas');
const takePhotoBtn = document.querySelector('#take-photo-btn');

const ctx = canvas.getContext('2d');

function getVideo() {
  navigator.mediaDevices
    .getUserMedia({ video: true, audio: false })
    .then((localMediaStream) => {
      video.srcObject = localMediaStream;
      video.play();
    })
    .catch((err) => {
      console.error(err);
    });
}

function paintToCanvas() {
  const width = video.videoWidth;
  const height = video.videoHeight;
  canvas.width = width;
  canvas.height = height;

  return setInterval(() => {
    ctx.drawImage(video, 0, 0, width, height);
    let pixels = ctx.getImageData(0, 0, width, height);
    ctx.putImageData(pixels, 0, 0);
  }, 16);
}

function takePhoto() {
  // played the sound
  // snap.currentTime = 0;
  // snap.play();

  // take the data out of the canvas
  const data = canvas.toDataURL('image/jpeg');
  console.log(data);
  // const link = document.createElement('a');
  // link.href = data;
  // link.setAttribute('download', 'handsome');
  // link.innerHTML = `<img src="${data}" alt="Handsome Man" />`;
  // strip.insertBefore(link, strip.firstChild);
}

getVideo();

video.addEventListener('canplay', paintToCanvas);
takePhotoBtn.addEventListener('click', takePhoto);
