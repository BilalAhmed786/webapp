
//for image display in form
imgInp.onchange = e => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }


//for display multiple images
  
const preview = (file) => {
    const img = document.createElement("img");
    img.src = URL.createObjectURL(file);  // Object Blob
    img.alt = file.name;
    document.querySelector('#preview').append(img);
  };
  
  document.querySelector("#files").addEventListener("change", (e) => {
    if (!e.target.files) return; // Do nothing.
    [...e.target.files].forEach(preview);
    $blahhhide=document.getElementById("blahh")
    $blahhhide.style.display="none";
  });


