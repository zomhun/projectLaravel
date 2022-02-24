<!-- Modal -->
<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" id="showquickviewbody">
    </div>
</div>


@section('jsquickview')
<script>
$(document).on('click', '.quickview', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: 'http://localhost:8080/shopping/ajax-search-quickview?id=' + id,
        type: 'GET',
        success: function(res) {
            $("#showquickviewbody").html(res);
            $("#quick-view-modal").modal('show');

            $('.opt_color').on('click', function(e) {
                $('#selected_color').val($(this).attr('data-value'));
            });
            $('.opt_size').click(function() {
                $('.opt_size').removeAttr('style');
                $(this).css("background-color", "#FF6666");
            });
            $('.opt_color').click(function() {
                $('.opt_color').css("border", "2px solid black");
                $(this).css("border", "2px solid #FF6666");
            });
            $('.opt_size').on('click', function(e) {
                $('#selected_size').val($(this).attr('data-value'));
            });
            $('.simpleLens-thumbnail-wrapper img').on('click', function() {
                var src = $(this).attr("src");
                $('.simpleLens-big-image').attr("src", src);
            })
        }
    });
});
$(document).on('click', '.idForm', function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        url: 'http://localhost:8080/shopping/add-wishlist/' + id,

        success: function(data) {
             // show response from the php script.
        }
    });

});


$(document).on('click', '.idForm1', function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        url: 'http://localhost:8080/shopping/product/add-wishlist/' + id,

        success: function(data) {

             // show response from the php script.
        }
    });

});

function myFunction(x) {
    if (x.classList.contains("fa-heart")) {
        x.classList.remove("fa-heart");
        x.classList.add("fa-heart-o");
    } else {
        x.classList.remove("fa-heart-o");
        x.classList.add("fa-heart");
    }
}
</script>
@stop