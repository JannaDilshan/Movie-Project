$(document).ready(function () {
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 2500,
    infinite: true,
    speed: 1000,
  });
});

function toggleDesktopMenu() {
  const desktopMenu = document.getElementById("desktopToggleMenu");
  desktopMenu.style.display =
    desktopMenu.style.display === "block" ? "none" : "block";
}

function toggleMobileMenu() {
  const mobileMenu = document.getElementById("mobileMenu");
  mobileMenu.style.display =
    mobileMenu.style.display === "flex" ? "none" : "flex";
}

function fetchAllShows(query) {
  const url = `https://api.tvmaze.com/search/shows?q=${encodeURIComponent(
    query
  )}`;

  fetch(url)
    .then((response) => response.json())
    .then((shows) => {
      if (shows.length > 0) {
        displayShowDetails(shows);
      } else {
        console.log("No shows found");
      }
    })
    .catch((error) => console.error("Error fetching shows:", error));
}

function displayShowDetails(shows) {
  const favoriteItems = getRandomFavorites(shows, 3);

  const favoriteItemsHTML = favoriteItems
    .map(
      (item) => `
        <div class="favorite-item" data-id="${item.show.id}">
            <img src="${
              item.show.image
                ? item.show.image.original
                : "https://via.placeholder.com/150"
            }" alt="${item.show.name}" />
            <div class="favorite-content">
                <h3 style="text-align: left;">${item.show.name}</h3>
               <p>${
                 item.show.summary
                   ? item.show.summary.substring(0, 200) + "..."
                   : "No description available"
               }</p>
            </div>
            <button class="remove-favorite" onclick="removeFavorite(${
              item.show.id
            })">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
    `
    )
    .join("");

  console.log(favoriteItemsHTML);

  const showDetailsContainer = document.getElementById("show-details");
  showDetailsContainer.innerHTML = `
        <div class="favorites-grid" style="display: flex; flex-wrap: wrap; gap: 40px;">
            ${favoriteItemsHTML}
        </div>
    `;
}

function getRandomFavorites(shows, count) {
  const randomFavorites = [];
  const shuffledShows = [...shows];
  while (randomFavorites.length < count && shuffledShows.length > 0) {
    const randomIndex = Math.floor(Math.random() * shuffledShows.length);
    randomFavorites.push(shuffledShows.splice(randomIndex, 1)[0]);
  }
  return randomFavorites;
}

function removeFavorite(showId) {
  const showContainer = document.getElementById("show-details");
  const favoriteItem = showContainer.querySelector(
    `.favorite-item[data-id="${showId}"]`
  );
  if (favoriteItem) {
    favoriteItem.remove();
    fetchAllShows("comedy");
  }
}

function handleSearch() {
  const query = document.getElementById("search-input").value;
  if (query) {
    fetchAllShows(query);
  }
}

fetchAllShows("comedy");
