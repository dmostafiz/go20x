 $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: $(this).attr("data-url"),
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), 
                    id: $(this).attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });