<div class="country-dropdown">
    <h3>Country</h3>
    <input type="text" id="countrySearch" placeholder="Search countries..." oninput="filterCountries()" class="country-search-box">
    <ul class="dropdown-list" id="countryList">
        <!-- Country list will be populated dynamically -->
    </ul>
</div>

<script>
// Country dropdown filter and select logic
const countries = [
    "Russia", "Saudi Arabia", "Singapore", "South Africa", "South Korea",
    "United States", "Canada", "United Kingdom", "Australia", "Germany",
    "France", "India", "China", "Japan", "Brazil", "Mexico", "Italy"
];

const countrySearch = document.getElementById('countrySearch');
const countryList = document.getElementById('countryList');

// Function to filter countries based on user input
function filterCountries() {
    const searchQuery = countrySearch.value.toLowerCase();
    const filteredCountries = countries.filter(country =>
        country.toLowerCase().includes(searchQuery)
    );

    // Clear previous results
    countryList.innerHTML = '';

    // Show filtered countries
    filteredCountries.forEach(country => {
        const listItem = document.createElement('li');
        listItem.textContent = country;
        listItem.onclick = () => selectCountry(country);
        countryList.appendChild(listItem);
    });

    // Show dropdown if there are results
    countryList.style.display = filteredCountries.length > 0 ? 'block' : 'none';
}

// Function to select a country
function selectCountry(country) {
    countrySearch.value = country;
    countryList.style.display = 'none';
}

// Close dropdown if clicked outside
window.onclick = (event) => {
    if (!event.target.matches('.country-dropdown, .country-dropdown *')) {
        countryList.style.display = 'none';
    }
};
</script>

<style>
/* Styling for the entire page */
body {
    background-color: #002c48; /* Dark blue background for the whole page */
    font-family: Arial, sans-serif; /* General font */
    margin: 0;
    padding: 0;
    color: #f5f5f5; /* Light text color for contrast */
}

/* Styling for the country dropdown */
.country-dropdown {
    position: relative;
    width: 50vw; /* Take half the screen width */
    background-color: white; /* White background for the dropdown */
    border: 1px solid #ddd; /* Light border to match the theme */
    padding: 15px;
    border-radius: 8px;
    margin: 0 auto; /* Center align the dropdown */
    text-align: center; /* Center align the label and the input */
    margin-top: 50px; /* Add space above the dropdown */
}

.country-dropdown h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #002c48; /* Dark blue color for the header */
}

.country-search-box {
    width: 100%;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    background-color: #f9f9f9;
    margin-bottom: 10px;
}

.dropdown-list {
    position: absolute;
    top: 75px; /* Adjusted position to make space for the search box */
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    background-color: white; /* White background for the dropdown list */
    border: 1px solid #ccc;
    border-radius: 8px;
    display: none;
    z-index: 10;
    color: #333; /* Dark text color for dropdown values */
}

.dropdown-list li {
    padding: 10px;
    list-style-type: none;
    cursor: pointer;
}

.dropdown-list li:hover {
    background-color: #f1f1f1; /* Light background on hover */
    color: #002c48; /* Dark blue text on hover */
}

/* Make sure everything is spaced out properly */
.navbar {
    background-color: #002c48; /* Set navbar to dark blue */
    padding: 10px;
    text-align: center;
}

.nav-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.nav-item {
    display: inline-block;
    margin: 0 15px;
}

.nav-item a {
    text-decoration: none;
    color: #f5f5f5; /* Light text color */
    font-size: 18px;
}

.nav-item a:hover {
    color: #007bff; /* Highlight color on hover */
}
</style>
