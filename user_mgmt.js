// Function to display the "Add User" form
function openAddUserForm() {
  const addUserForm = document.getElementById("addUserForm");
  if (addUserForm) {
      addUserForm.style.display = "block";  // Show the form
      addUserForm.style.zIndex = "999";
  }
}

// Function to close the "Add User" form
function closeAddUserForm() {
  const addUserForm = document.getElementById("addUserForm");
  if (addUserForm) {
      addUserForm.style.display = "none";  // Hide the form
  }
}
