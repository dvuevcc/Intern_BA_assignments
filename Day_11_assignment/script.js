$(document).ready(function() {
    $("#loginForm").on("submit", function(event) {
      event.preventDefault();
  
      // Get the username and password values
      var username = $("#username").val();
      var password = $("#password").val();
  
      // Validate the username and password
      if (username === "" || password === "") {
        alert("Please enter a username and password");
        return;
      }
  
      // Checkif the username and password match
      if (username === "admin" && password === "password") {
        // Redirect to the success page
        window.location.href = "success.html";
      } else {
        // Show an error message
        alert("Invalid username or password");
      }
    });
  });