document.addEventListener("DOMContentLoaded", function () {
    // Find the + btn using its id
    const addFeatureBtn = document.getElementById("add-feature-btn");
    // Find the container where new inputs field get added
    const featuresContainer = document.getElementById("features-container");
    // Only run if the addFeatureBtn && featuresContainer is present
    // this script will only run on pages that contains this ids addFeatureBtn && featuresContainer
    if (addFeatureBtn && featuresContainer) {
        // When the btn is clicked
        addFeatureBtn.addEventListener("click", function () {
            // create a new div wrapper
            const newRow = document.createElement("div");
            // Add class to the div and some styling
            newRow.className = "flex gap-2 mt-3";

            // Create new input
            const newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "features[]";
            newInput.placeholder = "e.g. Private parking";
            newInput.className =
                "flex-1 px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light focus:ring-2 focus:ring-alderton-gold outline-none";

            // Create remove btn
            const removeBtn = document.createElement("button");
            removeBtn.type = "button";
            removeBtn.className =
                "px-4 py-3 rounded-xl bg-red-500 text-white hover:bg-red-700 transition-colors";
            removeBtn.innerHTML =
                '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>';

            // Remove this row when minus is clicked
            removeBtn.addEventListener("click", function () {
                featuresContainer.removeChild(newRow);
            });

            // Assemble and append
            newRow.appendChild(newInput);
            newRow.appendChild(removeBtn);
            featuresContainer.appendChild(newRow);
        });
    }
});
