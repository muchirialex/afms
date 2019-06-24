<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" type="image/png" href="/images/icon.png">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ config('app.name', 'PhotoChamp') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="body">
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark" style="padding:17px 0 17px 16px;">
            <a class="nav-brand" href="/dashboard">PhotoChamp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>	
    </div>
    
    <div class="main">
        @yield('content')
    </div>

  <!-- //JavaScript -->

  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        $('input.target').focus();
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return true;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
        // ... the form gets submitted:
            var batch = []; 
            var csrf = $("#workspace input[name=_token]").val();
            
            $("#workspace input.target").each(function(){ 
                var work_id = $(this).data("work_id"); 
                var bib = $(this).val();
                var entry = {"work_id":work_id, "bib":bib};
                
                batch.push(entry); 
            });
            
            $.ajax({ 
                method:"POST", 
                url:"/work",
                data:{"_token":csrf, "batch":batch}, 
                success:function(res){ 
                    console.log(res);
                    location.reload(true); 
                }, 
                error:function (e, x, r) { 
                    console.log(e.responseText); 
                } 
            }) 
        return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

    //Focus Egonomics
    $('.bib-wrapper').click(function() {
            $('.target').focus();
    });

    //Draggable Image
    $( function() {
        $( ".draggable" ).draggable();
    } );

    $(".target").keyup(function(event) {
        if (event.keyCode == 13) {
            $("#nextBtn").click();
        }
    });

    document.getElementById('timer').innerHTML =
        10 + ":" + 00;
    startTimer();

    function startTimer() {
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(s==59){m="0"+(m-1)}
        if(m < "0" + 0) {
            alert('You could not submit the task on time.');
            window.location.reload();
        }
        
        document.getElementById('timer').innerHTML =
        m + ":" + s;
        setTimeout(startTimer, 1000);
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    };

    /*  $(window).scroll(function() {
            $(".bib-wrapper").css({
            "top": ($(window).scrollTop()) + "px"
            });
        }); 
    */
   	
    /*function zoomin(){
        var imageCount;
        for (imageCount = 0; imageCount < 10; imageCount++) {
            var myImg = document.getElementsByClassName("img-zoom")[imageCount];
            var currWidth = myImg.clientWidth;
            if(currWidth == 500) {
                alert("Maximum zoom-in level reached.");
            } else{
                myImg.style.width = (currWidth + 50) + "px";
            } 
        } 
    } */
    function zoomout(){
        var imageCount;
        for (imageCount = 0; imageCount < 10; imageCount++) {
            var myImg = document.getElementsByClassName("img-zoom")[imageCount];
            var currWidth = myImg.clientWidth;
            if(currWidth == 50) {
                alert("Maximum zoom-out level reached.");
            } else{
                myImg.style.width = (currWidth - 50) + "px";
            }
        }
    }
  </script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>