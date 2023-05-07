const searchDocMethod = "#searchDocMethod";
const searchBar = "#searchBar";
$(searchDocMethod).change(function () {
  const searchMethod = $(searchDocMethod).val();
  if (searchMethod == 1) {
    $(searchBar).attr("type", "text");
  }
  if (searchMethod == 2) {
    $(searchBar).attr("type", "date");
  }
  if (searchMethod == 3) {
    $(searchBar).attr("type", "number");
  }
});

$("#searchDoc");
