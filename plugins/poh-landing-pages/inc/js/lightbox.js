document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    const lightboxVideo = document.getElementById('lightbox-video');
    const closeBtn = document.getElementById('close-lightbox');
    const videoSources = ["/wp-content/uploads/patient-ruthie.webm", "/wp-content/uploads/patient-dorothy.webm", "/wp-content/uploads/patient-neal.webm", "/wp-content/uploads/patient-kendra.webm"];
    const collectionOfImageTriggers = document.querySelectorAll(".lightbox-trigger");

    if(closeBtn && lightbox && lightboxVideo) {
        closeBtn.addEventListener('click', function() {
            lightbox.style.display = 'none';
            lightboxVideo.pause();
        });
    }

    if(lightbox && lightboxVideo) {
        window.addEventListener('click', function(event) {
            if (event.target == lightbox) {
                lightbox.style.display = 'none';
                lightboxVideo.pause();
            }
        });
    }

    if(collectionOfImageTriggers && lightbox && lightboxVideo) {
        collectionOfImageTriggers.forEach((image, index) => {
            image.addEventListener('click', function() {
                const newVideoSource = document.createElement('source');
                newVideoSource.src = videoSources[index];
                newVideoSource.type = 'video/mp4';
                while(lightboxVideo.firstChild) {
                    lightboxVideo.removeChild(lightboxVideo.firstChild);
                }
                lightboxVideo.appendChild(newVideoSource);
                lightboxVideo.load();
                lightbox.style.display = 'flex';
                lightboxVideo.play();
            });
        });
    }
});
