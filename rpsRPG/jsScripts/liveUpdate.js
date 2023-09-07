// $(
//     setInterval(function () {
//       $.ajax({
//         type: "GET",
//         url: "https://swrath.unbound.top/experiment/rpsRPG/live.php",
//         success: function (data) {
//           $("#live").html(data);
//         },
//         error: function (request, error) {
//           console.log("Request object:", JSON.stringify(request));
//           console.log("Error:", error);
//         },
//       });
//     }),
//     1000
//   );

// Store the original contents of the #choices div
let originalContents = $("#choices").html();

$(document).ready(function () {
    // Function to update the letiables
    function updateletiables() {
        $.ajax({
            type: "GET",
            url: "../phpScripts/live.php",
            dataType: "json", // Specify the expected data type
            success: function (data) {
                // You can directly access the JSON properties
                let defDone = parseInt(data.defDone);
                let atDone = parseInt(data.atDone);

                // Update the letiables on the page
                updateletiableDisplay("#defDone", defDone);
                updateletiableDisplay("#atDone", atDone);
                
            // Check if both defDone and atDone equal 1
            if (defDone === 1 && atDone === 1) {
                // Empty the choices div
                $("#choices").empty();
                if (defDone === 1 && atDone === 1) {
                // Add a "Continue" button
                let continueButton = $("<button>").text("Continue").addClass("rpsButtons");
                $("#choices").append(continueButton);

                // Attach a click event handler to the "Continue" button
                continueButton.on("click", function() {
                    // Handle the click event, e.g., redirect to another page
                    window.location.href = "sesh.php?continue=refresh"; 
                });}
            } else if (defDone === 2 && atDone === 2) {
                // Empty the choices div
                $("#choices").empty();
                if (defDone === 2 && atDone === 2) {
                // Add a "Continue" button
                let continueButton = $("<button>").text("Continue").addClass("rpsButtons");
                $("#choices").append(continueButton);

                // Attach a click event handler to the "Continue" button
                continueButton.on("click", function() {
                    // Handle the click event, e.g., redirect to another page
                    if(0==0){
                        window.location.href = "https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?data=winner"; } else{
                          window.location.href = "https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?data=loser";
                        }
                });}
            } else {
                // Restore the original contents of the #choices div
                $("#choices").html(originalContents);
               
               
            }
        },
            error: function () {
                // Handle errors, e.g., display an error message
                updateletiableDisplay("#defDone", "Error fetching defDone");
                updateletiableDisplay("#atDone", "Error fetching atDone");
            }
        });
    }

    // Function to update the letiable display
    function updateletiableDisplay(elementId, value) {
        let $element = $(elementId);
        if (value === 0) {
            // If the value is 0, set text to "choosing" and style to red
            $element.html("<b style='color:red;'>choosing</b>");
        } else if (value === 1) {
            
            // If the value is 1, set text to "waiting" and style to blue
            $element.html("<b style='color:blue;'>waiting</b>");
        } else if (value === 2) {
            // If the value is 2, set text to "done" and style to green
            $element.html("<b style='color:green;'>done</b>");
             // stop the game
            
             $("#choices").empty();
              // Add a "Continue" button
              let continueButton = $("<button>").text("Continue").addClass("rpsButtons");
              $("#choices").append(continueButton);
 
              // Attach a click event handler to the "Continue" button
              continueButton.on("click", function() {
                  // Handle the click event, e.g., redirect to another page
                  if(0==0){
                  window.location.href = "https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?data=winner"; } else{
                    window.location.href = "https://swrath.unbound.top/experiment/rpsRPG/pages/reward.php?data=loser";
                  }
              })}
        else {
            // stop the game
            $element.html("<b style='color:red;'>GAME IS DONE </b>");
            $("#choices").empty();
             // Add a "Continue" button
             let continueButton = $("<button>").text("Continue").addClass("rpsButtons");
             $("#choices").append(continueButton);

             // Attach a click event handler to the "Continue" button
             continueButton.on("click", function() {
                 // Handle the click event, e.g., redirect to another page
                 window.location.href = "sesh.php"; 
             })
        }
    }

    // Call the function to update the letiables initially
    updateletiables();

    // Set an interval to periodically update the letiables (e.g., every 5 seconds)
    setInterval(updateletiables, 4000); // Adjust the interval as needed
});