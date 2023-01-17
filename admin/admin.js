//for productimage display
imgInp.onchange = e => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}


//for display multiple images

var images = [];
var image;
function image_select() {
  image = null;
  image = document.getElementById('image').files;
  images = [];
  for (i = 0; i < image.length; i++) {
    images.push({
      "name": image[i].name,
      "url": URL.createObjectURL(image[i]),
      "file": image[i],
    })
  }

  document.getElementById('container').innerHTML = image_show();
  document.getElementById("blahh").src = "";

}




function image_show() {
  var image = "";
  images.forEach((i) => {
    image += `<div class="image_container d-flex justify-content-center position-relative">
 <div class="cross"><span class="position-cross" onclick="delete_image(`+ images.indexOf(i) + `)">&times</span></div>              
    <img class="imagebundle" src="`+ i.url + `" alt="Image"></div>`;
  })

  return image;
}
function delete_image(e) {
  images.splice(e, 1);
  document.getElementById('container').innerHTML = image_show();

  const dt = new DataTransfer()
  const input = document.getElementById('image')
  const { files } = input

  for (let i = 0; i < files.length; i++) {
    const file = files[i]
    if (e !== i)
      dt.items.add(file);
  }

  input.files = dt.files;

}





