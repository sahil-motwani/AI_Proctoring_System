$(document).ready(function() {
    Webcam.set({
        width: 220,
        height: 190,
        image_format: 'jpg',
        jpeg_quality: 100
    });
    Webcam.attach('#camera');

});

var noOfTabSwitches = 0, mobilePhone = 0, multipleFaces = 0, noFaces = 0, notLookingAtTheScreen = 0, tabSwitches = 0;
takeSnapShot = function () {
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('results').innerHTML =
            '<img src="'+data_uri+'"/>';
        console.log("Hello");
        // downloadImage('user_photo', data_uri);
        verifyImage(data_uri);
    } );
}

snapshotInterval = function () {
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('results').innerHTML =
            '<img src="'+data_uri+'"/>';
        console.log("Hello");
        hello(data_uri);
    } );
}

// DOWNLOAD THE IMAGE.
downloadImage = function (name, datauri) {
    var a = document.createElement('a');
    a.setAttribute('download', name + '.png');
    a.setAttribute('href', datauri);
    console.log(datauri);
}

function clearImage(){
    document.getElementById('results').innerHTML = "";
}

function verifyImage(datauri){
    console.log("Sending request");
    $.ajax({
        url: 'http://1615477ba773.ngrok.io/verify',
        type: "POST",
        data: {
            image: getProperImageURI(datauri),
            Sid: "1"},
        success: function( data ) {
            console.log(data);
            if(true){
                //SHOW POPUP OF IMAGE IS VERIFIED
            }
        }
    });
}

function hello(datauri){
    console.log("Sending");
    $.ajax({
        url: 'http://2e8006f138c0.ngrok.io/verify',
        type: "POST",
        data: {
            image: getProperImageURI(datauri),
            Sid: 1
        },
        success: function (data) {
            // alert(data);
            if(data == 12 || data == 13 || data == -11 || data == -8){
                alert(data);
                appendFileAndSubmit(datauri, data);
            }
        },
    });
    console.log("Done");
}

function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    var blob = new Blob(byteArrays, {type: contentType});
    return blob;
}


function appendFileAndSubmit(datauri, data){
    // Get the form
    var form = document.getElementById("myAwesomeForm");

    var ImageURL = datauri;
    console.log(getProperImageURI(datauri));
    // Split the base64 string in data and contentType
    var block = ImageURL.split(";");
    // Get the content type
    var contentType = "image/jpg";// In this case "image/gif"
    // get the real base64 content of the file
    var realData = block[1].split(",")[1];// In this case "iVBORw0KGg...."

    // Convert to blob
    var blob = b64toBlob(getProperImageURI(datauri), contentType);

    // Create a FormData and append the file
    var fd = new FormData(form);
    fd.append("image", blob);


    if (data == 12) {
        fd.append("img_cat", 1)//mobile phone
        alert("MOBILE");
        mobilePhone++;
    }
    else if (data == 13) {
        fd.append("img_cat", 2)// multiple faces
        multipleFaces++;
    }
    else if(data == -11) {
        fd.append("img_cat", 4)// not looking at the screen
        alert("NO");
        notLookingAtTheScreen++;
    }
    else if(data == -8) {
        fd.append("img_cat", 4)// no faces
        alert("FACES");
        noFaces++;
    }
    fd.append('student_id', document.getElementById('student_id').value);
    fd.append('quiz_id', document.getElementById('quiz_id').value);
    document.getElementById('mobile_phone').value = mobilePhone;
    document.getElementById('no_faces').value = noFaces;
    document.getElementById('multiple_faces').value = multipleFaces;
    document.getElementById('not_looking_at_screen').value = notLookingAtTheScreen;

    // Submit Form and upload file
    $.ajax({
        url:"http://127.0.0.1:8000/student/quiz/photo/store",
        data: fd,// the formData function is available in almost all new browsers.
        type:"POST",
        contentType:false,
        processData:false,
        cache:false,
        // dataType:"json", // Change this according to your response from the server.
        // error:function(err){
        //     console.error(err);
        // },
        // success:function(data){
        //     console.log(data);
        // },
        // complete:function(){
        //     console.log("Request finished.");
        // }
    });
}


function detectMalpractice(datauri) {
    // alert("Check");
    $.ajax({
        url: 'http://b445a5305e51.ngrok.io/verify',
        type: "POST",
        data: { image: getProperImageURI(datauri), Sid: "1"},
        success: function( data ) {
            alert( data );
            if(data == 1 || data == 2 || data == 3){
               appendFileAndSubmit(datauri, 1);
            }
        }
    })
}

function handleVisibilityChange() {
    // if (document.hidden) {
    //     noOfTabSwitches++;
    //document.getElementById('tab_switches').value = noOfTabSwitches;
    //     alert("You are not allowed to switch tabs or else test would be automatically ended")
    //     if(noOfTabSwitches >= 2){
    //         // document.getElementById('quiz_form').submit();
    //     }
    // } else  {
    //     console.log("Visible");
    // }
}

function enableTabLogging(){
    document.addEventListener("visibilitychange", handleVisibilityChange, false);
}

function getProperImageURI(datauri){
    var a = datauri.split(",");
    console.log(datauri);
    return a[1];
}



function base64ToBlob(base64, mime)
{
    mime = mime || '';
    var sliceSize = 1024;
    var byteChars = window.atob(base64);
    var byteArrays = [];

    for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    return new Blob(byteArrays, {type: mime});
}

function reverseTimer(inputDTID, quizPendingElementID, quizButtonID, quizEndDTID){

    var dt = document.getElementById(inputDTID).value.split(" ");
    var startDateTime = dt.join('T');
    var countDownDate = new Date(startDateTime).getTime();

    var endDTElement =  document.getElementById(quizEndDTID).value.split(" ");
    var endDateTime = new Date(endDTElement.join('T')).getTime();
    var endDT = new Date(endDateTime).getTime();

    var currentTime = new Date().getTime();

    console.log(currentTime + " " + countDownDate + " " + endDT);
    if(currentTime >= countDownDate && currentTime <= endDT){
        alert(quizButtonID);
        document.getElementById(quizButtonID).disabled = false;
        console.log(document.getElementById(quizButtonID));
    }

    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById(quizPendingElementID).innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            if(currentTime >= endDT){
                document.getElementById(quizPendingElementID).innerHTML = "Quiz Has Ended";
            }
            if(currentTime <= endDT){
                document.getElementById(quizPendingElementID).innerHTML = "Quiz Has Started";
            }
            console.log(endDT);
            console.log(countDownDate);
            console.log(new Date().getTime() );

        }
    }, 1000);



}


