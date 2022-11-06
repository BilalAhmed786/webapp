
//for image display in form
imgInp.onchange = e => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }


  //for multiimages display in form
  imagesInp.onchange = e => {
    const [file] = imagesInp.files
    if (file) {
        blaa.src = URL.createObjectURL(file)
    }
  }