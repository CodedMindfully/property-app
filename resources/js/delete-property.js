window.confirmDelete = function (url) {
    // Set the form action to the correct delete URL
    document.getElementById("deleteForm").action = url;
    // Show the modal
    document.getElementById("deleteModal").classList.remove("hidden");
};

window.closeModal = function () {
    document.getElementById("deleteModal").classList.add("hidden");
};

// Close modal if clicking outside
document.getElementById("deleteModal").addEventListener("click", function (e) {
    if (e.target === this) closeModal();
});
