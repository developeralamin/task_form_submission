$(document).ready(function () {
    $("#add-item").click(function () {
      $("#items-container").append(`
              <div class="input-group mb-2 item-row">
                  <input type="text" name="items[]" class="form-control" placeholder="Enter item name">
                  <button type="button" class="btn btn-danger remove-item">X</button>
              </div>
          `);
    });
  
    // Remove an item row
    $(document).on("click", ".remove-item", function () {
      $(this).closest(".item-row").remove();
    });
  
    //subit form
    $("#ajax-form").on("submit", function (e) {
      e.preventDefault();
      $.ajax({
        url: "../app/controllers/FormController.php",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            $(".error-message").html("");
            $("#response").html(
              '<div class="alert alert-success">' + response.message + "</div>"
            );
            $("#ajax-form")[0].reset();
            $("#items-container .item-row").remove();
            $("#items-container").append(`
              <div class="input-group mb-2 item-row">
                  <input type="text" name="items[]" class="form-control items" placeholder="Enter item ">
                  <button type="button" class="btn btn-danger remove-item">X</button>
              </div>
          `);
          } else if (response.status === "error") {
            $(".error-message").html("");
            if (typeof response.errors === "object") {
              $.each(response.errors, function (field, message) {
                console.log(field);
                if (field != "phone") {
                  let inputField = $("[name='" + field + "']");
                  inputField.after(
                    '<div class="error-message text-danger small">' +
                      message +
                      "</div>"
                  );
                }
                if (field == "phone") {
                  let inputField = $("[name='" + field + "']");
                  inputField.after(
                    '<div class="error-message text-danger small col-md-12 pl-0">' +
                      message +
                      "</div>"
                  );
                }
              });
            } else {
              $("#response").html(
                '<div class="alert alert-danger">' + response.message + "</div>"
              );
            }
          }
        },
        error: function () {
          $("#response").html(
            '<div class="alert alert-danger">An error occurred. Please try again.</div>'
          );
        },
      });
    });
  });
  