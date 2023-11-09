const regions = [
    { name: "North", councils: ["Chitipa District Council", "Karonga District Council", "Likoma District Council", "M'MBELWA District Council", "Mzuzu Municipal Council", "Nkhatabay District Council", "Rumphi District Council" ] },
    { name: "Central", councils: ["Dedza District Council", "Dowa District Council", "Kasungu District Council", "Kasungu Municipal Council", "Lilongwe City Council", "Lilongwe District Council", "Mchinji District Council", "Nkhotakota District Council", "Ntcheu District Council", "Ntchisi District Council", "Salima District Council"] },
    { name: "South", councils: ["Balaka District Council", "Blantyre City Council", "Blantyre District Council", "Chikwawa District Council", "Chiradzulu District Council", "Luchenza District Council", "Machinga District Council", "Mangochi District Council", "Mangochi Municipality", "Mwanza District Council", "Mulanje District Council", "Neno District Council", "Nsanje District Council", "Phalombe District Council", "Thyolo District Council", "Zomba City Council", "Zomba District Council"]}
];

// Function to populate the councils dropdown based on the selected region
function populateCouncilsDropdown(selectedRegion) {
    const councilDropdown = document.getElementById("councilDropdown");
    councilDropdown.innerHTML = ""; // Clear the current options
  
    const selectedRegionData = regions.find(region => region.name === selectedRegion);
  
    if (selectedRegionData) {
      selectedRegionData.councils.forEach(council => {
        const option = document.createElement("option");
        option.value = council;
        option.textContent = council;
        councilDropdown.appendChild(option);
      });
    }
  }
  
  // Function to handle the region selection change
  function onRegionChange() {
    const selectedRegion = document.getElementById("regionDropdown").value;
    populateCouncilsDropdown(selectedRegion);
  }
  
  // Attach the onRegionChange function to the region dropdown's change event
  document.getElementById("regionDropdown").addEventListener("change", onRegionChange);
  
  // Populate the initial list of councils (based on the default region)
  populateCouncilsDropdown("North");