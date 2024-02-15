const dropAreas = document.querySelectorAll(".drop-area");
const inputFiles = document.querySelectorAll(".input-file");
const imageViews = document.querySelectorAll(".img-view");

inputFiles.forEach((inputFile, index) => {
    inputFile.addEventListener("change", () => uploadImage(index));
});

function uploadImage(index) {
    let imgLink = URL.createObjectURL(inputFiles[index].files[0]);
    
    imageViews[index].style.backgroundImage = `url(${imgLink})`;
    imageViews[index].textContent = "";
    imageViews[index].style.border = 0;
}

dropAreas.forEach((dropArea) => {
    dropArea.addEventListener("dragover", function (e) {
        e.preventDefault();
    });

    dropArea.addEventListener("drop", function (e) {
        e.preventDefault();
        inputFiles[dropAreas.indexOf(dropArea)].files = e.dataTransfer.files;
        uploadImage(dropAreas.indexOf(dropArea));
    });
});
