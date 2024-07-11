//Programmed by Chris Barber June 6 2024
const MAX_NUMBER_OF_FILES = 5;
const checkIfNextEmpty = function(id, threadFileIndex) {
  //index +1 to see the next one, mod MAX_NUMBER_OF_FileS to wrap, + 1 to get -File 
  threadFileIndex = ((threadFileIndex + 1) % MAX_NUMBER_OF_FILES) + 1;
  const threadFile = document.querySelector(".thread" + id + "-file" + threadFileIndex);
  if(threadFile == null) {
    return true;
  }
  else {
    return false;
  }
}

const checkIfPrevEmpty = function(id, threadFileIndex) {
  // index +MAX_NUMBER_OF_IMAGES because js doesn't like mod negative, index -1 to see the previous one, mod MAX_NUMBER_OF_IMAGES to wrap, + 1 to get -image 
  threadFileIndex = ((threadFileIndex + MAX_NUMBER_OF_FILES - 1) % MAX_NUMBER_OF_FILES) + 1;
  const threadFile = document.querySelector(".thread" + id + "-file" + threadFileIndex);
  if(threadFile == null) {
    return true;
  }
  else {
    return false;
  }
}
const nextIndexTester = function(id, threadFileIndex) {
  if(threadFileIndex === 0) {
    const threadFile1 = document.querySelector(".thread" + id + "-file1");
    if(threadFile1 != null) {
      threadFile1.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadFileIndex)){
      //if the next one is empty just increment to the next one
      threadFileIndex = threadFileIndex +1;
    }else {
      const threadFile2 = document.querySelector(".thread" + id + "-file2");
      threadFile2.style.display = "block";
    }
  }
  if(threadFileIndex === 1){
    const threadFile2 = document.querySelector(".thread" + id + "-file2");
    if(threadFile2 != null) {
      threadFile2.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadFileIndex)){
      //if the next one is empty just increment to the next one
      threadFileIndex = threadFileIndex +1;
    }else {
      const threadFile3 = document.querySelector(".thread" + id + "-file3");
      threadFile3.style.display = "block";
    }
  }
  if(threadFileIndex === 2){
    const threadFile3 = document.querySelector(".thread" + id + "-file3");
    if(threadFile3 != null) {
      threadFile3.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadFileIndex)){
      //if the next one is empty just increment to the next one
      threadFileIndex = threadFileIndex +1;
    }else {
      const threadFile4 = document.querySelector(".thread" + id + "-file4");
      threadFile4.style.display = "block";
    }
  }
  if(threadFileIndex === 3){
    const threadFile4 = document.querySelector(".thread" + id + "-file4");
    if(threadFile4 != null) {
      threadFile4.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadFileIndex)){
      //if the next one is empty just increment to the next one
      threadFileIndex = threadFileIndex +1;
    }else {
      const threadFile5 = document.querySelector(".thread" + id + "-file5");
      threadFile5.style.display = "block";
    }
  }
  if(threadFileIndex === 4){
    const threadFile5 = document.querySelector(".thread" + id + "-file5");
    if(threadFile5 != null) {
      threadFile5.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadFileIndex)){
      //if the next one is empty just increment to the next one
      threadFileIndex = threadFileIndex +1;
      threadFileIndex = threadFileIndex % MAX_NUMBER_OF_FILES;
      threadFileIndex = nextIndexTester(id, threadFileIndex);
    }else {
      const threadFile1 = document.querySelector(".thread" + id + "-file1");
      threadFile1.style.display = "block";
    }
  }
  return threadFileIndex
}

const nextSlide = function(id) {
  const thisThreadFiles = document.querySelector(".thread" + id + "-files");
  //There is an alt variable that contains the picture index attached to thread$id-images
  let threadFileIndex = thisThreadFiles.getAttribute("alt");
  threadFileIndex = parseInt(threadFileIndex);
  threadFileIndex = nextIndexTester(id, threadFileIndex);
  threadFileIndex = threadFileIndex + 1;
  // modulus 4 to keep it from going over
  threadFileIndex = threadFileIndex % MAX_NUMBER_OF_FILES;
  thisThreadFiles.setAttribute("alt", threadFileIndex);
}

