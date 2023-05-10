const searchDocMethod = "#searchDocMethod";
const searchBar = "#searchBar";
const submmitSearch = "#submmitSearch";
$(searchDocMethod).change(function () {
  const searchMethod = $(searchDocMethod).val();
  if (searchMethod == 1) {
    $(searchBar).prop("disabled", false);
    $(submmitSearch).prop("disabled", false);

    $(searchBar).attr("type", "text");
  }
  if (searchMethod == 2) {
    $(searchBar).prop("disabled", false);
    $(submmitSearch).prop("disabled", false);

    $(searchBar).attr("type", "date");
  }
  if (searchMethod == 3) {
    $(searchBar).prop("disabled", false);
    $(submmitSearch).prop("disabled", false);

    $(searchBar).attr("type", "number");
  }
});

$("#searchDoc");
