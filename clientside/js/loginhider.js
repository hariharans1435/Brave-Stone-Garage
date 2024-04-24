document.addEventListener("DOMContentLoaded", function() {
    // Get the submit button
    var submitButton = document.getElementById("submitButton");
  
    if (submitButton) {
      // Add click event listener to the submit button
      submitButton.addEventListener("click", function() {
        // Redirect to index.html
        window.location.href = "index.html";
      });
    }
  });
  