const prevIndexTester = function(id, threadFileIndex) {
    if(threadFileIndex === 4){
        const threadFile5 = document.querySelector(".thread" + id + "-file5");
        if(threadFile5 != null) {
          threadFile5.style.display = "none";
        }
        if(checkIfPrevEmpty(id, threadFileIndex)) {
          threadFileIndex = threadFileIndex - 1;
        }else {
          const threadFile4 = document.querySelector(".thread" + id + "-file4");
          threadFile4.style.display = "block";
        }
      }
      if(threadFileIndex === 3){
        const threadFile4 = document.querySelector(".thread" + id + "-file4");
        if(threadFile4 != null) {
          threadFile4.style.display = "none";
        }
        if(checkIfPrevEmpty(id, threadFileIndex)) {
          threadFileIndex = threadFileIndex - 1;
        }else {
          const threadFile3 = document.querySelector(".thread" + id + "-file3");
          threadFile3.style.display = "block";
        }
      }
      if(threadFileIndex === 2){
        const threadFile3 = document.querySelector(".thread" + id + "-file3");
        if(threadFile3 != null) {
          threadFile3.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadFileIndex)) {
          threadFileIndex = threadFileIndex - 1;
        }else {
          const threadFile2 = document.querySelector(".thread" + id + "-file2");
          threadFile2.style.display = "block";
        }
      }
      if(threadFileIndex === 1){
        const threadFile2 = document.querySelector(".thread" + id + "-file2");
        if(threadFile2 != null) {
          threadFile2.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadFileIndex)) {
          threadFileIndex = threadFileIndex - 1;
        }else {
          const threadFile1 = document.querySelector(".thread" + id + "-file1");
          threadFile1.style.display = "block";
        }
      }
      if(threadFileIndex === 0) {
        const threadFile1 = document.querySelector(".thread" + id + "-file1");
        if(threadFile1 != null) {
          threadFile1.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadFileIndex)) {
            threadFileIndex = threadFileIndex - 1;            
            threadFileIndex = (threadFileIndex + MAX_NUMBER_OF_FILES) % MAX_NUMBER_OF_FILES;
            threadFileIndex = prevIndexTester(id, threadFileIndex);
        }else {
          const threadFile5 = document.querySelector(".thread" + id + "-file5");
          threadFile5.style.display = "block";
        }    
      }
    return threadFileIndex
}

const prevSlide = function(id) {
  const thisThreadFiles = document.querySelector(".thread" + id + "-files");
  //There is an alt variable that contains the picture index attached to thread$id-images
  let threadFileIndex = thisThreadFiles.getAttribute("alt");
  threadFileIndex = parseInt(threadFileIndex);     
  threadFileIndex = prevIndexTester(id, threadFileIndex);
  threadFileIndex = threadFileIndex + MAX_NUMBER_OF_FILES - 1;
  // modulus 4 to keep it from going over
  threadFileIndex = threadFileIndex % MAX_NUMBER_OF_FILES;
  thisThreadFiles.setAttribute("alt", threadFileIndex);
}

const getIdAndFileNumber = function(classString) {
    const numbers = classString.match(/\d+/g);       
    return numbers;
}
const displayFirstFile = function(id, fileNumber) {
    const firstFile = document.querySelector(".thread" + id + "-file" + fileNumber);
    firstFile.style.display = "block";
}
const setFileIndex = function(id, fileNumber) {
    const threadFiles = document.querySelector('.thread' + id + '-files');
    console.log(threadFiles);
    threadFiles.setAttribute('alt', fileNumber-1);
}
//on initial load of website displays first image in each thread
window.onload = function() {
    const allThreads = document.querySelectorAll(".thread");    
    for(let i = 0; i < allThreads.length; i++) {      
      const threadFilesDiv = allThreads[i].querySelector('div');      
      const nestedImgFirst =  threadFilesDiv.querySelector('img');
      if(nestedImgFirst != null) {        
        const classString = nestedImgFirst.getAttribute('class');
        const idAndFileNumber = getIdAndFileNumber(classString); 
        const id = idAndFileNumber[0];
        const fileNumber = idAndFileNumber[1];        
        displayFirstFile(id, fileNumber);
        setFileIndex(id, fileNumber);
      }
    }
};