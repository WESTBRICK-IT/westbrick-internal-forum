//Programmed by Chris Barber June 6 2024
const garbageBin = document.querySelectorAll(".thread-garbage-button");

const garbageBinClick = function() {
    let userResponse = confirm("Are you sure you want to delete this thread?");
    console.log("garbage button click");
    console.log(this.getAttribute("alt"));
    let garbageCanNumberString = this.getAttribute("alt");
    let garbageCanNumber = garbageCanNumberString.match(/\d+$/);
    console.log(garbageCanNumber);
    if (userResponse) {
        console.log("thread selected for deletion." + "./PHP/delete-thread.php?id=" + garbageCanNumber);
        window.location.href = "./PHP/delete-thread.php?id="+ garbageCanNumber;
        // Add code here to delete the thread from the list or perform any other actions
    } else {
        console.log("Deletion cancelled.");
    }
}
for(i = 0; i < garbageBin.length; i++) {
    garbageBin[i].addEventListener("click", garbageBinClick);
}

