import './bootstrap';
import '../css/app.scss';

const fileUploaders = document.querySelectorAll('.file-uploader');

fileUploaders.forEach(fileUploader => {
    const placeholder = fileUploader.querySelector('.file-uploader__placeholder');

    fileUploader.querySelector('input').addEventListener('change', (event) => {
        const img = document.createElement('img');

        img.src = URL.createObjectURL(event.target.files[0]);
        img.onload = function() {
            URL.revokeObjectURL(img.src)
        }

        placeholder.innerHTML = img.outerHTML;

        fileUploader.classList.add('file-uploader--has-file');
    });

    placeholder.addEventListener('click', () => {
        const img = placeholder.querySelector('img');

        if (img) {
            fileUploader.classList.remove('file-uploader--has-file');
            img.remove();
        }
    });
});