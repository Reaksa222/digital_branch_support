function validateForm() {
    var searchTerm = document.getElementById("searchTerm").value;
    var errorMessage = document.getElementById("error-message");

    if (searchTerm.trim() === "") {
        errorMessage.style.display = "block";
        return false; // Prevent form submission
    } else {
        errorMessage.style.display = "none";
    }
}
